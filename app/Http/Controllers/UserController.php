<?php

namespace App\Http\Controllers;

use App\Identity_card;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|unique:users|email|string|max:255',
            'password' => 'required|min:8|confirmed|string'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $data['password'] = Hash::make($request['password']);

        User::create($data);

        return redirect(route('admin.users.create'))->with('status', 'Pengguna berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'model' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'model' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|string|max:255',
            'password' => 'required|min:8|confirmed|string'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $data['password'] = Hash::make($request['password']);

        $user->update($data);

        return redirect(route('admin.users'))->with('status', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        Identity_card::where('user_id', $id)->delete();

        return redirect(route('admin.users'))->with('status', 'Pengguna berhasil dihapus!');
    }
}
