@extends('layouts.app')
@section('content')
<!-- Вывод шабки профиля -->
@include('layouts/profileHeader')
<div class="container" style="margin-top: 10px;">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<!-- Вывод полей для добавления постов -->
@include('layouts/postAdd')
<!-- Вывод ошибок и прочего (ошибки.outpud и прочее) -->
@include('layouts/output')
<!-- Вывод Постов и их отсутствия -->
@include('layouts/post')

</div>
</div>
</div>
</div>














@endsection
