@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian {{$alternative->nama_alternative}}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Penilaian {{$alternative->nama_alternative}}
                </div>
                <div class="card-body">
                    <form action="{{url('/nilai/store', $alternative->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Jarak</label>
                            <input type="text" class="form-control" id="jarak" name="jarak">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Fasilitas</label>
                            <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Luas Kamar</label>
                            <input type="text" class="form-control" id="luas_kamar" name="luas_kamar">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
