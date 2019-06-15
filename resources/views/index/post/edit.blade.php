@extends("index.layout.main")
@section("title", "创建文章")
@section("content")
    <div class="m-auto" style="max-width: 1000px">
        <div>
            @include("index.layout.bar")
            <form method="post" action="/posts/{{$item->id}}">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$item->title}}">
                </div>
                <div class="form-group">
                    <label for="content">内容</label>
                    <textarea class="form-control" name="content" id="content" rows="20">{{$item->content}}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="提交">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection