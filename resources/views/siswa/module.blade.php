@extends('layouts.master') @section('content') <div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inputan Nilai</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{ url('/nilaisiswa') }}" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                                        <select name="nilai" id="nilai" class="form-control">
                                            <option value="" selected>--pilih Mata pelajaran</option>
                                            @foreach ($mapel as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Jenis Penilaian</label>
                                        <select name="" id="" class="form-control">
                                            <option value="" selected>--pilih Jenis Penilaian</option>
                                            <option value="pengetahuan">Pengetahuan</option>
                                            <option value="keterampilan">Keterampilan</option>
                                        </select>
                                    </div>
                                </form>
                                <button type="submit" class="btn btn-primary btn-sm"
                                    style="float: right">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" id="forms">
                    {{csrf_field()}}

                    <div class="form-group"><label for="kelas">kelas</label><select name="kelas" id="kelas"
                            class="form-control">
                            <option value="">--Pilih kelas--</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}"> {{$item->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-gorup {{ $errors->has('nama_depan') ? 'has-error' : '' }}"><label for="nama_depan"
                            class="form-label">Nama Depan</label><input type="text" hidden name="id" id="id"><input
                            type="text" name="nama_depan" class="form-control" id="nama_depan" autocomplete="off">
                        @if($errors->has('nama_depan')) <span class="help-block"> {{$errors->first('nama_depan')}}

                        </span>@endif </div>
                    <div class="mb-3"><label for="nama_belakang" class="form-label">Nama Belakang</label><input
                            type="text" name="nama_belakang" class="form-control" id="nama_belakang" autocomplete="off">
                    </div>
                    <div class="mb-3"><label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><select
                            name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                            aria-label="Default select example">
                            <option selected>--pilih Jenis Kelamin--</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select></div>
                    <div class="mb-3"><label for="agama" class="form-label">Agama</label><select name="agama" id="agama"
                            class="form-control" aria-label="Default select example">
                            <option selected>--Pilih Agama--</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select></div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3" value="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name="email" class="form-control" id="email" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" autocomplete="off">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mb-3" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-primary mb-3">Save</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}

{{-- <div class="modal fade" id="importSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
            </div>
            <div class="modal-body"> {
                ! ! Form: :open(['route'=> 'siswa.import', 'class'=>'form-horizontal', 'enctype'=>
                'multipart/form-data']) ! !
                }

                {
                ! ! Form: :file('data_siswa') ! !
                }

            </div>
            <div class="modal-footer"><input type="submit" class="btn btn-primary" value="import" name="" id="">
            </div>
        </div>
    </div>
</div>--}}

@endsection @section('footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).on('submit', 'form', function () {
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            typeData: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                $('#btn-tutup').click()
                alert(res.text)
                $('#tabelmapel').DataTable().ajax.reload()

            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    })


    $(document).ready(function () {
        loaddata()
    })

    function loaddata() {
        $('#tabelsiswa').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url: "{{ route('siswa.index') }}"
            },
            columns: [{
                    data: 'nama_depan',
                    name: 'nama_depan'
                },
                {
                    data: 'kelas',
                    name: 'kelas'
                },
                {
                data: 'email',
                name: 'email'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                },
            ]
        })
    }

    $(document).on('click', '.edit', function () {
        $('#forms').attr('action', "{{ route('mapel.update') }}")
        let id = $(this).attr('id')
        $.ajax({
            url: "{{ route('siswa.edit') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#id').val(res.id)
                $('#kelas').val(res.kelas)
                $('#nama_depan').val(res.nama_depan)
                $('#nama_belakang').val(res.nama_belakang)
                $('#jenis_kelamin').val(res.jenis_kelamin)
                $('#agama').val(res.agama)
                $('#alamat').val(res.alamat)
                $('#email').val(res.email)
                $('#password').val(res.password)
                // $('#avatar').val(res.avatar)
                $('#btn-edit').click()
                $('#tabelmapel').DataTable().ajax.reload()
            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    })


    // hapus data
    $(document).on('click', '.hapus', function () {
        let id = $(this).attr('id')

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Menghapus Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Silahkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('mapel.destroy') }}",
                    type: 'post',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res, status) {
                        if (status = '200') {
                            setTimeout(() => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Data Berhasil Dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data Gagal Di hapus',
                        });
                    }
                })
            }
        })




    })



    // $(document).ready(function () {




    // $('.delete').click(function () {
    // var mapel_id = $(this).attr('mapel-id');
    // swal({
    // title: "Yakin?",
    // text: "Menghapus Data mapel!",
    // icon: "warning",
    // buttons: true,
    // dangerMode: true,
    // })
    // .then((willDelete) => {
    // if (willDelete) {
    // window.location = "mapel/" + mapel_id + "/delete";
    // }
    // });
    // });
    // });
</script>
{{-- <script>
    $(document).ready( function () {
        $('#tabelmapel').DataTable();
        } );
</script> --}}
</script>

@endsection