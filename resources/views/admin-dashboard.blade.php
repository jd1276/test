
@extends('layouts.main')

@section('content')
<h1>Welcome admin</h1>

<button style="cursor: pointer;" onclick="window.location='{{ route("admin-logout") }}'">LogOut</button>
@endsection
