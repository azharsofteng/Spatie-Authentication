<div class="card mt-3" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="list-group-item"><a href="">Create new role</a></li>
        @can('User Management')
            <li class="list-group-item"><a href="{{ route('new.user') }}">Add new user</a></li>
        @endcan
    </ul>
</div>    