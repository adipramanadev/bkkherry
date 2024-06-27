@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-10 mx-auto d-block">
                <h1 class="h3">Detail Perusahaan</h1>
                <a href="/dashboard/perusahaan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $company->gambar) }}" class="img-fluid mb-5" alt="gambar utama"
                                style="overflow:hidden; border: 1px solid black">
                        </div>
                        <h2 class="mt-3">Nama Perusahaan = {{ $company->perusahaan }}</h2>
                        <h3 class="mb-5"> {{ $company->excerpt }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
