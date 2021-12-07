<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="container">
        @can('create post', Role::class)
            <div class="mb-3">
                <small class="d-block mb-2 text-secondary">Post</small>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"> Create Post</a>
                    <a href="#" class="list-group-item list-group-item-action"> Show Post</a>
                    <a href="#" class="list-group-item list-group-item-action"> Data Table Post</a>
                </div>
        </div>    
        @endcan
        
        @can('create category', Role::class)
            <div class="mb-3">
                <small class="d-block mb-2 text-secondary">Category</small>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"> Create Category</a>
                    <a href="#" class="list-group-item list-group-item-action"> Show Category</a>
                    <a href="#" class="list-group-item list-group-item-action"> Data Table Category</a>
                </div>
        </div>
        @endcan

        @can('create user', Role::class)
            <div class="mb-3">
                <small class="d-block mb-2 text-secondary">Users</small>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"> Create Users</a>
                    <a href="#" class="list-group-item list-group-item-action"> Show Users</a>
                    <a href="#" class="list-group-item list-group-item-action"> Data Table Users</a>
                </div>
            </div>
        @endcan
        
        <div class="mb-3">
            <small class="d-block mb-2 text-secondary">Admin</small>
            <div class="list-group">
                <a href="{{ route('role.index')}}" class="list-group-item list-group-item-action active"> Role</a>
                <a href="{{route('permission.index')}}" class="list-group-item list-group-item-action"> Permission</a>
                <a href="{{ route('assign.index') }}" class="list-group-item list-group-item-action">Assign Permissions</a>
                <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">Assign Admin</a>
            </div>
        </div>
        <div class="mb-3">
            <small class="d-block text-secondary">Logout</small>
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
        </div>
    </div>
</div>