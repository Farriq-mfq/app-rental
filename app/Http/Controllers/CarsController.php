<?php

namespace App\Http\Controllers;

use App\DataTables\CarsDataTable;
use App\Http\Requests\CarsRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function __construct(private readonly Car $car)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $request)
    {
        $foto = $request->foto;
        $imageName = time() . '.' . $foto->extension();
        $store = $this->car->create([
            'merk' => $request->merk,
            'model' => $request->model,
            'n_plat' => $request->n_plat,
            'stok' => $request->stok,
            'tarif' => $request->tarif,
            'foto' => $imageName
        ]);
        if ($store) {
            $foto->storeAs('/public/images', $imageName);
            return to_route('cars.index')->with('alert', ['message' => 'Berhasil tambah mobil', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal tambah mobil', 'type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = $this->car->find($id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarsRequest $request, string $id)
    {
        $car = $this->car->find($id);
        $foto = $request->foto;
        $data = [
            'merk' => $request->merk,
            'model' => $request->model,
            'n_plat' => $request->n_plat,
            'stok' => $request->stok,
            'tarif' => $request->tarif,
        ];
        if ($foto) {
            $imageName = time() . '.' . $foto->extension();
            $data['foto'] = $imageName;
        }
        $update = $car->update($data);
        if ($update) {
            if ($foto) {
                Storage::delete('public/images/' . $car->foto);
                $foto->storeAs('/public/images', $imageName);
            }
            return to_route('cars.index')->with('alert', ['message' => 'Berhasil update mobil', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal update mobil', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mobil = $this->car->find($id);
        $del = Storage::delete('public/images/' . $mobil->foto);
        if ($del) {
            $this->car->where('id', $id)->delete();
            return to_route('cars.index')->with('alert', ['message' => 'Berhasil hapus data mobil', 'type' => 'success']);
        } else {
            return to_route('cars.index')->with('alert', ['message' => 'Gagal hapus data mobil', 'type' => 'danger']);
        }
    }
}
