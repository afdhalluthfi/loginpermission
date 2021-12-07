@extends('layouts.base')

@section('body')
    <x-layout.navigation></x-layout.navigation>
    <main class="pt-4">
        @yield('content')
    </main>
@endsection