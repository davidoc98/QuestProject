  @isset($posts)
                    @foreach($posts as $post)
                    <div class="card" style="margin-top: 10px; padding: 5px; padding-left: 20px;">
                      <li class="media" style="padding-top: 15px;">
                        <div class="profileAvatarPost mr-3" style="background: url('{{ asset('/storage/upload/avatars/' . $user->avatar) }}');background-size: cover; background-position: center"></div>
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">{{$post->theme}}</h5>
                          {{$post->content}} <br>

                            @if ($user == Auth::user())
                          <a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="card-link">Удалить</a>
                          <a href="#" class="card-link">Редактировать</a>
                            @endif

                          <footer class="blockquote-footer">{{$user->linkname}}, {{$post->created_at->diffForHumans()}}</footer>
                        </div>
                      </li>
                    </div>
                    @endforeach
@endisset
                @empty($posts)
                    <div class="post_text">Записей не найдено.</div>
                @endempty
