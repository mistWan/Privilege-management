@extends("index.layout.main")
@section("title", "login")
@section("content")
    <div class="root mt-lg-5 m-auto" style="max-width: 400px;">
        @include("index.layout.error")
        <form action="/login" method="post">
            @csrf
            <h3 class="pb-3 pt-2">登录</h3>
            <div class="form-group">
                <label for="name">账号</label>
                <input type="text" class="form-control" id="name" placeholder="请输入用户名" name="name">
            </div>
            <div class="form-group pb-3">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember" checked>
                <label class="form-check-label" for="remember">记住我</label>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="登录">
        </form>
        <a class="btn btn-dark btn-block" href="/register">注册</a>
    </div>
@endsection