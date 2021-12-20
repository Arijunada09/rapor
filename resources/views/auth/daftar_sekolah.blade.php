<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Rapor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin') }}/assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center">
                                <h3>REGISTRASI SEKOLAH</h3>
                            </div>

                        </div>
                        <form class="form-auth-small" action="/postlogin" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Nama </label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder=" Nama Sekolah" value="{{ old('nama_sekolah') }}"
                                            name="nama_sekolah" autocomplete="off" autofocus />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">NPSN</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="number" placeholder="nomor pokok sekolah nasional"
                                            value="{{ old('npsn') }}" name="npsn" autocomplete="off" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Alamat </label>
                                        <textarea
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder=" alamat sekolah"
                                            value="{{ old('alamat_sekolah') }}" name="alamat_sekolah" autocomplete="off"
                                            autofocus cols="20" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Kode pos</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="number" placeholder="kode pos " value="{{ old('kode_pos') }}"
                                            name="kode_pos" autocomplete="off" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Provinsi</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="Provinsi " value="{{ old('provinsi') }}"
                                            name="provinsi" autocomplete="off" autofocus />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Kabupaten /
                                            Kota</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="kabupaten / kota "
                                            value="{{ old('kabupaten_kota') }}" name="kabupaten_kota" autocomplete="off"
                                            autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Kelurahan</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="kelurahan" value="{{ old('kelurahan') }}"
                                            name="kelurahan" autocomplete="off" autofocus />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Telepon</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="nomor telepon " value="{{ old('no_tlpn') }}"
                                            name="no_tlpn" autocomplete="off" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Website </label>
                                    <input
                                        class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                        type="text" placeholder="website " value="{{ old('website') }}" name="website"
                                        autocomplete="off" autofocus />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input
                                        class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                        type="text" placeholder="Email " value="{{ old('email_sekolah') }}"
                                        name="email_sekolah" autocomplete="off" autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Nama Kepala
                                            Sekolah</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="nama kepala sekolah"
                                            value="{{ old('nama_kepsek') }}" name="nama_kepsek" autocomplete="off"
                                            autofocus />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">NIP. Kepala
                                            Sekolah</label>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="text" placeholder="NIP kepala sekolah" value="{{ old('nip_kepsek') }}"
                                            name="nip_kepsek" autocomplete="off" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Logo Sekolah</label>
                                        <small>(png,
                                            jpeg,
                                            jpg)</small>
                                        <input
                                            class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                            type="file" placeholder="Logo sekolah" value="{{ old('logo') }}" name="logo"
                                            autocomplete="off" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email Admin </label>
                                    <input
                                        class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                        type="email" placeholder="email admin " value="{{ old('website') }}"
                                        name="website" autocomplete="off" autofocus />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Password Admin</label>
                                    <input
                                        class="form-control form-control-solid h-auto py-3 px-3 rounded-lg @error('failed') is-invalid @enderror"
                                        type="password" placeholder="password admin " value="{{ old('email_sekolah') }}"
                                        name="email_sekolah" autocomplete="off" autofocus />
                                </div>
                            </div>
                        </form>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right">LOGIN</button>
                            <button type="submit" class="btn btn-warning btn-sm" value="{{ url('/') }}"
                                style="float: right">Kembali</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
</body>

</html>