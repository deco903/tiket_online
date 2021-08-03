<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\tiket;
use PDF;
class TransaksiController extends Controller
{
    public function index()
    {
       $transaksi=transaksi::where('status','0')->get();//true or false
       $tikets = tiket::all();//retreive id_tiket from tiket table
       return view('transaksi.index', compact('transaksi','tikets'));
    }

    public function store(Request $request)
    {
        //validation
        $validatedData = $request->validate([
            'id_tiket' => 'required',
            'qty' => 'required',
        ]);
        
        //Transaksi::create($request->except('submit'));//except function to preventive submit button 
        $transaksi = new transaksi();
        $transaksi->id_tiket = $request->id_tiket;
        $transaksi->qty = $request->qty;
        $transaksi->save();

        //reduce count jumlah_tiket
        // $requestData = $request->all();
        // transaksi::create($requestData);
        // $totik = tiket::findOrFail($request->id_tiket);
        // $totik->jumlah_tiket -= $request->qty;
        //$totik->save();
        
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->delete();
        return redirect()->back()->with('pesan','pembelian berhasil dibatalkan');
    }

    public function update()
    {
       $transaksi = transaksi::where('status','0');//false
       $transaksi->update(['status'=>'1']);//true
       

       return redirect()->back()->with('pesan','pesanan telah dicheckout');
    }

    public function excel()
    {
        
    }
    
}
