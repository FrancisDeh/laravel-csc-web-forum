
@extends('backend.layout.master')
@section('title', 'Manage Administrators')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Administrators ({{count($admins) }})</h4>
        @if(count($admins) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                           
                            <td style="text-align: left;">{{$admin->name }}</td>
                            <td style="text-align: left;">{{$admin->email}}</td>
                           
         
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$admin->id}}" rel="tooltip" title="Edit admin" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._admineditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$admin->id}}" rel="tooltip" title="Remove admin" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._admindeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Administrators Available</p>
        @endif      

        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Add Administrator</h4>
            <form method="post" action="{{ route('admins.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-12">Name</label>
                    <div class="col-sm-12">
                        <input type="text" placeholder="Jerry" class="form-control form-control-line" name="name" required value="{{old('name') }}"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Email</label>                 
                       <div class="col-sm-12">
                            <input type="email" placeholder="example@mail.com" class="form-control form-control-line" name="email" required value="{{old('email') }}"> 
                        </div>                 
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <label class="col-sm-12">Password</label>
                        <div class="col-sm-12">
                        <input type="password" name="password" placeholder="Password..." class="form-control" value="{{ old('password') }}" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                       <label class="col-sm-12">Confirm Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="password_confirmation" placeholder="Password Confirmation..." class="form-control" value="{{ old('password_confirmation') }}" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>




@stop

