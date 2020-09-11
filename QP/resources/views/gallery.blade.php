@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gallery</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            {!! Form::open(['route' => ['gallery.add'], 'method'=>'PUT']) !!}
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Gallery name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="galleryname">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}




                    @foreach ($file as $filelink)
                                <div class="galleryItem" style="background: url('{{ asset('/storage/upload/avatars/' . $user->id) }}/<?php echo basename($filelink);?>');background-size: cover; background-position: center">
                                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
