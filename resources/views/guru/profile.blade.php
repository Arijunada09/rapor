@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
    rel="stylesheet" />
@endsection

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-warning" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="  " class="img-circle" alt="Avatar" width="50px">
                                <h3 class="name">{{ $guru->nama_depan }}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{ $guru->mapel->count() }} <span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin <span>{{ $guru->jenis_kelamin }}</span></li>
                                    <li>Agama <span>{{ $guru->agama }}</span></li>
                                    <li>Alamat <span>{{ $guru->alamat }}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="/guru/{{ $guru->id }}/edit" class="btn btn-warning">Edit
                                    Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mata Pelajaran yang diajar oleh guru : {{ $guru->nama }}</h3>
                            </div>
                            <div class="panel-body no-padding">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Nama</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru->mapel as $mapel)
                                        <tr>
                                            <td>{{ $mapel->nama }}</td>
                                            <td>{{ $mapel->semester }}</td>
                                            {{-- <td><a href="#" class="nilai" data-type="text"
                                                    data-pk="{{ $mapel->id }}"
                                                    data-url="/api/guru/{{ $guru->id }}/editnilai"
                                                    data-title="Masukkan Nilai">{{ $mapel->pivot->nilai
                                                    }}</a></td>
                                            <td>
                                                <a href="/guru/{{ $guru->id }}/{{ $mapel->id }}/deletenilai"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('yakin ingin menghapus data?')">Delete</a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                        <div class="panel">
                            <div id="chartnilai">
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>


@endsection

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
</script>

<script>
    $(document).ready(function() {
$('.nilai').editable();
});
</script>
@endsection