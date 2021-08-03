@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
        <div class="card-header">TRANSAKSI TIKET</div>
                    <div class="card-body">
                    <h3>Form Transaksi</h3>
                    <table class="table table-bordered">
                    @include('validasi')
                    @include('notifikasi')
                        <form action="{{url('/transaksi/store')}}" method="post">
                        @csrf
                          <tr>
                            <td>
                              <div class="col-md-12">
                              <select name="id_tiket" class="form-control" id="exampleFormControlSelect1">
                                <option value="">--Pilih Tiket--</option>
                                @foreach($tikets as $tiket)
                                <option value="{{$tiket->id}}">{{$tiket->name_tiket}}</option>
                                @endforeach
                              </select>
                              </div>
                            </td>
                           </tr>
                        <tr>
                          <td>
                             <div class="col-md-12">
                                <select name="qty" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">--masukan jumlah--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                             </div>
                          </td>
                        </tr>
                          <tr><td>
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                 <a href="{{url('/transaksi/update')}}" class="btn btn-danger">Check Out</a>
                            </td></tr>
                        </form>
                    </table>
                    <table class="table table-bordered">
                        <tr class="success"><th colspan="6">Detail Transaksi</th></tr>
                        <tr>
                          <th>No</th>
                          <th>Nama Tiket</th>
                          <th>Qty</th>
                          <th>Harga Tiket</th>
                          <th>Subtotal</th>
                          <th>Cancel</th>
                         </tr>
                        <?php $no=1; $total=0; ?>
                         @foreach ($transaksi as $item)
                          <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->tiket->name_tiket }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp. {{number_format ($item->tiket->harga_tiket) }}</td>
                                <td>Rp.{{number_format ($item->tiket->harga_tiket*$item->qty) }}</td>
                                <td>
                                   <form action="{{url('transaksi/hapus')}}/{{$item->id}}" method="post">
                                    {{ csrf_field() }}
                                     {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pembelian?')">Cancel</button>
                                   </form>
                                </td>
                          </tr>
                               <?php $no++ ?>
                                <?php $total=$total+($item->tiket->harga_tiket*$item->qty) ?>
                       @endforeach
                                <tr><td colspan="5"><p align="right">Total</p></td><td>Rp. {{number_format($total)}}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection