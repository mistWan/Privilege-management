@extends("index.layout.main")
@section("title", "通知")
@section("content")
    <div class="m-auto" style="max-width: 1000px">
        <div>
            @include("index.layout.bar")
            @foreach($items as $item)
                <div class="card" style="margin: 10px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->content}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection