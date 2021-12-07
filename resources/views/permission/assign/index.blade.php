@extends('layouts.back')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif

    <form action="{{ route('assign.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <select name="role" id="name" class="form-control select-dropwon">
                @foreach ($role as $item)
                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                @endforeach
            </select>
        </div>    
         <div class="form-group">
            <label for="guard_name">guard</label>
            <select multiple name='permission[]' class="select-multiple select2 form-control">
                <option>nama</option>    
                @foreach ($permission as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>    
        </div> 
        <button type="submit" class="btn btn-success">Assign</button>
    </form>
    <hr/>
    <div class="card">
        <div class="car-header">Assign Admin</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Guard</th>
                        <th>Permission Assign</th>
                        <th>Sycn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $index=>$item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->guard_name}}</td>
                            <td>{{implode(', ',$item->getPermissionNames()->toArray())}}</td>
                            <td><button onclick="location.href='{{route('assign.edit',$item)}}';" class='badge badge-pil badge-success'>Syc</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        
       $(document).ready(function() {
    $('.select2').select2({
        placeholder:"Pilih hak aksess"
    });
        $('.select-dropwon').select2({
            placeholder:"Pilih Role",
            allowClear:true
    })
});
    </script>
@endpush