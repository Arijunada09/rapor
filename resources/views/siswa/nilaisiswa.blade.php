@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Siswa</h3>

                        </div>
                        <button type="button" class="btn btn-primary btn-toastr" data-context="info"
                            data-message="This is general theme info" data-position="top-right" data-toggle="modal"
                            data-target="#exampleModal" style="float: right">General
                            Info</button>
                        <div class="panel-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Induk Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection