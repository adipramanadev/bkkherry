@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Semua Perusahaan</h1>
        <a href="/dashboard/perusahaan/create" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
            Posting Baru</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->perusahaan }}</td>
                                            <td>{{ $company->excerpt }}</td>
                                            <td><img src="{{ Storage::url($company->gambar) }}"
                                                    class="card-img-top w-50" alt="..."></td>
                                            <td>
                                                <a href="/dashboard/perusahaan/{{ $company->id }}"
                                                    class="btn btn-success mb-2"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/dashboard/perusahaan/{{ $company->id }}/edit"
                                                    class="btn btn-warning mb-2"><i class="bi bi-pencil-fill"></i></a>
                                                <form id="{{ $company->id }}"
                                                    action="/dashboard/perusahaan/{{ $company->id }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn btn-danger mb-2 swal-confirm"
                                                        data-form="{{ $company->id }}"><i class="bi bi-trash-fill"></i>
                                                    </div>
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
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
