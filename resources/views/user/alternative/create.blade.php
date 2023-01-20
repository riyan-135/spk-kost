@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alternative</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Create Alternative
                </div>
                <div class="card-body">
                    <form action="{{url('/alternative/store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama Alternative</label>
                            <input type="text" class="form-control" id="nama_alternative" name="nama_alternative">
                          </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Hasil Alternative</label>
                            <input type="text" class="form-control" id="hasil_alternative" name="hasil_alternative">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Harga</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="harga">
                                <option>Pilih Disini</option>
                                <option value=">=500.000">>=500.000</option>
                                <option value=">500.000<300.000">>500.000 < 300.000</option>
                                <option value=">300.000<250.000">>300.000 < 250.000</option>
                                <option value=">250.000<200.000">>250.000 < 200.000</option>
                                <option value="<=200.000"><=200.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Jarak</label>
                            <select name="dekat_lokasi" class="form-control">
                                <option>Pilih Disini</option>
                                <option value=">= 1 km">>= 1 km</option>
                                <option value="> 1 km < 500 m">> 1 km < 500 m</option>
                                <option value="> 500 m < 250 m">> 500 m < 250 m</option>
                                <option value="> 250 m ≤ 50 m">> 250 m ≤ 50 m</option>
                                <option value="<= 50 m"><= 50 m</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Fasilitas</label>
                            <select name="fasilitas" class="form-control">
                                <option>Pilih Disini</option>
                                <option value="Kasur, Almari">Kasur, Almari</option>
                                <option value="Kasur, Almari, Meja">Kasur, Almari, Meja</option>
                                <option value="Kasur, Almari, Meja, Kipas Angin">Kasur, Almari, Meja, Kipas Angin</option>
                                <option value="Kasur, Almari, Meja, kursi, Kipas
                                Angin">Kasur, Almari, Meja, kursi, Kipas
                                Angin</option>
                                <option value="Kasur,   Almari,	Meja, Kipas
                                Angin, Kursi, TV">Kasur,   Almari,	Meja, Kipas
                                Angin, Kursi, TV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Luas Kamar</label>
                            <select name="luas_kamar" class="form-control">
                                <option>Pilih Disini</option>
                                <option value="2 x 3 m²">2 x 3 m²</option>
                                <option value="3 x 3 m²">3 x 3 m²</option>
                                <option value="3 x 4 m²">3 x 4 m²</option>
                                <option value="4 x 4 m²">4 x 4 m²</option>
                                <option value="4 x 5 m²">4 x 5 m²</option>
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
