<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sparepart.sparepart', [
            'spareparts' => Sparepart::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sparepart.create-sparepart', [
            'supplier' => Supplier::all()
        ]);
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
            'spare_parts_id' => 'required',
            'spare_parts_name' => 'required',
            'base_price' => 'required',
            'selling_price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'point' => 'required',
            'supplier_id' => 'required'
        ]);

        Sparepart::create($validatedData);
        return redirect('/sparepart')->with('success', 'New Sparepart has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function show(Sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(Sparepart $sparepart)
    {
        return view('sparepart.edit-sparepart', [
            'supplier' => Supplier::all(),
            'sparepart' => $sparepart
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        $rules = [
            'spare_parts_id' => 'required',
            'spare_parts_name' => 'required',
            'base_price' => 'required',
            'selling_price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'point' => 'required',
            'supplier_id' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Sparepart::where('id', $sparepart->id)->update($validatedData);
        return redirect('/sparepart')->with('success', 'Sparepart has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sparepart $sparepart)
    {
        Sparepart::destroy($sparepart->id);
        return redirect('/sparepart')->with('success', 'Sparepart has been deleted!');
    }
}
