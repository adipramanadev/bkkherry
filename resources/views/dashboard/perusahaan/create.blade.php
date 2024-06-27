@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="h3 mb-3">Posting Perusahaan Yang Bekerja Sama</h1>
                <a href="/dashboard/perusahaan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <div class="card">
                    <div class="card-body">

                        <form action="/dashboard/perusahaan/" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="gambar">Upload Gambar Perusahaan</label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                            id="gambar" name="gambar">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div id="file-preview"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror"
                                            id="perusahaan" name="perusahaan">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="dkr">Deskripsi</label>
                                        <textarea name="dkr" id="editor" class=" @error('dkr') is-invalid @enderror"></textarea>
                                        @error('dkr')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary float-end">Tambah</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/dashboard/informasi/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
