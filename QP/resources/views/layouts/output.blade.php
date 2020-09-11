
@if ($errors->any()) <div style="margin-top: 10px;"></div>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
      <b>Ошибка: </b>{{ $error }}
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (\Session::has('success')) <div style="margin-top: 10px;"></div>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! \Session::get('success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (\Session::has('notsuccess')) <div style="margin-top: 10px;"></div>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {!! \Session::get('notsuccess') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
