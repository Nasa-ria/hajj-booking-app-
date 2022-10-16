{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<div class="container bootdey ">
<div class="col-md-12 bootstrap snippets">
<div class="panel">
    <h5 class="text-center mt-5">Share Your Thoughts</h5>
  <div class="panel-body">
    <form action="{{route('comment-store')}}" method="post">
      @csrf
      <input type="hidden"  name="agent_id" value={{$agent->id}}>
    <input type="text" class="form-control" id="author" name="author"  placeholder="name" />
    <textarea class="form-control mt-1" name="comment" placeholder="leave a comment "></textarea>
  
    <div class="mar-top clearfix">
      <button class="btn btn-sm btn-primary pull-right" type="submit"> Share</button>
    </div>
    </form>
  </div>
</div>
</div>
</div>

@include('partials.comments')
