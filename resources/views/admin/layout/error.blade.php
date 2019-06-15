@if(count($errors))
    <div class="position-fixed" style="z-index: 9;right: 10px; top: 20px;max-width: 400px;">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>错误</strong> <br>
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    </div>
@endif