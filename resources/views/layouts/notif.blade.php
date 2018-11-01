@if (Session::has('error'))
    <div class="session-flash alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if (Session::has('notice'))
    <div class="session-flash alert-info">
        {{Session::get('notice')}}
    </div>
@endif