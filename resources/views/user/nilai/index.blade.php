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
                            @foreach ($nilai as $item)
                                <tr>
                                    <td>{{$item->alternatif->nama_alternative}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->jarak}}</td>
                                    <td>{{$item->fasilitas}}</td>
                                    <td>{{$item->luas_kamar}}</td>
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
                            @foreach ($nilai as $item)
                                <tr>
                                    <td>{{$item->alternatif->nama_alternative}}</td>
                                    {{-- {{}} --}}
                                    <td>{{$item->min('harga') / $item->harga}}</td>
                                    <td>{{$item->min('jarak') / $item->jarak}}</td>
                                    <td>{{$item->fasilitas / $item->max('fasilitas')}}</td>
                                    <td>{{$item->luas_kamar / $item->max('luas_kamar')}}</td>
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
                                @foreach ($kriteria as $items => $key)
                                    <td>{{$key->bobot}}</td>
                                @endforeach
                            </tr>
                            @foreach ($nilai as $item)
                                <tr>
                                    <td>{{$item->alternatif->nama_alternative}}</td>
                                    <td>{{$item->min('harga') / $item->harga}}</td>
                                    <td>{{$item->min('jarak') / $item->jarak}}</td>
                                    <td>{{$item->fasilitas / $item->max('fasilitas')}}</td>
                                    <td>{{$item->luas_kamar / $item->max('luas_kamar')}}</td>
                                    <?php $total =0;
                                    $total =  $item->harga / $item->min('harga') * 4 + $item->jarak / $item->min('jarak') * 3 + $item->fasilitas / $item->max('fasilitas') * 2 + $item->luas_kamar / $item->max('luas_kamar') * 2
                                    ?>
                                    <td>
                                        {{$total}}
                                    </td>
                                    <?php $ranking[] = [
                                        'kost' => $item->alternatif->nama_alternative,
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
                            <tr>
                                <td>{{$t['kost']}}</td>
                                <td>{{$t['total']}}</td>
                            <td>
                                {{$a++}}
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
