@if(count($repositories) > 0)  
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                   
                    <th>Title</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Size</th>
                    <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($repositories as $repository)
                <tr>
                    <td style="text-align: left;" data-container="body" data-toggle="popover" data-placement="top" data-title ="File Description" data-content="{{ $repository->description }}" id="popovertd">{{ str_limit($repository->name, 20) }}</td>
                    <td style="text-align: left;">{{$repository->created_at->diffForHumans()}}</td>
                    <td style="text-align: left;">{{$repository->updated_at->diffForHumans()}}</td>
                    <td style="text-align: left;">{{ number_format(($repository->size/1048576), 2) }} mb</td>

                    @if (auth()->user()->id == $repository->user->id)
                        <td class="td-actions" style="padding-top: 0px !important;">
                        <button type="button" rel="tooltip" title="Edit File" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                        </button>
                     <button " type="button" rel="tooltip" title="Remove Post" class="btn btn-danger btn-simple btn-xs" onclick="event.preventDefault();
                                                     document.getElementById('deletepostform-{{$repository->id}}').submit();">
                            <i class="fa fa-times"></i>
                        </button>
                        {{--delete modal--}}
                         @include('frontend.chatroom.partials.deleteforms._repositorydeleteform')
                    </td>
                    @endif
                    
                   
                </tr>
              @endforeach  
            </tbody>
        </table>
       </div>
        
        	
@else 
    <p>There are no documents</p>
@endif
