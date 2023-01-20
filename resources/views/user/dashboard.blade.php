@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($kost as $item)
                            <div class="col-lg-3">
                            <!-- Default Card Example -->
                                <div class="card" style="width: 18rem;">
                                    <img src="{{Storage::url($item->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">Rp. {{$item->price}}</h5>
                                    <p class="card-text">Alamat: {{$item->address}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
