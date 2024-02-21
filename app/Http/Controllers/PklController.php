<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\dudi;
use App\Models\Pkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pkl = Pkl::all();
        return view ('pkl.index', compact('pkl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = siswa::all();
        $item = dudi::all();
        return view ('pkl.create', compact('data', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'siswa_id' =>'required',
            'dudi_id'  => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
        ]);

        pkl::create([
            'siswa_id' => $request->siswa_id,
            'dudi_id'  => $request->dudi_id,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Pkl $pkl)
    {
        $data = siswa::all();
        $item = dudi::all();
        return view ('pkl.edit', compact('data', 'item','pkl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pkl $pkl)
    {
        $this->validate($request,[
            'siswa_id' =>'required',
            'dudi_id'  => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
        ]);

        $pkl->update([
            'siswa_id' => $request->siswa_id,
            'dudi_id'  => $request->dudi_id,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkl $pkl)
    {
        $pkl->delete();

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
