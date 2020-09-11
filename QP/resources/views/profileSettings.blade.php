@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile settings for {{ Auth::user()->linkname }}</div>
                <div class="card-body">



                  {!! Form::open(['route' => ['profile.update'], 'method'=>'PUT']) !!}
                  <div class="form-group">
                    <label for="formGroupExampleInput">Your Firstname</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="firstname" value="{{$user->firstname}}">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Yout Surname</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="surname" value="{{$user->surname}}">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Your Linkname</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="linkname" value="{{$user->linkname}}">
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                  {!! Form::close() !!}


<div class="" style="padding: 25px; background: rgba(0, 0, 0, 0.125); border-radius: 3px;
 margin-top: 10px; margin-bottom: 10px;">
  <div class="profileAvatar" style="background: url('{{ asset('/storage/upload/avatars/' . $user->avatar) }}');
  background-size: cover; background-position: center">
  </div>
</div>


                              {!! Form::open(['route' => ['avatar.update'], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                              <div class="custom-file" style="margin-bottom: 10px;">
                                <input type="file" name="avatar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>

                              <input type="submit" class="btn btn-primary" value="Submit">
                            {!! Form::close() !!}






                </div>
            </div>
            @include('layouts/output')
        </div>
    </div>
</div>
@endsection
