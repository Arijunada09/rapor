@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{ $siswa->id }}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="nama_depan" class="form-label">Nama Depan</label>
                                    <input type="text" name="nama_depan" class="form-control" id="nama_depan"
                                        value="{{ $siswa->nama_depan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" class="form-control" id="nama_belakang"
                                        value="{{ $siswa->nama_belakang }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_belakang" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control"
                                        aria-label="Default select example">
                                        <option selected>--Pilih--</option>
                                        <option value="laki-laki" @if ($siswa->jenis_kelamin == 'laki-laki') selected
                                            @endif>laki-laki
                                        </option>
                                        <option value="perempuan" @if ($siswa->jenis_kelamin == 'perempuan') selected
                                            @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input type="text" name="agama" class="form-control" id="agama"
                                        value="{{ $siswa->agama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat"
                                        rows="3">{{ $siswa->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" name="avatar" class="form-control" id="avatar"
                                        value="{{ $siswa->avatar }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary mb-3" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection