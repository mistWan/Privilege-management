@extends("index.layout.main")
@section("title", "首页")
@section("content")
    <div class="m-auto" style="max-width: 1000px">
        <div>
            @include("index.layout.bar")
            @foreach($items as $item)
                <div class="card" style="margin: 10px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{str_limit($item->content, 100, '...')}}</p>
                        <a href="/posts/{{$item->id}}" class="btn btn-primary">查看</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection