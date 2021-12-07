@extends('layouts.back')

@section('content')
    {{-- @dump($role)    --}}
        <div>
            <form action="{{ route('role.create')}}" method="post">
                @csrf
                @include('permission.role.partials.form-control',['submit'=>'create'])   
            </form>    
        </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Guard</th>
                <th>Crated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->guard_name}}</td>
                    <td>{{$item->created_at->format("D F Y")}}</td>
                    <td><a href="{{ route('role.edit',$item) }}" class="btn btn-primary" role="button">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table> 
@endsection