@foreach($errors->all() as $error)
    <div class="alert alert-danger">

        <div class="icon-wrapper"></div>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ $error }}
    </div>
@endforeach

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">

        <div class="icon-wrapper"></div>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif