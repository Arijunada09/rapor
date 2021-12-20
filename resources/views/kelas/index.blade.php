@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data kelas</h3>
                            <div class="right">

                                <button type="button" class="btn" data-toggle="modal" id="btn-edit"
                                    data-target="#exampleModal">
                                    <i class="lnr lnr-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-stripped " id="tabelkelas">
                                <thead>
                                    <tr>
                                        <th>NPSN</th>
                                        <th>Kode kelas</th>
                                        <th>Nama kelas</th>
                                        <th>Semester</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data kelas</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas.store') }}" method="POST" id=" forms">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <select name="sekolah" id="sekolah" class="form-control">
                            <option value="">--Pilih sekolah--</option>
                            @foreach ($sekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-gorup {{ $errors->has('kode_kelas') ? 'has-error' : '' }}">
                        <label for="kode_kelas" class="form-label">Kode Kelas</label>
                        <input type="text" hidden name="id" id="id">
                        <input type="text" name="kode_kelas" class="form-control" id="kode_kelas" autocomplete="off">
                        @if ($errors->has('kode_kelas'))
                        <span class="help-block">{{ $errors->first('kode_kelas') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">tahun_ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" autocomplete="off"
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
                $('#tabelkelas').DataTable().ajax.reload()

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
        $('#tabelkelas').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url: "{{ route('kelas.index') }}"
            },
            columns: [
                {
                    data: 'sekolah',
                    name: 'sekolah'
                },
                {
                    data: 'kode_kelas',
                    name: 'kode_kelas'
                },
                {
                    data: 'nama_kelas',
                    name: 'nama_kelas'
                },
                {
                    data: 'tahun_ajaran',
                    name: 'tahun_ajaran'
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
        $('#forms').attr('action', "{{ route('kelas.update') }}")
        let id = $(this).attr('id')
        $.ajax({
            url: "{{ route('kelas.edit') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#id').val(res.id)
                $('#sekolah').val(res.sekolah)
                $('#kode_kelas').val(res.kode_kelas)
                $('#nama_kelas').val(res.nama_kelas)
                $('#tahun_ajaran').val(res.tahun_ajaran)
                $('#btn-edit').click()
                $('#tabelkelas').DataTable().ajax.reload()
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
                    url: "{{ route('kelas.destroy') }}",
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
    //         var kelas_id = $(this).attr('kelas-id');
    //         swal({
    //                 title: "Yakin?",
    //                 text: "Menghapus Data kelas!",
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //             })
    //             .then((willDelete) => {
    //                 if (willDelete) {
    //                     window.location = "kelas/" + kelas_id + "/delete";
    //                 }
    //             });
    //     });
    // });
</script>
{{-- <script>
    $(document).ready( function () {
    $('#tabelkelas').DataTable();
    } );
</script> --}}
@endsection