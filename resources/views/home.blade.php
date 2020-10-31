@extends('layouts.auth')


@section('content')

    <h1>HOME PAGE {{  Auth::user()->name }}</h1>
@endsection
