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

    {{-- @dump($role->permissions) --}}
    <form action="{{ route('assign.edit',$role) }}" method="post">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <select name="role" id="name" class="form-control select-dropwon">
                    <option value="{{ $role->id }}">{{ $role->name}}</option>
            </select>
        </div>    
         <div class="form-group">
            <label for="guard_name">guard</label>
            <select multiple name='permission[]' class="select-multiple select2 form-control">
                <option>nama</option>    
                @foreach ($permission as $item)
                    <option {{$role->permissions()->find($item->id) ? 'selected' :''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>    
        </div> 
        <button type="submit" class="btn btn-success">Assign</button>
    </form>
    <hr/>
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