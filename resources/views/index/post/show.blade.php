@extends("index.layout.main")
@section("title", "文章")
@section("content")
<div class="m-auto" style="max-width: 1000px">
    <div>
        @include("index.layout.bar")
        <div class="card">
            <div class="card-header">
                {{$item->title}}
            </div>
            <div class="card-body">
                <p class="card-text">{!! $item->content !!}</p>
            @can('update', $item)
                <a href="/posts/{{$item->id}}/edit" class="btn btn-primary">编辑</a>
            @endcan
                {{--@if(\Auth::admin()->can("update", $item))
                    <a href="/posts/{{$item->id}}/edit" class="btn btn-primary">编辑</a>
                @endif--}}
            </div>
        </div>
    </div>
</div>
@endsection