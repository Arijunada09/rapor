@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Post Artikel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('posts.create') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-gorup {{ $errors->has('title') ? 'has-error' : '' }}">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">content</label>
                                            <textarea name="content" class="form-control" id="content"></textarea>
                                        </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                    <div class="input-gorup">
                                        <input type="submit" class="btn btn-info" value="submit">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );

       $(document).ready(function(){
            $('#lfm').filemanager('image');
       });
</script>
@endsection