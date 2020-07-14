<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::orderBy('id','ASC')->get();
        return view ('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buku.create');
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
            'judul_buku' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required'
        ],
            [
                'judul_buku.required' => 'Judul buku harus diisi',
                'penulis.required' => 'Penulis harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]);

        $buku = new Buku();
        $buku->judul_buku = $request->judul_buku;
        $buku->penulis = $request->penulis;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();

        Session::flash('message','Buku berhasil ditambahkan');
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('admin.buku.show', ['buku'=>Buku::find($buku)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'judul_buku' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required'
        ],
            [
                'judul_buku.required' => 'Judul buku harus diisi',
                'penulis.required' => 'Penulis harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]);

        $buku->judul_buku = $request->judul_buku;
        $buku->penulis = $request->penulis;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();

        Session::flash('message','Buku berhasil diubah');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        Session::flash('delete-message','Buku berhasil dihapus');
        return redirect()->route('buku.index');
    }
}
