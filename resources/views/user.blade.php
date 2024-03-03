@extends('layouts.layout')

@error("error")
<span class="error-alert">{{ $message }}</span>
@enderror

@section("page")

<form action="{{ route("user.store") }}" method="POST">

@error("nickname")
    <span class="error-alert">{{ $message }}</span>
@enderror
<input type="text" name="nickname" value="{{ old("nickname") }}">

@error("password")
    <span class="error-alert">{{ $message }}</span>
@enderror
<input type="text" name="password" value="{{ old("password") }}">

@error("role")
    <span class="error-alert">{{ $message }}</span>
@enderror
<input type="text" name="role" value="{{ old("role") }}">

<button type="submit" class="btn">enviar</button>

</form>
@endsection