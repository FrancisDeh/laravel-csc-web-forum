@extends('frontend.chatroom.pages.repository')
@section('content')
	<section class="page-content-section">                                    
                    	<h2 class="mg-top-20">
                    	@isset($message)
                    		{{$message}}
                    	@endisset

                    	</h2>              
							<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-info">
							    <div class="panel-heading btn btn-block btn-outline" role="tab" id="headingFour">
							      <h4 class="panel-title">
							        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							          First Semester ({{$courses1->count()}} {{ $courses1->count() > 1 ? 'Courses' : 'Course' }})
							        </a>
							      </h4>
							    </div>
							    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							      <div class="panel-body">


							      	{{-- pasting courses accordion --}}
			
									@foreach ($courses1 as $course)
										
								
									<div class="panel-group" id="courseAccordion-{{ $course->id }}" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-default">
									    <div class="panel-heading btn btn-block btn-outline" role="tab" id="courseHeading-{{ $course->id }}">
									      <h4 class="panel-title">
									        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#courseAccordion" href="#collapseCourse-{{ $course->id }}" aria-expanded="false" aria-controls="collapseCourse-{{ $course->id }}" style="color: #000;">
									          {{ $course->coursecode->name }} ({{ count($course->repository) }})
									        </a>
									      </h4>
									    </div>
									    <div id="collapseCourse-{{ $course->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="courseHeading-{{ $course->id }}">
									      <div class="panel-body courseHeading-{{ $course->id }}">
	        							    <div class="table-responsive">
					                    	<table class="table table-hover" id="popover-viewport">
											    <thead>
											        <tr>
											        	<th class="text-center">#</th>						 
											            <th>Name</th>
											            <th>Format</th>
											            <th>Size</th>
											            <th>Upload on</th>
											            <th>Modified on</th>
											            <th>Actions</th>
											        </tr>
											    </thead>
											    <tbody>
											    	@foreach ($course->repository as $material)
											    		
											    	
											    
											        <tr  class="repository-tr-padding-2">
											            <td class="text-center">{{ $material->id }}</td>
											            <td data-container="body" data-toggle="popover" data-placement="top" data-title ="File Description" data-content="{{ $material->description }}" id="popovertd">{{ $material->name }}</td>
											            <td>{{ $material->format }}</td>
											            <td>{{ number_format(($material->size/1048576), 2) }} mb</td>
											            <td>{{ $material->created_at->diffForHumans() }}</td>
											            <td>{{ $material->updated_at->diffForHumans() }}</td>
											            <td class="td-actions minus-10" >
											                @if(Storage::disk('local')->has('public/repository/course_materials/'.$material->name))									                        
									                             <a target="_blank" href="{{ route('filedownload', ['filename' => $material->name]) }}" type="button" rel="tooltip" title="Download" class="btn btn-info btn-simple btn-xs">
											                    <i class="fa fa-download"></i>
											                </a>    
									                         @endif
											                @if(Storage::disk('local')->has('public/repository/course_materials/'.$material->name))									                        
									                             <a target="_blank" href="{{ route('fileread',['filename' => $material->name]) }}" type="button" rel="tooltip" title="Read Online" class="btn btn-success btn-simple btn-xs">
											                    <i class="fa fa-book"></i>
											                </a>    
									                         @endif
											            </td>
											        </tr>
											       		
											    	@endforeach
											       
											    </tbody>
											</table>						                 		
		                    				</div>
									      </div>
									    </div>
									  </div>



									

							      </div>
							      	{{-- expr --}}
									@endforeach
							    </div>
							  </div>
							</div>

							  <div class="panel panel-success">
							    <div class="panel-heading btn btn-block btn-outline" role="tab" id="headingFive">
							      <h4 class="panel-title">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							          Second Semester ({{$courses2->count()}}  {{ $courses1->count() > 1 ? 'Courses' : 'Course' }})
							        </a>
							      </h4>
							    </div>
							    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
							      <div class="panel-body">
							       	@foreach ($courses2 as $course)
										
								
									<div class="panel-group" id="courseAccordion-{{ $course->id }}" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-default">
									    <div class="panel-heading btn btn-block btn-outline" role="tab" id="courseHeading-{{ $course->id }}">
									      <h4 class="panel-title">
									        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#courseAccordion" href="#collapseCourse-{{ $course->id }}" aria-expanded="false" aria-controls="collapseCourse-{{ $course->id }}" style="color: #000;">
									          {{ $course->coursecode->name }}
									        </a>
									      </h4>
									    </div>
									    <div id="collapseCourse-{{ $course->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="courseHeading-{{ $course->id }}">
									      <div class="panel-body courseHeading-{{ $course->id }}">
	        							    <div class="table-responsive">
					                    	<table class="table table-hover">
											    <thead>
											        <tr>
											        	<th class="text-center">#</th>						 
											            <th>Name</th>
											            <th>Format</th>
											            <th>Size</th>
											            <th>Upload on</th>
											            <th>Modified on</th>
											            <th>Actions</th>
											        </tr>
											    </thead>
											    <tbody>
											    	@foreach ($course->repository as $material)
											    		
											    	
											    
											        <tr  class="repository-tr-padding-2">
											            <td data-container="body" data-toggle="popover" data-placement="top" data-title ="File Description" data-content="{{ $material->description }}" id="popovertd">{{ $material->name }}</td>
											            <td>{{ $material->format }}</td>
											            <td>{{ number_format(($material->size/1048576), 2) }} mb</td>
											            <td>{{ $material->created_at->diffForHumans() }}</td>
											            <td>{{ $material->updated_at->diffForHumans() }}</td>
											            <td class="td-actions minus-10" >
											            	  @if(Storage::disk('local')->has('public/repository/course_materials/'.$material->name))									                        
									                             <a target="_blank" href="{{ route('repositorypath',['filename' => $material->name]) }}" type="button" rel="tooltip" title="Download" class="btn btn-info btn-simple btn-xs">
											                    <i class="fa fa-download"></i>
											                </a>    
									                         @endif
											               
											                <a type="button" rel="tooltip" title="Read online" class="btn btn-success btn-simple btn-xs">
											                    <i class="fa fa-book"></i>
											                </a>		
											            </td>
											        </tr>
											       		
											    	@endforeach
											       
											    </tbody>
											</table>						                 		
		                    				</div>
									      </div>
									    </div>
									  </div>



									

							      </div>
							      	{{-- expr --}}
									@endforeach
							      </div>
							    </div>
							  </div>
							</div>					
                    	  	</section>
@endsection