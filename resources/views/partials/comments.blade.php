
@if($user= Auth::check() && Auth::user()->agent == '1')
{{ Auth::user()->comment }}

@else

<div class="panel">
    <div class="panel-body">
      <h4 class="text-center">COMMENTS SECTION</h4>

        @foreach ($comments as $comment)  
     <div class="media-block">
      <div class="media-body">
        <div class="mar-btm">
        
          <div class="container mt-6">

            <div class="row  d-flex justify-content-center">
          
                <div class="col-md-8">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                      <div class="user d-flex flex-row align-items-center">
                        <span><small class="font-weight-bold text-primary">{{$comment->author}} ::</small> <small class="font-weight-bold">{{$comment->comment}}</small></span> 
                      </div>
                      </div>
                      <small><em>created on:{{$comment->created_at}}</em></small>
                      <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4">
                           
                            <span class="float-right">
                              <form action={{ route('comment-delete',$comment->id) }} method="POST">
                              @csrf
                              @method('delete')
                             <button> <small>Remove</small></button>
                          </span>
                            
                        </div>
                        <div class="icons align-items-center">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-check-circle-o check-icon"></i>    
                        </div>
               
                      </div>              
                    </div>
                </div>
                
            </div>
           
          </div>
        @endforeach 
        {{-- @endforeach   --}}
        @endif
      </div>
    </div>
  </div>
</div> 

  