@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h1 class="h3 mb-3">Form Edit</h1>
                <a href="/dashboard/lamaran/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('update-lamaran') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama', $pendaftar->nama) }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan Sekolah</label>
                                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                            id="jurusan" name="jurusan" value="{{ old('jurusan', $pendaftar->jurusan) }}">
                                        @error('jurusan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                        <input type="text"
                                            class="form-control @error('asal_sekolah') is-invalid @enderror"
                                            id="asal_sekolah" name="asal_sekolah"
                                            value="{{ old('asal_sekolah', $pendaftar->asal_sekolah) }}">
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">jenis Kelamin</label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                            aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="laki-laki"
                                                {{ $pendaftar->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ $pendaftar->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="noWa" class="form-label">* No Whatsapp</label>
                                        <input type="text" class="form-control @error('noWa') is-invalid @enderror"
                                            id="noWa" name="noWa">
                                        @error('noWa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">* Email Aktif</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Edit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection