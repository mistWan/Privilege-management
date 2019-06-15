@extends("admin.layout.main")
@section("content")
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">文章管理</h5>
            <div class="mt-3 mb-3">
                <a class="btn btn-primary" href="/admin/posts/export" role="button">导出</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">导入</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">导入数据</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/admin/posts/import" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="excel" class="custom-file-input" id="excel"
                                                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                                   title="请选择文件">
                                            <label class="custom-file-label" for="excel">Choose file</label>
                                        </div>
                                        {{--<div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">Button</button>
                                        </div>--}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">标题</th>
                    <th scope="col">通过</th>
                    <th scope="col">拒绝</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td><button class="btn btn-success btn-sm status" post-id="{{$item->id}}" post-status="1">通过</button></td>
                        <td><button class="btn btn-danger btn-sm status" post-id="{{$item->id}}" post-status="-1">拒绝</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$items->links()}}
        </div>
    </div>
@endsection
