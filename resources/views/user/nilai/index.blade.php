@extends('home')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nilai</h1>
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
                    Nilai Awal
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:21%;">Nama Alternatif</th>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternative as $item)
                                <tr>
                                    <td>{{$item->kost->name}}</td>
                                    <td>{{$item->harga->nilai}}</td>
                                    <td>{{$item->jarak->nilai}}</td>
                                    <td>{{$item->fasilitas->nilai}}</td>
                                    <td>{{$item->luas->nilai}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Data Normalisasi
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:21%;">Nama Alternatif</th>
                                <th scope="col">C1</th>
                                <th scope="col" style="width:24%;">C2</th>
                                <th scope="col" style="width:24%;">C3</th>
                                <th scope="col">C4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternative as $item)
                                <tr>
                                    <td>{{$item->kost->name}}</td>
                                    <td>{{$item->harga->min('nilai') / $item->harga->nilai}}</td>
                                    <td>{{$item->jarak->min('nilai') / $item->jarak->nilai}}</td>
                                    <td>{{$item->fasilitas->nilai / $item->fasilitas->max('nilai')}}</td>
                                    <td>{{$item->luas->nilai / $item->luas->max('nilai')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Perankingan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Alternatif</th>
                                <th scope="col">C1</th>
                                <th scope="col">C2</th>
                                <th scope="col">C3</th>
                                <th scope="col">C4</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    Bobot
                                </th>
                                    <td>4</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>2</td>
                            </tr>
                            @foreach ($alternative as $item)
                                <tr>
                                    <td>{{$item->kost->name}}</td>
                                    <td>{{$item->harga->min('nilai') / $item->harga->nilai}}</td>
                                    <td>{{$item->jarak->min('nilai') / $item->jarak->nilai}}</td>
                                    <td>{{$item->fasilitas->nilai / $item->fasilitas->max('nilai')}}</td>
                                    <td>{{$item->luas->nilai / $item->luas->max('nilai')}}</td>
                                    <?php $total =0;
                                    $total =  $item->harga->nilai / $item->harga->min('nilai') * 4 + $item->jarak->nilai / $item->jarak->min('nilai') * 3 + $item->fasilitas->nilai / $item->fasilitas->max('nilai') * 2 + $item->luas->nilai / $item->luas->max('nilai') * 2
                                    ?>
                                    <td>
                                        {{$total}}
                                    </td>
                                    <?php $ranking[] = [
                                        'kost' => $item->kost->name,
                                        'total' => $total
                                    ]; ?>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Hasil Ranking
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Alternative</th>
                                <th>Total</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // $datas = explode(" ",$data)
                            // $item = array($datas)
                            usort($ranking, function ($a, $b) {
                                return strcmp($a['total'], $b['total']);
                                // return $a['total'] <=> $b['total'];
                            });
                            $ranking = array_reverse($ranking);

                            $a = 1;
                            ?>
                            @foreach ($ranking as $t)
                            @if ($t != null)
                                <tr >
                                    <td>{{$t['kost']}}</td>
                                    <td>{{$t['total']}}</td>
                                    <td>
                                        {{$a++}}
                                    </td>
                                </tr>
                            @else
                                <tr>data empty</tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
