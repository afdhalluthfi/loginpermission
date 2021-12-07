@extends('layouts.back')

@section('content')
    {{-- @dump($role)    --}}
        <div>
            <form action="{{ route('permission.edit',$permission)}}" method="post">
                @csrf
                @method('PUT')
                @include('permission.permissions.partials.form-control')   
            </form>    
        </div>
@endsection