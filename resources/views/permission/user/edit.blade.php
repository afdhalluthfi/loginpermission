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
    <form action="{{ route('user.edit',$user) }}" method="post">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <select name="user" id="name" class="form-control select-dropwon">
                    <option value="{{ $user->id }}">{{ $user->email}}</option>
            </select>
        </div>    
      <div class="form-group">
          <label for="role">Role</label>
          <select multiple name="role[]" class="form-control select2">
              @foreach ($roles as $role)
              <option {{$user->roles()->find($role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
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