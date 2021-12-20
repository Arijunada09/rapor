@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data mapel</h3>
                            <div class="right">

                                <button type="button" class="btn" data-toggle="modal" id="btn-edit"
                                    data-target="#exampleModal">
                                    <i class="lnr lnr-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-stripped " id="tabelmapel">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Kode Mapel</th>
                                        <th>Nama Mapel</th>
                                        <th>KKM</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data mapel</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data" id="forms">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="kelas">kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="">--Pilih kelas--</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-gorup {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="kode" class="form-label">Kode Mata Pelajaran</label>
                        <input type="text" hidden name="id" id="id">
                        <input type="text" name="kode" class="form-control" id="kode" autocomplete="off">
                        @if ($errors->has('kode'))
                        <span class="help-block">{{ $errors->first('kode') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" name="nama" class="form-control" id="nama" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="kkm" class="form-label">kkm</label>
                        <input type="text" name="kkm" class="form-control" id="kkm" autocomplete="off" value="">
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">semester</label>
                        <input type="text" name="semester" class="form-control" id="semester" autocomplete="off"
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

<!-- Modal -->
<div class="modal fade" id="importmapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data mapel</h5>
            </div>
            {{-- <div class="modal-body">
                {!! Form::open(['route' => 'mapel.import' ,'class'=>'form-horizontal','enctype'=>
                'multipart/form-data']) !!}
                {!! Form::file('data_mapel') !!}
            </div> --}}
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="import" name="" id="">
            </div>
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
        $('#tabelmapel').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url: "{{ route('mapel.index') }}"
            },
            columns: [
                {
                    data: 'kelas',
                    name: 'kelas'
                },
                {
                    data: 'kode',
                    name: 'kode'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'kkm',
                    name: 'kkm'
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
            url: "{{ route('mapel.edit') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#id').val(res.id)
                $('#kelas').val(res.kelas)
                $('#kode').val(res.kode)
                $('#nama').val(res.nama)
                $('#kkm').val(res.kkm)
                $('#semester').val(res.semester)
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




    //     $('.delete').click(function () {
    //         var mapel_id = $(this).attr('mapel-id');
    //         swal({
    //                 title: "Yakin?",
    //                 text: "Menghapus Data mapel!",
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //             })
    //             .then((willDelete) => {
    //                 if (willDelete) {
    //                     window.location = "mapel/" + mapel_id + "/delete";
    //                 }
    //             });
    //     });
    // });
</script>
{{-- <script>
    $(document).ready( function () {
    $('#tabelmapel').DataTable();
    } );
</script> --}}
@endsection