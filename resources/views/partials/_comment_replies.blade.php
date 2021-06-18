@foreach($comments as $comment)
    <div class="grid grid-cols-1 divide-y divide-yellow-500">
    <div class= "display-comment mx-8">
        <div class="font-bold text-red-200 text-xl...">{{ $comment->user->name }}:</div>
        <div class="font-thin text-left text-blue-100 text-lg...">
            {{ $comment->body }}
        </div>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Enter your comment.." name="comment_body" class="form-control placeholder-gray-100 placeholder-opacity-30 bg-blue-500 bg-opacity-20 text-white font-thin py-0.7 px-8 border-opacity-0 my-1 " />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-warning  bg-yellow-500 hover:bg-red-300 text-blue font-thin py-0.7 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded my-1 ">
                Reply
            </button>
                <!-- <input type="submit" class="btn btn-warning" value="Reply" /> -->
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
    </div>
@endforeach