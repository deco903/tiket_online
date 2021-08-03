@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Tiket</div>
                
                @include('validasi')
                <div class="row">
                  <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3 ml-3" data-toggle="modal" data-target="#exampleModal">
                     Tambah Data Tiket
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tiket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{url('/tiket/store')}}">
                          @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Tiket</label>
                                <input type="text" name="name_tiket" class="form-control" id="exampleFormControlInput1" placeholder="nama Tiket">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Harga Tiket</label>
                                <input type="text" name="harga_tiket" class="form-control" id="exampleFormControlInput1" placeholder="Harga Tiket">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis Tiket</label>
                                <input type="text" name="jenis_tiket" class="form-control" id="exampleFormControlInput1" placeholder="jenis Tiket">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Id Kategori</label>
                                    <select class="form-control" name="id_kategori" id="exampleFormControlSelect1">
                                    <option value="">--Pilih Tiket--</option>
                                      @foreach($kategori as $kat)
                                        <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                                      @endforeach 
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jumlah Tiket</label>
                                <input type="text" name="jumlah_tiket" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Tiket">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                          </form>
                        </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
                @include('notifikasi')  
                <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Nama Tiket</th>
                                <th>Harga tiket</th>
                                <th>Jenis tiket</th>
                                <th>Kategori Tiket</th>
                                <th>Jumlah tiket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($tiket as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->name_tiket}}</td>
                                <td>Rp. {{number_format($item->harga_tiket)}}</td>
                                <td>{{$item->jenis_tiket}}</td>
                                <td>{{$item->kategori->nama_kategori}}</td>
                                <td>{{$item->jumlah_tiket}}</td>
                                <td>
                                 <form action="{{url('tiket/hapus')}}/{{$item->id}}" method="post">
                                   {{ csrf_field() }}
                                     {{ method_field('DELETE') }}
                                     <a href="{{url('tiket/edit')}}/{{$item->id}}" class="btn btn-danger btn-sm">Edit</a>    
                                    <button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                 </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
          $('#users-table').DataTable();
        });
    </script>
@endpush