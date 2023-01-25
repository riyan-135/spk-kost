@extends('adminHome')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">jarak</h1>
        <button class="btn btn-success">
            <a href="/jarak/create" class="text-white">
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
                    jarak
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jarak as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nilai }}</td>
                                    <td>
                                        <button class="btn btn-warning">
                                            <a href="{{url('jarak', $item->id)}}" class="text-white">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </button>
                                        <form action="{{url('jarak/delete', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
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
