<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">导航</a>
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>--}}

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/posts">首页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts/create">创建文章</a>
            </li>
            @php($user = \Auth::user())
            @if($user)
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">{{$user->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/notices">通知</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">退出</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">登录</a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/posts/search" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
        </form>
    </div>
</nav>