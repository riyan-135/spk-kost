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
                            <label for="exampleFormControlTextarea1">Kost</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kost_id">
                                @foreach ($kost as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Harga</label>
                            <select name="harga_id" class="form-control">
                                @foreach ($harga as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Fasilitas</label>
                            <select name="fasilitas_id" class="form-control">
                                @foreach ($fasilitas as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Jarak</label>
                            <select name="jarak_id" class="form-control">
                                @foreach ($jarak as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLastName">Luas Kamar</label>
                            <select name="luas_kamar_id" class="form-control">
                                @foreach ($luas as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
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
