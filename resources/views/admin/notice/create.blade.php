@extends("admin.layout.main")
@section("content")
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">增加通知</h5>
            <form method="post" action="/admin/notices">
                @csrf
                <div class="form-group">
                    <label for="title">通知名称</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="content">通知内容</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <input type="submit" value="提交通知" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection