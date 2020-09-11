
<div class="card-header">Posts</div>
<div class="" style="padding: 50px;">

  @if($user == Auth::user())

  {!! Form::open(['route' => ['post.save']]) !!}
    <div class="form-group">
      <label for="formGroupExampleInput">Theme</label>
      <input name="theme" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example theme">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Content</label>
      <textarea name="content" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another content"></textarea>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  {!! Form::close() !!}

  @else

  Недостаточно прав для добавление чужих записей

  @endif

</div>
</div>
