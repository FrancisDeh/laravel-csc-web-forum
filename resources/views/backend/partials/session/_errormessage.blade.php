{{--Error Notifications--}}
<div class="row">
    <div class="col-sm-12">
        @if (count($errors->all()))
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
                <b>Error:</b> {{$error}}
           
            </div>
             @endforeach
        @endif
    </div>
</div>