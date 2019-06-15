@include("admin.layout.header")
<div class="m-auto" style="max-width: 300px;padding-top: 100px;">
    <h5>管理员登录</h5>
    @include("admin.layout.error")
    <form method="post" action="/admin/login">
        @csrf
        <div class="form-group mt-3">
            <label for="name">账号</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter admin name">
        </div>
        <div class="form-group mt-3">
            <label for="password">密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        {{--<div class="form-check">
            <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>--}}
        <button type="submit" class="btn btn-block btn-primary mt-lg-4">登录</button>
    </form>
</div>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
