@if (count($publications) > 0)
   <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                   
                    <th>Title</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th class="text-right"><i class="fa fa-comments-o"></i></th>
                    <th class="text-right"><i class="fa fa-heart-o"></i></th>
                    <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($publications as $publication)
                <tr>
                    <td style="text-align: left;"><a href = "{{route('post.show', $publication->id) }}" >{{ str_limit($publication->title, 20) }}</a> </td>
                    <td style="text-align: left;">{{$publication->created_at->diffForHumans()}}</td>
                    <td style="text-align: left;">{{$publication->updated_at->diffForHumans()}}</td>
                    <td class="text-right">{{$publication->comments()->count() }}</td>
                    <td class="text-right">{{$publication->likes()->count()}}</td>

                    @if (auth()->user()->id == $publication->user->id)
                     <td class="td-actions" style="padding-top: 0px !important;">
                        <a href = "{{route('post.edit', $publication->id) }} type="button" rel="tooltip" title="Edit Post" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button " type="button" rel="tooltip" title="Remove Post" class="btn btn-danger btn-simple btn-xs" onclick="event.preventDefault();
                                                     document.getElementById('deletepostform-{{$publication->id}}').submit();">
                            <i class="fa fa-times"></i>
                        </button>
                        {{--delete modal--}}
                         @include('frontend.chatroom.partials.deleteforms._publicationsdeleteform')
                    </td>
                    @endif
                    
                    
                </tr>
            @endforeach 
            </tbody>
        </table> 
        </div>    
@else
    <p>There are no publications</p>
@endif
        

