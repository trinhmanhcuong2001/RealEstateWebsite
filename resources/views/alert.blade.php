
<style>
    .alert {
        z-index: 1000;
        text-align: center
    }
</style>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif