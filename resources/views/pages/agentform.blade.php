
@extends('layouts.home')

@section('content')

<div class="sign_img">
  <form  action="{{ route('agents.store') }}" method="post" enctype="multipart/form-data">
    @csrf
<section class="vh-200 " >
  <div class="container h-100 mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Post</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="name">Organisation's  Name</label>
                      <input type="text" name="name" class="form-control" required>
                     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                    <div class="form-outline flex-fill mb-0">
                      <label for="profile">Description</label><br>
                      <textarea type="text" class="form-control w-100 h-6" name="description" row='250' required></textarea>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                      <div class="form-outline flex-fill mb-0">
                        <label for="profile">Organisation's Profile</label>
                        <input type="file" class="form-control" name="profile" required>
                      </div>
                    </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Organisation's Email</label>
                      <input type="email" name="email" class="form-control" required >
                     
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="location">Location </label>
                        <input type="text" name="location" class="form-control" required />
                       
                      </div>
                    </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="address">Address</label>
                      <input type="address" name="address" class="form-control" required/>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="contact">Contact</label>
                      <input type="text" name="contact" class="form-control" placeholder="contact 1 / contact 2/..." required />
                      
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                    <div class="form-outline flex-fill mb-0">
                      <label for="images">Trip Image</label><br>
                      <p class="place">*insert more than 4 images*</p>
                      <input type="file" class="form-control" name="images[]" multiple required>
                    </div>
                  </div>
                  

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="{{asset('images/mosque.avif')}}"
                  class="form_img" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
</div>
@endsection

      

















