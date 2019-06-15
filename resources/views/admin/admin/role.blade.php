@extends("admin.layout.main")
@section("content")
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">增加角色</h5>
            <form action="/admin/admins/{{$admin->id}}/store" method="post">
                @csrf
                @foreach($items as $item)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                               @if($mines->contains($item))
                                    checked
                               @endif
                               id="roles{{$item->id}}" name="roles[]" value="{{$item->id}}">
                        <label class="custom-control-label" for="roles{{$item->id}}">{{$item->name}}</label>
                    </div>
                @endforeach
                <input type="submit" class="btn-primary btn mt-3" value="提交用户">
            </form>
        </div>
    </div>
@endsection