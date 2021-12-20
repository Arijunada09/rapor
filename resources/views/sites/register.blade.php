@extends('layouts.frontend')

@section('content')
<div class="main">
    <div class="max-inner">
        <div class="row">
            <div class="columns col-12">
                <header class="section-heading">
                    <h2 style="font-size: 30px;">REGISTRASI</h2>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="columns col-12">
                <!-- <h2>Get in touch with us</h2> -->
                {!! Form::open(['url' => '/postregister']) !!}
                {!! Form::text('nama_depan', '',['class' => 'form-control', 'placeholder' => 'Nama Depan']) !!}
                {!! Form::text('nama_belakang', '',['class' => 'form-control', 'placeholder' => 'Nama Belakang']) !!}
                {!! Form::text('agama', '',['class' => 'form-control', 'placeholder' => 'agama']) !!}
                {!! Form::textarea('alamat', '',['class' => 'form-control', 'placeholder' => 'alamat']) !!}
                <div class="form-select">
                    {!! Form::select('jenis_kelamin', ['laki-laki' => 'laki-laki', 'perempuan'
                    =>'perempuan'],['style'=>'display:none']) !!}
                </div>
                {!! Form::email('email', '',['class' => 'form-control', 'placeholder' => 'email']) !!}
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'password']) !!}

                <button type="submit" class="btn btn-success" value="kirim">Simpan</button>
                {!! Form::close() !!}
            </div>
        </div>


    </div>
</div>
@endsection