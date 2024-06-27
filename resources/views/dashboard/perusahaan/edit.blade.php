@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="h3 mb-3">Edit Perusahaan</h1>
                <a href="/dashboard/perusahaan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-body">

                        <form action="/dashboard/perusahaan/{{ $company->id }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror"
                                            id="perusahaan" name="perusahaan"
                                            value="{{ old('perusahaan', $company->perusahaan) }}">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="dkr @error('dkr') is-invalid @enderror">Deskripsi</label>
                                        <textarea name="dkr" id="editor">{{ $company->dkr }}</textarea>
                                        @error('dkr')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="gambar @error('gambar') is-invalid @enderror">Upload Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar"
                                            value="{{ old('gambar', $company->gambar) }}">
                                        @if ($company->gambar)
                                            <a href="{{ asset('storage/' . $company->gambar) }}"><i
                                                    class="bi bi-gambar-earmark-text"></i>
                                                {{ basename($company->gambar) }}</a>
                                        @else
                                            <p>Tidak ada Gambar</p>
                                        @endif
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary float-end">Edit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function file - preview() {
            preview.src = URL.createObjectURL(event.target.files[0]);
        }

        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/dashboard/informasi/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
