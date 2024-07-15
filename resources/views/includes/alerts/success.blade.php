@if(session('success'))
    <div class="alert alert-success alert-dismissible success-msg fade show" role="alert">
        {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
