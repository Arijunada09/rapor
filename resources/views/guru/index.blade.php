@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data guru</h3>
                            <div class="right">

                                <button type="button" class="btn" data-toggle="modal" id="btn-edit"
                                    data-target="#exampleModal">
                                    <i class="lnr lnr-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-stripped " id="tabelguru">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data guru</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('guru.store') }}" method="POST" id=" forms">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="sekolah">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option value="">--Pilih kelas--</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-gorup {{ $errors->has('kode_guru') ? 'has-error' : '' }}">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" hidden name="id" id="id">
                        <input type="text" name="nama" class="form-control" id="nama" autocomplete="off">
                        @if ($errors->has('nama'))
                        <span class="help-block">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" name="telp" class="form-control" id="telp" autocomplete="off">
                    </div>
                    <div class="mb-3"><label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><select
                            name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                            aria-label="Default select example">
                            <option selected>--pilih Jenis Kelamin--</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select></div>
                    <div class="mb-3"><label for="status" class="form-label">Jenis Status</label><select name="status"
                            id="status" class="form-control" aria-label="Default select example">
                            <option selected>--pilih Jenis Status--</option>
                            <option value="wali kelas">Wali Kelas</option>
                            <option value="guru mapel">Guru Mata Pelajaran</option>
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
                        <textarea name="alamat" class="form-control" id="alamat" rows="3" value="alamat">
                            </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" autocomplete="off"
                            value="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mb-3" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-primary mb-3">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
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
                $('#tabelguru').DataTable().ajax.reload()

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
        $('#tabelguru').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url: "{{ route('guru.index') }}"
            },
            columns: [
                {
                    data: 'id_kelas',
                    name: 'id_kelas'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'status',
                    name: 'status'
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
        $('#forms').attr('action', "{{ route('guru.update') }}")
        let id = $(this).attr('id')
        $.ajax({
            url: "{{ route('guru.edit') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#id').val(res.id)
                $('#sekolah').val(res.sekolah)
                $('#kode_guru').val(res.kode_guru)
                $('#nama_guru').val(res.nama_guru)
                $('#tahun_ajaran').val(res.tahun_ajaran)
                $('#btn-edit').click()
                $('#tabelguru').DataTable().ajax.reload()
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
                    url: "{{ route('guru.destroy') }}",
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




    //     $('.delete').click(function () {
    //         var guru_id = $(this).attr('guru-id');
    //         swal({
    //                 title: "Yakin?",
    //                 text: "Menghapus Data guru!",
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //             })
    //             .then((willDelete) => {
    //                 if (willDelete) {
    //                     window.location = "guru/" + guru_id + "/delete";
    //                 }
    //             });
    //     });
    // });
</script>
{{-- <script>
    $(document).ready( function () {
    $('#tabelguru').DataTable();
    } );
</script> --}}
@endsection