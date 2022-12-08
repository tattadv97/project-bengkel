<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jasa.jasa', [
            'jasa' => Jasa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.create-jasa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jasa' => 'required',
            'price' => 'required',
            'point' => 'required',
        ]);

        Jasa::create($validatedData);
        return redirect('/jasa')->with('success', 'New jasa has been added!');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        return view('jasa.edit-jasa', [
            'jasa' => $jasa
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jasa $jasa)
    {
        $rules = [
            'nama_jasa' => 'required',
            'price' => 'required',
            'point' => 'required',
        ];

        $validatedData = $request -> validate($rules);

        Jasa::where('id', $jasa->id)->update($validatedData);
        return redirect('/jasa')->with('success', 'jasa has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        Jasa::destroy($jasa->id);
        return redirect('/jasa')->with('success', 'jasa has been deleted!');
    }
}
