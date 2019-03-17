
<!-- Modal -->
<div class="modal fade" id="myModal-{{$developer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form" action="{{route('developers.update', $developer->id) }}" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit {{$developer->name}}</h4>
      </div>
      <div class="modal-body">
        	
        	{{csrf_field()}}
        	{{method_field('PUT')}}
          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">First Name</label>
              <div class="col-sm-12">
                  <input type="text" placeholder="Jeremiah" class="form-control form-control-line" name="firstName" required value="{{ $developer->fname }}"> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Surname</label>
              <div class="col-sm-12">
                  <input type="text" placeholder="Nsiah Akuoko" class="form-control form-control-line" name="surname" required value="{{ $developer->sname }}"> 
              </div>
            </div>
          </div>  

          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Email</label>                 
                <div class="col-sm-12">
                    <input type="email" placeholder="example@mail.com" class="form-control form-control-line" name="email" required value="{{ $developer->email }}"> 
                </div>                 
            </div>
          </div>  

          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Work Field</label>                 
                 <div class="col-sm-12">
                      <input type="text" placeholder="Designer" class="form-control form-control-line" name="workField" required value="{{ $developer->work_field }}"> 
                  </div>                 
              </div>
          </div>  

          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Description</label>                 
                 <div class="col-sm-12">
                      <textarea  class="form-control form-control-line" name="description" required ">
                          {{ $developer->description }}
                      </textarea> 
                  </div>                 
              </div>
          </div>  

          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Facebook Handle</label>                 
               <div class="col-sm-12">
                    <input type="text" placeholder="" class="form-control form-control-line" name="facebookHandle" required value="{{ $developer->fbhandle }}"> 
                </div>                 
              </div>
          </div>  

          <div class="row">
            <div class="form-group">
              <label class="col-sm-12 text-left text-info">Twitter Handle</label>                 
                <div class="col-sm-12">
                      <input type="text" placeholder="" class="form-control form-control-line" name="twitterHandle" required value="{{ $developer->twitterhandle }}"> 
                </div>                 
            </div>
          </div> 

          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12 text-left text-info">Google+ Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="googlePlusHandle" value="{{ $developer->gplushandle }}"> 
                        </div>                 
                </div>
          </div>  

          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12 text-left text-info">Instagram Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="instagramHandle" value="{{ $developer->instagramhandle }}"> 
                        </div>                 
                </div>
          </div>   

          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12 text-left text-info">Linkedin Handle</label>                 
                       <div class="col-sm-12">
                            <input type="text" placeholder="" class="form-control form-control-line" name="linkedinHandle" value="{{ $developer->linkedinhandle }}"> 
                        </div>                 
                </div>
          </div>   

          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12 text-left text-info">Image</label>                 
                       <div class="col-sm-12">
                            <input type="file" placeholder="" class="form-control form-control-line" name="image" value="{{ $developer->image }}"> 
                        </div>                 
                </div>
          </div> 
          
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
     </form>
    </div>
  </div>
</div>