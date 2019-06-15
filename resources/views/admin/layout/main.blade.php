@include("admin.layout.header")
@include("admin.layout.error")
<div>
    <nav class="navbar navbar-dark bg-primary navbar-expand" style="overflow: hidden">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    {{--<a class="nav-link text-light" href="#">退出</a>--}}
                </li>
            </ul>
            <a class="nav-link text-light" href="#">{{\Auth::guard("admin")->user()->name}}</a>
            <a class="nav-link text-light" href="/admin/logout">退出</a>
        </div>
    </nav>
    <div class="row" style="margin: 0!important;">
        <div class="col-sm-3 col-lg-2" style="padding: 0;">
            <nav class="nav flex-column">
                <a class="nav-link" href="/admin">首页</a>
                @can("permissions")
                    <a class="nav-link" href="/admin/admins">用户管理</a>
                    <a class="nav-link" href="/admin/roles">角色管理</a>
                    <a class="nav-link" href="/admin/permissions">权限管理</a>
                @endcan
                @can("posts")
                    <a class="nav-link" href="/admin/posts">文章管理</a>
                @endcan
                @can("notices")
                    <a class="nav-link" href="/admin/notices">通知管理</a>
                @endcan
            </nav>
        </div>
        <div class="col-sm-9 col-lg-10" style="padding: .5rem 1rem;">
            <div>@yield("content")</div>
        </div>
    </div>
</div>
@include("admin.layout.footer")