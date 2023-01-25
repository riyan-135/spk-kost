@extends('adminHome')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">fasilitas</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Create fasilitas
                </div>
                <div class="card-body">
                    <form action="{{url('/fasilitas/store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama</label>
                          <input type="text" class="form-control" id="nama_kost" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">nilai</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="nilai">
                                <option>Pilih Disini</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
