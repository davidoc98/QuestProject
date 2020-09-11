@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subscribers {{$user->linkname}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

<h3>Друзья</h3>
    @foreach ($friends as $friend)
        @if($user->id != $friend->user->id)
            <a href="/{{$friend->user->linkname}}">{{$friend->user->linkname}} | {{$friend->user->fullname}}</a><br>
        @else
            <a href="/{{$friend->friend->linkname}}">{{$friend->friend->linkname}} | {{$friend->friend->fullname}}</a><br>
        @endif
    @endforeach
<h3>Подписчики</h3>
   @foreach ($subscribers as $subscriber)
       @if($user->id != $subscriber->user->id)
            <a href="/{{$subscriber->user->linkname}}">{{$subscriber->user->linkname}} | {{$subscriber->user->fullname}}</a><br>
            <a href="{{ route('friends.add', ['alias' => $subscriber->user->id]) }}" class="card-link">Добавить в друзья</a><br>
       @else
            <a href="/{{$subscriber->friend->linkname}}">{{$subscriber->friend->linkname}} | {{$subscriber->friend->fullname}}</a><br>

            <a href="{{ route('friends.add', ['alias' => $subscriber->friend->id]) }}" class="card-link">Добавить в друзья</a><br>
       @endif
    @endforeach
<h3>Подписки</h3>
    @foreach ($followers as $followers)
        @if($user->id != $followers->user->id)
            <a href="/{{$followers->user->linkname}}">{{$followers->user->linkname}} | {{$followers->user->fullname}}</a><br>
        @else
            <a href="/{{$followers->friend->linkname}}">{{$followers->friend->linkname}} | {{$followers->friend->fullname}}</a><br>
        @endif
    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
