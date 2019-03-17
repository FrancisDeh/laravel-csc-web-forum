@if(count($codes) > 0)
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
            @foreach ($codes as $code)
                <tr>
                    <td style="text-align: left;"><a href="{{route('post.show', $code->id) }}">{{ str_limit($code->title, 20) }}</a></td>
                    <td style="text-align: left;">{{$code->created_at->diffForHumans()}}</td>
                    <td style="text-align: left;">{{$code->updated_at->diffForHumans()}}</td>
                    <td class="text-right">{{$code->comments()->count() }}</td>
                    <td class="text-right">{{$code->likes()->count() }}</td>

                    @if (auth()->user()->id == $code->user->id)
                        <td class="td-actions" style="padding-top: 0px !important;">
                        <a href = "{{route('post.edit', $code->id) }} type="button" rel="tooltip" title="Edit Post" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button " type="button" rel="tooltip" title="Remove Post" class="btn btn-danger btn-simple btn-xs" onclick="event.preventDefault();
                                                     document.getElementById('deletepostform-{{$code->id}}').submit();">
                            <i class="fa fa-times"></i>
                        </button>
                        {{--delete modal--}}
                         @include('frontend.chatroom.partials.deleteforms._codesdeleteform')
                    </td>
                    @endif
                   
                    
                </tr>
            @endforeach
            </tbody>
        </table> 
    </div>
@else
    <p>There are no codes</p>
@endif      
        	

