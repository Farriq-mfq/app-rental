<?php

namespace App\Http\Controllers;

use App\DataTables\ReturnRentDataTable;
use App\Enums\UpdateStokEnum;
use App\Events\UpdateStok;
use App\Http\Requests\ReturnRequest;
use App\Models\Car;
use App\Models\Rent;
use App\Models\ReturnRent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReturnRentController extends Controller
{
    public function __construct(private readonly Car $car, private readonly Rent $rent, private readonly ReturnRent $returnRent)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(ReturnRentDataTable $dataTable)
    {
        return $dataTable->render('returns.index');
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
    public function store(ReturnRequest $request)
    {
        // check kode peminjaman
        $checkKode = $this->rent->where('kode', $request->kode)->first();
        if ($checkKode) {
            if ($checkKode->returnRent) {
                return to_route('return-rents.index')->withErrors(['kode' => 'Sudah di kembalikan']);
            } else {
                $start = Carbon::parse($checkKode->mulai);
                $today = Carbon::now();
                $durasi_sewa = $today->diffInDays($start);
                $total_tarif = $durasi_sewa * $checkKode->car->tarif;
                $store = $this->returnRent->create([
                    'total_tarif' => $total_tarif,
                    'durasi' => $durasi_sewa,
                    'rent_id' => $checkKode->id
                ]);
                if ($store) {
                    event(new UpdateStok($checkKode->car, UpdateStokEnum::DOWN));
                    return to_route('return-rents.index')->with('alert', ['message' => 'Pengembalian berhasil', 'type' => 'success']);
                } else {
                    return back()->with('alert', ['message' => 'Pengembalian gagal', 'type' => 'danger']);
                }
            }

        } else {
            return to_route('return-rents.index')->withErrors(['kode' => 'Kode tidak valid']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $returnRent = $this->returnRent->find($id);
        if ($returnRent) {
            $del = $returnRent->delete();
            if ($del) {
                return to_route('return-rents.index')->with('alert', ['message' => 'Berhasil hapus pengembalian', 'type' => 'success']);
            } else {
                return to_route('return-rents.index')->with('alert', ['message' => 'Gagal menghapus data', 'type' => 'danger']);
            }
        } else {
            return to_route('return-rents.index')->with('alert', ['message' => 'Gagal menghapus data', 'type' => 'danger']);
        }
    }
}
