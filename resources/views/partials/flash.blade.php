@if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissable {{ Session::has('flash_message_important') ? 'alert-important' : '' }}" role="alert">
        @if(Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @endif

        {{ session('flash_message') }}

    </div>
@endif