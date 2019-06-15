@extends("admin.layout.main")
@section("content")
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">增加角色</h5>
            <form action="/admin/roles/{{$role->id}}/store" method="post">
                @csrf
                @foreach($items as $item)
                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input"
                               @if($mines->contains($item))
                               checked
                               @endif
                               id="permissions{{$item->id}}" name="permissions[]" value="{{$item->id}}">
                        <label class="custom-control-label" for="permissions{{$item->id}}">{{$item->name}}</label>
                    </div>
                @endforeach
                <input type="submit" class="btn-primary btn mt-3" value="提交角色">
            </form>
        </div>
    </div>
@endsection