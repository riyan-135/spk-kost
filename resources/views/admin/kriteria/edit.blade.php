@extends('adminHome')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Edit Kriteria
                </div>
                <div class="card-body">
                    <form action="{{url('/kriteria/update', $kriteria->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kode</label>
                          <input type="text" class="form-control" id="kode" name="kode" value="{{$kriteria->kode}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$kriteria->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tipe</label>
                            <input type="text" class="form-control" id="tipe" name="tipe" value="{{$kriteria->tipe}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" value="{{$kriteria->bobot}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
