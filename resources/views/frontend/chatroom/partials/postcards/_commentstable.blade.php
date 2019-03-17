 @if (count($comments) > 0)
     <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                   
                    <th>Message</th>
                    <th>Created</th>
                    <th class="text-right"><i class="fa fa-comments-o"></i></th>
                    <th class="text-right"><i class="fa fa-heart-o"></i></th>
                    <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td style="text-align: left;">{{ str_limit(strip_tags($comment->message), 30)}}</td>
                    <td style="text-align: left;">{{$comment->created_at->diffForHumans()}}</td>
                    <td class="text-right">{{$comment->reply()->count() }}</td>
                    <td class="text-right">{{$comment->likes()->count()}}</td>
                    <td class="td-actions" style="padding-top: 0px !important;">
                        <a href="{{route('post.show', $comment->commentable_id) }}" type="button" rel="tooltip" title="View Post" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
   </div>
 @else
    <p>There are no comments</p>
 @endif  
        
