
@extends('backend.layout.master')
@section('title', 'Manage Developers')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Developers ({{count($developers) }})</h4>
        @if(count($developers) > 0)
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
                    @foreach ($developers as $developer)
                        <tr>
                           
                            <td style="text-align: left;">{{$developer->fname.' '.$developer->sname }}</td>
                            <td style="text-align: left;">{{$developer->email}}</td>
                           
         
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$developer->id}}" rel="tooltip" title="Edit developer" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._developereditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$developer->id}}" rel="tooltip" title="Remove developer" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._developerdeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Developers Available</p>
        @endif      

        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Add Developer</h4>
            <form method="post" action="{{ route('developers.store') }}" class="form-horizontal form-material" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-12">First Name</label>
                    <div class="col-sm-12">
                        <input type="text" placeholder="Jeremiah" class="form-control form-control-line" name="firstName" required value="{{old('firstName') }}"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Surname</label>
                    <div class="col-sm-12">
                        <input type="text" placeholder="Nsiah Akuoko" class="form-control form-control-line" name="surname" required value="{{old('surname') }}"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Email</label>                 
                       <div class="col-sm-12">
                            <input type="email" placeholder="example@mail.com" class="form-control form-control-line" name="email" required value="{{old('email') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Work Field</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="Designer" class="form-control form-control-line" name="workField" required value="{{old('workField') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Description</label>                 
                       <div class="col-sm-12">
                            <textarea  class="form-control form-control-line" name="description" required ">
                                {{old('description') }}
                            </textarea> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Facebook Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="facebookHandle" required value="{{old('facebookHandle') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Twitter Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="twitterHandle" required value="{{old('twitterHandle') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Google+ Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="googlePlusHandle" value="{{old('googlePlusHanlde') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Instagram Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="instagramHandle" value="{{old('instagramHandle') }}"> 
                        </div>                 
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Linkedin Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="linkedinHandle" value="{{old('linkedinHandle') }}"> 
                        </div>                 
                </div> 

                <div class="form-group">
                    <label class="col-sm-12">Image</label>                 
                       <div class="col-sm-12">
                            <input type="file" placeholder="" class="form-control form-control-line" name="image" value="{{old('image') }}"> 
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

