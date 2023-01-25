@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alternative</h1>
        <button class="btn btn-success">
            <a href="/alternative/create" class="text-white">
                <i class="fa fa-plus"></i> Create</a>
        </button>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Alternative Index
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kost</th>
                            <th scope="col">harga</th>
                            <th scope="col">fasilitas</th>
                            <th scope="col">jarak</th>
                            <th scope="col">luas kamar</th>
                            {{-- <th scope="col">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternative as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->kost->name }}</td>
                                    <td>{{ $item->harga->nama }}</td>
                                    <td>{{ $item->fasilitas->nama }}</td>
                                    <td>{{ $item->jarak->nama }}</td>
                                    <td>{{ $item->luas->nama }}</td>
                                    {{-- <td>
                                        <button class="btn btn-warning">
                                            <a href="{{url('/alternative/show', $item->id)}}" class="text-white">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </button>
                                        <form action="{{url('/alternative/delete', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mt-2">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
