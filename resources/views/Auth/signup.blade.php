@extends('layouts.home')
@section('content')


<div class="sign_img">

<section class="vh-200 "  >
  <div class="bgc">

    <div class="container h-100 mt-5 mb-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
         
          <div class="card text-black" style="border-radius:40px  " >
            
            <div class="card-body p-md-5" >
             
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form action="{{ route('register.custom') }}" method="POST">
                    @csrf
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                        required autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>

  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" placeholder="Email" id="email_address" class="form-control"
                        name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>                        
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" placeholder="Password" id="password" class="form-control"
                              name="password" required>
                              @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>

                              @endif
                       
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                      
                      <label class='text_holder' >Are you an Agent: <input type="checkbox" name="agent[]" value={{1}} id="agent" > </label>
                     
                        
                      </div>
                    </div>
                
  
            
                    <div>
                      <button type="submit" class="btn btn-primary btn-lg mt-3">SignUp</button>
                    </div>
                    
                      
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="{{asset('images/image.jpg')}}"
                    class="form_img" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
</div>
@endsection