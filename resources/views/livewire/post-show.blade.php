<section>
  <!--Title-->
  <div class="text-center pt-16 md:pt-32">
    <p class="text-sm md:text-base text-green-500 font-bold">{{$post->created_at}} <span class="text-gray-900">/</span> Created </p>
    <h1 class="font-bold break-normal text-3xl md:text-5xl text-blue-300">{{$post->title}}</h1>
  </div>
  <!--image-->
  <img class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" src="{{asset('storage/photos/'.$post->image)}}" />
  <!--Container-->
  <div class="container max-w-5xl mx-auto mt-8">
    <div class="mx-0 sm:mx-6">
      <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
        <!--Post Content-->
        {{$post->body}}
        <!--/ Post Content-->
      </div>
    </div>
  </div>

  <!--Comment Display-->

  <div class="container bg-blue-600 bg-opacity-20 rounded-none max-w-5xl mx-auto mt-8">
  <div class="mx-0 sm:mx-6">
  <hr />

    <h4 class= "font-bold text-blue-200 text-2xl" >Comments</h4>
    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
  <hr />

        
  <!--Comment Add-->
  <h4 class= "font-bold text-blue-200 text-2xl" >Add Comment</h4>
  <form method="post" action="{{ route('comment.add') }}">
    @csrf
    <div class="form-group">
        <input type="text" placeholder="Enter your comment.." name="comment_body" class="form-control bg-blue-100 text-blue font-thin py-0.7 px-8  rounded my-1 " />
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <div class="form-group ">
      <button type="submit" class="btn btn-warning bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
      Submit
      </button>
    </div>
  </form>
</div>
</div>
</section>
