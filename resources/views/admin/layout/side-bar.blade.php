<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{route('admin.home')}}" class="simple-text logo-normal">
Photo Share        </a>
    </div>
    <div class="sidebar-wrapper ">
        <ul class="nav">
            <li class="nav-item {{is_active('home')}}">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{is_active('users')}}">
                <a class="nav-link" href="{{route('admin.users.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{is_active('albums')}}">
                <a class="nav-link" href="{{route('admin.albums.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Albums</p>
                </a>
            </li>

            <li class="nav-item {{is_active('roles')}}">
                <a class="nav-link" href="{{route('admin.roles.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Roles</p>
                </a>
            </li>

            <li class="nav-item {{is_active('permissions')}}">
                <a class="nav-link" href="{{route('admin.permissions.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Permissions</p>
                </a>
            </li>
{{--            <li class="nav-item active-pro ">--}}
{{--                <a class="nav-link" href="./upgrade.html">--}}
{{--                    <i class="material-icons">unarchive</i>--}}
{{--                    <p>Upgrade to PRO</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
