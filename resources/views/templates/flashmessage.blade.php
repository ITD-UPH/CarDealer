@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{session('success')}}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{session('warning')}}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{session('info')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{session('error')}}
    </div>
@endif