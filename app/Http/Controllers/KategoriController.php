<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
    public function Index()
    {
        $kategories = kategori::all();
        return view('kategori.index', compact('kategories'));
    }

    public function store(Request $request)
    {
        //validation
        $validatedData = $request->validate([
            'nama_kategori' => 'min:4|required',

        ]);
        
         //input
         $data = new kategori();
         $data->nama_kategori = $request->nama_kategori;
         $data->save();
         
         return redirect()->back()->with('pesan','data berhasil input');
    }

    public function edit($id)
    {
        $kategori = kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request,$id)
    {
         //validation
         $validatedData = $request->validate([
            'nama_kategori' => 'min:4|required',

        ]);
        $kategori = kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect('/kategori')->with('pesan','data berhasil dirubah');
    }

    public function destroy($id)
    {
         $kategori = kategori::find($id);
         $kategori->delete();
         return redirect()->back()->with('pesan','data berhasil dihapus');
    }
    
}
