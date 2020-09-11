
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">People</div>

                <div class="card-body" style="padding-top: 30px;">

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="linkname" aria-label="linkname" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button">search</button>
                    </div>
                  </div>

<div class="row" style="margin-top: -20px;">
                    @foreach($users as $user)
                    <div class="col-sm-4" style="margin-top: 25px;">
                      <div class="card">
                        <div class="profileAvatarPeople" style="background: url('{{ asset('/storage/upload/avatars/' . $user->avatar) }}');
                        background-size: cover; background-position: center">
                        </div>
                        <div class="card-body">
                          <a href="/{{$user->linkname}}"><h5 class="card-title">{{$user->linkname}}</h5></a>
                          <p class="card-text">{{$user->fullname}}</p>
                          <a href="#" class="btn btn-primary">Добавить в друзья</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
