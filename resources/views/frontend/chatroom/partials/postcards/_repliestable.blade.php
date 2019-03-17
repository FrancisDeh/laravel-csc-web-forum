@if (count($replies) > 0)
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                   
                    <th>Message</th>
                    <th>Created</th>
                    <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($replies as $reply)
                <tr>
                    <td style="text-align: left;">{{str_limit(strip_tags($reply->message), 30) }}</td>
                    <td style="text-align: left;">{{$reply->created_at->diffForHumans()}}</td>
                    <td class="td-actions" style="padding-top: 0px !important;">
                        <a 
                       href="{{route('getpostid', $reply->commentable_id) }}" type="button" rel="tooltip" title="View Post" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
             @endforeach  
            </tbody>
        </table>
    </div>
@else
    <p>There are no replies</p>
@endif
        
        	



