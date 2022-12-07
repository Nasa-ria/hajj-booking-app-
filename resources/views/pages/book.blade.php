                @extends('layouts.home')
                @section('content')

                @if (Auth::check()) {
                    {{-- // The user is logged in... --}}
                    
                <div class="bg">
                    <div class="container  mt-5 mb-5">
                        <div class="card text-black" style="border-radius: 25px;">

                        <div class="card-body p-md-5">
                <div class="container bootdey ">
                    <div class="col-md-12 bootstrap snippets">
                    <div class="panel">
                        <h5 class="text-center mt-5">Book An Appointment</h5>
                    <div class="panel-body">
                        <form action="{{route('store-bookings')}}" method="post">
                        @csrf
                     
                        <input type="hidden"  name="agent_id" value={{$agent->id}}>

                        <input type="text" class="form-control mt-3" id="name" name="name"  placeholder="name" required />
                        @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                     
                
                      <input type="date" class="form-control mt-3" id="book_date" name="book_date"  placeholder="date" required />
                        @if ($errors->has('booking_date'))
                       <span class="text-danger">{{ $errors->first('booking_date') }}</span>
                        @endif
                     
                       
                        <input type="text" class="form-control mt-3" id="location" name="location"  placeholder="location" required />
                        @if ($errors->has('location'))
                       <span class="text-danger">{{ $errors->first('location') }}</span>
                        @endif

                        <input type="text" class="form-control mt-3" id="email" name="email"  placeholder="email" required />
                        @if ($errors->has('email'))
                       <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                        <input type="text" class="form-control mt-3" id="contact" name="contact"  placeholder="contact" required />
                        @if ($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                         @endif
                    
                        <div class="mar-top clearfix">
                        <button class="btn btn-sm btn-primary pull-right" type="submit"> Submit</button>
                        </div>
                        </form>
                    </div>
                    </div>
                    </div>
                    </div>
                        </div>
                        </div>
                    </div>
                </div>}
                @else
                    <h4> you need to sign in first</h4>
                  <p>click to sign up</p>
                  <a  href="{{ route('register-user') }}">SignUp</a>
       
                @endif

                @endsection