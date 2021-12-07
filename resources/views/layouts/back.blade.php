@extends('layouts.base')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-layout.sidebar></x-layout.sidebar>
            </div>
            <div class="col-md-9">
                <div class="mt-2 py-3">
                    <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection