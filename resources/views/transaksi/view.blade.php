@extends('base')
@section('content')
<main class="dashboard-page flex-grow-1">
    <div class="dashboard-content">
        @include('sidebar')
        <div class="main-content">
            <h1 class="mb-3">
                View Data Transaksi
            </h1>
            <form action="" method="POST" id="search-form">
                @csrf
                <div class="row mb-2">
                    <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" id="inputDate" name="inputDate" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputLokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="inputLokasi" name="inputLokasi" required>
                            @foreach ($daftar_lokasi as $lokasi)
                                <option value="{{$lokasi->kode}}">{{$lokasi->nama_lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button class="btn btn-success" type="submit" id="search-button">Cari</button>
                        <button class="btn btn-secondary" type="button" id="clear-button">Clear</button>
                    </div>
                </div>
            </form>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Kode Item</th>
                        <th>Nama Item</th>
                        <th>Kode Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Qty Actual</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody id="search-table-body">
                    {{-- @foreach ($daftar_transaksi as $transaksi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$transaksi->tanggal_transaksi}}</td>
                            <td>{{$transaksi->kode}}</td>
                            <td>{{$transaksi->item->nama_item}}</td>
                            <td>{{$transaksi->lokasi}}</td>
                            <td>{{$transaksi->master_lokasi->nama_lokasi}}</td>
                            <td>{{$transaksi->qty_actual}}</td>
                            <td>{{$transaksi->npk}}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection