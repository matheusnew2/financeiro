@extends('layout.header')
@section('content')
<div class="container-fluid">
    <form action="{{asset('/logar')}}" method="POST">
        @csrf
        <input type="text" name="login">
        <input type="password" name="senha">
        <input type="submit" name="submit">
</form>
</div>
@endsection