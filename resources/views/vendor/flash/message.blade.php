@if (Session::has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal', 
            'title'      => session('flash_notification.title'), 
            'body'       => session('flash_notification.message')
        ])
    @else
        @if ( Session::get('flash_notification.level') == 'danger')
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                {{ Session::get('flash_notification.message') }}
            </div>
        @elseif (Session::get('flash_notification.level') == 'info')
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                {{ Session::get('flash_notification.message') }}
            </div>
        @elseif (Session::get('flash_notification.level') == 'warning')
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                {{ Session::get('flash_notification.message') }}
            </div>
        @elseif (Session::get('flash_notification.level') == 'success')
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
    @endif
@endif