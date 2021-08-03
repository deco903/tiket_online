<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tiket;
use App\kategori;
use PDF;
class TiketController extends Controller
{
    public function index()
    {
        $tiket = tiket::all();
        $kategori = kategori::all();//to retreive id_kategori from table kategori
        return view('tiket.index',compact('tiket','kategori'));
    }

    public function store(Request $request)
    {

        //validation
        $validatedData = $request->validate([
            'name_tiket' => 'min:4|required',
            'harga_tiket' => 'required',
            'jenis_tiket' => 'required',
            'id_kategori' => 'required',
            'jumlah_tiket' => 'required',

        ]);

        //input
        $data_tiket = new tiket();
        $data_tiket->name_tiket = $request->name_tiket;
        $data_tiket->harga_tiket = $request->harga_tiket;
        $data_tiket->jenis_tiket = $request->jenis_tiket;
        $data_tiket->id_kategori = $request->id_kategori;
        $data_tiket->jumlah_tiket = $request->jumlah_tiket;
    
        $data_tiket->save();

        return redirect()->back()->with('pesan','data berhasil ditambah');
    }

    public function edit($id)
    {
        $tiket = tiket::where('id', $id)->first();//retreive id_kategori from relation kategori table
        $kategoris = kategori::all();
        return view('tiket.edit',compact('tiket','kategoris'));
    }

    public function update(Request $request, $id)
    {

        //validation
        $validatedData = $request->validate([
            'name_tiket' => 'min:4|required',
            'jenis_tiket' => 'required',
            'id_kategori' => 'required',
            'jumlah_tiket' => 'required',
            'harga_tiket' => 'required',
        ]);

        $tiket = tiket::where('id', $id)->first();//retreive id_kategori from relation kategori table
        $tiket->name_tiket = $request->name_tiket;
        $tiket->harga_tiket = $request->harga_tiket;
        $tiket->jenis_tiket = $request->jenis_tiket;
        $tiket->id_kategori = $request->id_kategori;
        $tiket->jumlah_tiket = $request->jumlah_tiket;
        
        $tiket->update();
        
        return redirect('/tiket')->with('pesan','data berhasil dirubah');
    }

    public function destroy($id)
    {
        $tiket = tiket::find($id);
        $tiket->delete();

        return redirect('/tiket')->with('pesan','data berhasil dihapus');
    }

    public function downloadPDF()
    {
        $tiket = tiket::all();
        $pdf = PDF::loadview('tiket.index', compact('tiket'));
        return $pdf->download('tiket-list.pdf');
    }

}
