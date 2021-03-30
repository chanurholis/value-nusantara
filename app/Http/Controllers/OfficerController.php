<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Officer;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::all();

        return view('admin.officers.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = [1 => 'Administrator', 2 => 'Officer'];

        return view('admin.officers.create', compact('levels'));
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
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'name'         => 'string|max:255',
            'level_id'     => 'required|numeric',
            'password'     => 'required|confirmed|string|min:8',
            'email'        => 'required|email|unique:officers',
            'phone_number' => 'required|numeric|min:8|unique:officers'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        unset($data['password_confirmation']);

        $data['password'] = Hash::make($request['password']);
        $data['name']     = $data['first_name'] . ' ' . $data['last_name'];

        Officer::create($data);

        return redirect(route('admin.officers.create'))->with('status', 'Petugas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Officer::destroy($id);

        return redirect(route('admin.officers'))->with('status', 'Petugas berhasil dihapus!');
    }
}
