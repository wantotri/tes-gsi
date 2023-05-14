@extends('base')
@section('content')
<main class="dashboard-page flex-grow-1">
    <div class="dashboard-content">
        @include('sidebar')
        <div class="main-content">
            <h1 class="mb-3">
                Input Data Transaksi
            </h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{route('create-transaksi')}}" method="POST">
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
                            @foreach ($daftar_lokasi as $lokasi)
                                <option value="{{$lokasi->kode}}">{{$lokasi->nama_lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputItem" class="col-sm-3 col-form-label">Item</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="inputItem" name="inputItem" required>
                            @foreach ($daftar_item as $item)
                                <option value="{{$item->kode}}">{{$item->kode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputQty" class="col-sm-3 col-form-label">Qty</label>
                    <div class="col-sm-9">
                        <input type="number" min="0" class="form-control" id="inputQty" name="inputQty" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button class="btn btn-success" type="submit">Simpan</button>
                        <button class="btn btn-secondary" type="button" id="clear-button">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection