@extends('layouts.home')
@section('content')

<div class="sign_img">
   <form  action="{{ route('uploads.update',$agent->id)  }}" method="post" enctype="multipart/form-data">
    @csrf
   @method("PATCH") 
 <section class="vh-200 " >
  <div class="container h-100 mt-5 mb-5">
        <div class="card text-black" style="border-radius: 25px;">

          <div class="card-body p-md-5">
            <div class="action d-flex justify-content-between mt-3 align-items-center ">
              <div class="reply px-4 text-center">
                  <small>Edit Trip image</small>
                  <span class="dots"></span>
                  <small><a  href="{{ route('agents.edit',$agent->id) }}"> Edit Post</a></small>                  
              </div>       
            </div>

            <form class="mx-1 mx-md-4">
                  
              <div class="d-flex flex-row align-items-center mb-4 mx-4">
                
                <div class="form-outline flex mb-0">
                  <label for="images"> Upload new Trip Image</label><br>
                  <small class="place">*insert more than 4 images*</small>
                  <input type="file" class="form-control" name="images[]" multiple value="{{ $agent->images }}" >
                </div>
              </div>

              <div class="d-flex justify-content mx-4 mb-3 mb-lg-4">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </form>
                {{-- delete images --}}
               <div class="container">
                          <form  action="{{ route('agents.destroy',$agent->id) }}" method="delete" >
                            @csrf
                            <p class="">Select the trip image(s) you want to delete</p>
                          <div class="img_display">
                          
                          @foreach (json_decode($agent->images) as $image)
                            <div id="check_image">
                                <input type="checkbox" id="myCheck" name="image[]" value={{$image}} onclick="check()" >
                                {{-- <input type="checkbox" name="image[]" value="{{$image}}">  --}}
                               <label><img src="{{ asset('storage/images/agents/trips/'.$image) }}"  alt="img" style="height:8em; width: 100% "/> </label>
                            </div> 
                            @endforeach 
                             </div>
                   
                      <input type="hidden"  id="checking" value= {{ "checkInput()" }} >
                      <div class="d-flex justify-content mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-danger btn-lg">delete</button>
                      </div>
                      </form>
                    </div>
                
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
</div>



<script type="text/javascript">  
function check() {
    document.getElementById("myCheck").checked;
    let checkboxes = document.querySelectorAll('input[name="image"]:checked');
    return checkboxes;
}

function checkInput(){
  let func = check()
  values=[]
  func.forEach(image => {
    values.push(image.value)
  }); 
  return JSON.stringify(values);
}

</script>
@endsection

      

