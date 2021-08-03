
@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('validasi')
            @include('notifikasi')  
              <div class="card-header">Edit Tiket</div>
              <form action="{{url('tiket/update')}}/{{$tiket->id}}" method="post" >
                @csrf
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Tiket</label>
                    <input type="text" name="name_tiket" value="{{$tiket->name_tiket}}">                          
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Tiket</label>
                    <input type="text" name="jenis_tiket" value="{{$tiket->jenis_tiket}}">                          
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori Tiket</label>
                    <select class="form-control" name="id_kategori" id="exampleFormControlSelect1">
                    <option value="">-- Pilih Kategori --</option>
                      @foreach($kategoris as $kategori)
                      <option value="{{$kategori->id}}" {{$tiket->id_kategori == $kategori->id ? 'selected': null}}>{{$kategori->nama_kategori}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Tiket</label>
                    <input type="text" name="jumlah_tiket" value="{{$tiket->jumlah_tiket}}">                          
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga Tiket</label>
                    <input type="text" name="harga_tiket" value="{{$tiket->harga_tiket}}">                          
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-dark">Reset</button>
                  </div>
              </form>
              </div>  
            </div>
        </div>
    </div>
</div>
@endsection
