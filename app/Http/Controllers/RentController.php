<?php

namespace App\Http\Controllers;

use App\DataTables\RentDataTable;
use App\Enums\UpdateStokEnum;
use App\Events\UpdateStok;
use App\Http\Requests\RentRequest;
use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function __construct(private readonly Car $car, private readonly Rent $rent)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RentDataTable $dataTable)
    {
        $cars = $this->car->get();
        return $dataTable->render('rents.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentRequest $request)
    {
        $rent = $this->rent->create([
            'kode' => uniqid(),
            'nama' => $request->nama,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'no_ktp' => $request->ktp,
            'car_id' => $request->mobil,
        ]);

        if ($rent) {
            event(new UpdateStok($rent->car, UpdateStokEnum::DOWN));
            return to_route('rents.index')->with('alert', ['message' => 'Berhasil membuat peminjaman', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal membuat peminjaman', 'type' => 'danger']);
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
    public function edit(RentDataTable $dataTable, string $id)
    {
        $cars = $this->car->get();
        $rent = $this->rent->find($id);
        if ($rent) {
            return $dataTable->render('rents.edit', compact('cars', 'rent'));
        } else {
            return to_route('rents.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rent = $this->rent->find($id);
        if (!$rent) {
            return to_route('rents.index');
        }

        $update = tap(Rent::where('id', $id))->update([
            'kode' => uniqid(),
            'nama' => $request->nama,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'no_ktp' => $request->ktp,
            'car_id' => $request->mobil,
        ]);
        if ($update) {
            if ($rent->car->id != $update->first()->car->id) {
                event(new UpdateStok($rent->car, UpdateStokEnum::UP));
                event(new UpdateStok($update->first()->car, UpdateStokEnum::DOWN));
            }
            return to_route('rents.index')->with('alert', ['message' => 'Berhasil update peminjaman', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal update peminjaman', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rent = $this->rent->find($id);
        if (!$rent) {
            return to_route('rents.index');
        }
        $del = $rent->delete();

        if ($del) {
            event(new UpdateStok($rent->car, UpdateStokEnum::UP));
            return to_route('rents.index')->with('alert', ['message' => 'Berhasil menghapus peminjaman', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal menghapus peminjaman', 'type' => 'danger']);
        }
    }
}
