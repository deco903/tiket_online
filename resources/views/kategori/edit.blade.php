
@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
              <div class="card-header">Edit</div>
              <form action="{{url('kategori/update')}}/{{$kategori->id}}" method="post" >
                @csrf
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Kategori</label>
                    <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}">                          
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
