@extends('layouts.back')

@section('content')
    <h3>Hallo!! {{auth()->user()->name}}</h3>
@endsection