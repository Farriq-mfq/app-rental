<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(private readonly User $user)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthRegisterRequest $authRegisterRequest)
    {
        $register = $this->user->create([
            'nama' => $authRegisterRequest->nama,
            'email' => $authRegisterRequest->email,
            'password' => Hash::make($authRegisterRequest->password),
            'no_sim' => $authRegisterRequest->no_sim,
            'alamat' => $authRegisterRequest->alamat,
            'telp' => $authRegisterRequest->no_telp,
        ]);

        if ($register) {
            return to_route('users.index')->with('alert', ['message' => 'Register berhasil', 'type' => 'success']);
        } else {
            return to_route('users.index')->with('alert', ['message' => 'Gagal register', 'type' => 'danger']);
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
        $user = $this->user->find($id);
        if ($user) {
            return view('users.edit', compact('user'));
        } else {
            return to_route("users.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthRegisterRequest $authRegisterRequest, string $id)
    {
        $user = $this->user->find($id);
        if (!$user) {
            return to_route("users.index");
        }
        $data = [
            'nama' => $authRegisterRequest->nama,
            'email' => $authRegisterRequest->email,
            'no_sim' => $authRegisterRequest->no_sim,
            'alamat' => $authRegisterRequest->alamat,
            'telp' => $authRegisterRequest->no_telp,
        ];

        if ($authRegisterRequest->has('password')) {
            $data['password'] = Hash::make($authRegisterRequest->password);
        }
        $register = $user->update($data);

        if ($register) {
            return to_route('users.index')->with('alert', ['message' => 'Update berhasil', 'type' => 'success']);
        } else {
            return to_route('users.index')->with('alert', ['message' => 'Gagal update', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();
        return to_route('users.index');
    }
}
