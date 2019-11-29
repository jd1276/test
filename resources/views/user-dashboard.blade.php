
@extends('layouts.main')

@section('content')

        <h3 align="center">Hello User</h3><button style="cursor: pointer;" onclick="window.location='{{ route("user-logout") }}'">LogOut</button>
@endsection
