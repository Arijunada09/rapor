@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Sekolah</h3>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#TambahSekolah">
                                    <i class="lnr lnr-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nama Sekolah</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sekolah as $item)
                                    <tr>
                                        <td>{{ $item->nama_sekolah }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <a href="/sekolah/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                            <a href="/sekolah/{{ $item->id }}/delete" class="btn btn-danger">Hapus</a>
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
</div>

<div class="modal fade" id="TambahSekolah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Sekolah</h5>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-gorup {{ $errors->has('nama_sekolah') ? 'has-error' : '' }}">
                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah"
                            value="{{ old('nama_sekolah') }}">
                        @if ($errors->has('nama_sekolah'))
                        <span class="help-block">{{ $errors->first('nama_sekolah') }}</span>
                        @endif
                    </div>
                    <div class="form-gorup {{ $errors->has('telp') ? 'has-error' : '' }}">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" name="telp" class="form-control" id="telp" value="{{ old('telp') }}">
                        @if ($errors->has('telp'))
                        <span class="help-block">{{ $errors->first('telp') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" aria-label="Default select example">
                            <option selected>--pilih--</option>
                            <option value="negeri-laki" {{ (old('status')=='laki-negeri' ) ? 'selected' : '' }}>
                                Negeri</option>
                            <option value="perempuan">Swasta</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mb-3" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary mb-3">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection