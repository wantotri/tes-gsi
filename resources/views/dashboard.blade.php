@extends('base')
@section('content')
<main class="dashboard-page flex-grow-1">
    <div class="dashboard-content">
        @include('sidebar')
        <div class="main-content">
            <h1 class="mb-3">
                Dashboard
            </h1>

            <div class="row">
                <div class="col-sm-4 mb-5">
                    <form action="{{route('getTransaksi')}}" method="POST" id="filter-form">
                        @csrf
                        <div class="row mb-2">
                            <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" value="{{date('Y-m-d')}}" id="inputDate" name="inputDate" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputLokasi" class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="inputLokasi" name="inputLokasi" required>
                                    <option value="">All</option>
                                    @foreach ($daftar_lokasi as $lokasi)
                                        <option value="{{$lokasi->kode}}">{{$lokasi->nama_lokasi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputKaryawan" class="col-sm-3 col-form-label">Karyawan</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="inputKaryawan" name="inputKaryawan" required>
                                    <option value="">All</option>
                                    @foreach ($daftar_karyawan as $karyawan)
                                        <option value="{{$karyawan->npk}}">{{$karyawan->npk}} - {{$karyawan->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit" id="filter-button">Filter</button>
                                <button class="btn btn-secondary" type="button" id="clear-button">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-8">
                    <canvas id="achievement-chart"></canvas>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection