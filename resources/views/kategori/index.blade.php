@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kategori</div>
                @include('validasi')  
                <div class="row">
                  <div class="col-md-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3 ml-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                        </button>

                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="{{url('kategori/store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" id="exampleFormControlInput1" placeholder="tambah kategori">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-dark">Cancel</button>
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
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($kategories as $kategori)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$kategori->nama_kategori}}</td>
                                <td>
                                 <form action="{{url('kategori/hapus')}}/{{($kategori->id)}}" method="post">
                                   {{ csrf_field() }}
                                     {{ method_field('DELETE') }}
                                     <a href="{{url('kategori/edit')}}/{{($kategori->id)}}" class="btn btn-danger btn-sm">Edit</a>    
                                    <button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                 </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
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