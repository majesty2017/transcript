@if(Session::has('info'))
    <div class="row">
        <div class="col-md-8 offset-3">
            <div class="alert alert-info" role="alert">
                <p>{{ Session::get('info') }}</p>
            </div>
        </div>
    </div>
@elseif(Session::has('error'))
    <div class="row">
        <div class="col-md-8 offset-3">
            <div class="alert alert-danger" role="alert">
                <p>{{ Session::get('error') }}</p>
            </div>
        </div>
    </div>
@endif
