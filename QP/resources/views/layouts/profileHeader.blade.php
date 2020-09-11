<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($user->friendshipStatus == 'MY_PROFFILE')
                        <div>Мой профиль</div>
                    @elseif($user->friendshipStatus == 'FRIEND')
                        <a href="{{ URL::previous() }}">Back</a> | <a href="{{ route('destroy', ['alias' => $user->id]) }}" class="card-link">Удалить из друзей</a>
                    @elseif($user->friendshipStatus == 'FOLLOWER')
                        <a href="{{ URL::previous() }}">Back</a> | <a href="{{ route('destroy', ['alias' => $user->id]) }}" class="card-link">Отменить подписку</a>
                    @elseif($user->friendshipStatus == 'SUBSCRIBER')
                        <div>Подписчик</div>
                    @else
                        <a href="{{ URL::previous() }}">Back</a> | <a href="{{ route('friends.add', ['alias' => $user->id]) }}" class="card-link">Добавить в друзья</a>
                    @endif


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <div class="" style="text-align: center">

                        <div class="profileAvatar" style="background: url('{{ asset('/storage/upload/avatars/' . $user->avatar) }}');background-size: cover; background-position: center">

                        </div>

                      <!-- <img src="{{ asset('/storage/upload/avatars/' . $user->avatar) }}" alt=""> -->
                      {{ $user->full_name }} </br> <b>@</b>{{ $user->linkname }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
