@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kost</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Edit Kost
                </div>
                <div class="card-body">
                    <form action="{{url('/alternative/update', $alternative->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama Alternative</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="nama_alternative">
                                <option>Pilih Disini</option>
                                <option value="kost_pria" {{ $alternative->nama_alternative == 'kost_pria' ? 'selected' : '' }}>Kost Pria</option>
                                <option value="kost_wanita" {{ $alternative->nama_alternative == 'kost_wanita' ? 'selected' : '' }}>Kost Wanita</option>
                                <option value="kost_campur" {{ $alternative->nama_alternative == 'kost_camput' ? 'selected' : '' }}>Kost Campur</option>
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Hasil Alternative</label>
                            <input type="text" class="form-control" id="hasil_alternative" name="hasil_alternative" value="{{$alternative->hasil_alternative}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Harga</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="harga">
                                <option>Pilih Disini</option>
                                <option value="<500.000" {{ $alternative->harga == '<500.000' ? 'selected' : '' }}>500.000</option>
                                <option value="<=500.000 >600.000<" {{ $alternative->harga == '<=500.000 >600.000<' ? 'selected' : '' }}><=500.000 >600.000</option>
                                <option value="><=600.000" {{ $alternative->harga == '><=600.000' ? 'selected' : '' }}><=600.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Lokasi (Dekat)</label>
                            <select name="dekat_lokasi" class="form-control">
                                <option>Pilih Disini</option>
                                <option value="Dekat Kampus" {{ $alternative->dekat_lokasi == 'Dekat Kampus' ? 'selected' : '' }}>Dekat Kampus</option>
                                <option value="Dekat Tempat Ibadah" {{ $alternative->dekat_lokasi == 'Dekat Tempat Ibadah' ? 'selected' : '' }}>Dekat Tempat Ibadah</option>
                                <option value="Dekat Toko" {{ $alternative->dekat_lokasi == 'Dekat Toko' ? 'selected' : '' }}>Dekat Toko</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Fasilitas</label>
                            <select name="fasilitas" class="form-control">
                                <option>Pilih Disini</option>
                                <option value="kamar mandi dalam, R. Tamu, tempat parkir, kasur, kipas angin, wifi, lemari kursi" {{ $alternative->fasilitas == 'kamar mandi dalam, R. Tamu, tempat parkir, kasur, kipas angin, wifi, lemari kursi' ? 'selected' : '' }}>kamar mandi dalam, R. Tamu, tempat parkir, kasur, kipas angin, wifi, lemari kursi</option>
                                <option value="Kamar mandi luar, tempat parkir, kasur, kipas angin" {{ $alternative->fasilitas == 'Kamar mandi luar, tempat parkir, kasur, kipas angin' ? 'selected' : '' }}>Kamar mandi luar, tempat parkir, kasur, kipas angin</option>
                                <option value="Kamar Mandi luar, Kasur, Kipas" {{ $alternative->fasilitas == 'Kamar Mandi luar, Kasur, Kipas' ? 'selected' : '' }}>Kamar Mandi luar, Kasur, Kipas</option>
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
