@extends('layouts.back')

@section('content')
    {{-- @dump($role)    --}}
        <div>
            <form action="{{ route('role.edit',$role)}}" method="post">
                @csrf
                @method('PUT')
                @include('permission.role.partials.form-control')   
            </form>    
        </div>
@endsection