@if (session($key ?? 'error'))
    <div class="alert alert-danger" role="alert">
        {!! session($key ?? 'error') !!}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
