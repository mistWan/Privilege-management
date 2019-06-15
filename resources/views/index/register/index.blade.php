@extends("index.layout.main")
@section("title", "register")
@section("content")
    @include("index.layout.error")
    <div class="root mt-lg-5 m-auto" style="max-width: 300px;">
        <form action="/register" method="post">
            @csrf
            <h3 class="pb-3 pt-2">注册</h3>
            <div class="form-group">
                <label for="name">用户</label>
                <input type="text" class="form-control" id="name" placeholder="请输入用户名" name="name">
            </div>
            <div class="form-group">
                <label for="email">邮箱</label>
                <input type="email" class="form-control" id="email" placeholder="请输入用户名" name="email">
            </div>
            <div class="form-group pb-3">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
            </div>
            <div class="form-group pb-3">
                <label for="password_confirmation">确认密码</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="请确认密码" name="password_confirmation">
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="注册">
        </form>
        <a class="btn btn-dark btn-block" href="/login">登录</a>
    </div>
@endsection