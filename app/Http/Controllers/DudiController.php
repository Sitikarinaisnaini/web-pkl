<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;
use Iluminate\Support\Facades\Stroage;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dudi = Dudi::latest()->paginate(5);

        //render view with posts
        return view('dudi.index', compact('dudi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dudi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required'
         ]);

         Dudi::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat
         ]);

         return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dudi $dudi)
    {
        return view ('dudi.edit', compact('dudi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dudi $dudi)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required'
         ]);

         $dudi->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat
         ]);

         return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dudi $dudi)
    {
        $dudi->delete();

        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
