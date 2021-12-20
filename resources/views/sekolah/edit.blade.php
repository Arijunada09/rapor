@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Sekolah</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/sekolah/{{ $sekolah->id }}}/update" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah"
                                        value="{{ $sekolah->nama_sekolah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="text" name="telp" class="form-control" id="telp"
                                        value="{{ $sekolah->telp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" aria-label="Default select example">
                                        <option selected>--Pilih--</option>
                                        <option value="negeri" @if ($sekolah->status == 'negeri') selected
                                            @endif>Negeri
                                        </option>
                                        <option value="swasta" @if ($sekolah->jenis_kelamin == 'swasta') selected
                                            @endif>swasta
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat"
                                        rows="3">{{ $sekolah->alamat }}</textarea>
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