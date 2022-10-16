@if($user= Auth::check() && Auth::user()->agent == '1')
{{-- <img src="{{asset('storage/images/agents/profile/'.Auth()->user()->profile) }}"/> --}}


@extends('layouts.home')
@section('content')
<div class="kotha-logo text-center">
  {{-- <h1>Agency Name</h1> --}}
</div>
</header>
<div class="kotha-default-content mt-5">
<div class="container">
  <div class="row">
    <div class="col">
      <article class="single-blog">
        <div class="post-thumb">
          
          <img src="{{asset('storage/images/agents/profile/'.Auth()->user()->profile) }}"  alt="" class="postimg" style="height:700px";>
        </div>
        <div class="post-content">
          <div class=" text-center text-uppercase">
          
            <h1 class="post_headings">{{ Auth::user()->name }}</h1>
          </div>
          <div class="entry-content">
            <p>{{ Auth::user()->description }}  </p>
           
            {{-- <div class="container">
                    <div class="img_display">
                    loop through array of images .printing is as a string using json_decode
                    @foreach (json_decode( Auth()->user()->images ) as $image)
                    <img   src="{{ asset('storage/images/agents/trips/'.$image) }}" style="height:150px; width: 300px,border-radius:6px"; />
                    @endforeach
                  </div>
            </div> --}}
         
            <div class="action d-flex justify-content-between mt-2 align-items-center">
              <div class="reply px-4">
                  
                  <small><a href="{{ route('agents.edit',Auth::user()->id) }}">Edit</a></small>
                  <span class="dots"></span>
              </div>

              <div class="icons align-items-center">

                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-check-circle-o check-icon"></i>
                  
              </div>
            </div>
        
      </div>        
<hr>
          <div class="post-meta">
            <ul class="pull-left list-inline author-meta ml-3">
            
              <li class="date"> <em>email::{{ Auth::user()->email }}</em></li>
              <li class="date"> <em>contact::{{ Auth::user()->contact }}</em></li>
              
              <li class="date"> <em>address::{{ Auth::user()->address}}</em></li>
              <li class="date"> <em>location::{{ Auth::user()->location }}</em></li>
            <hr>
            <div class="post-meta">
              <ul class="pull-left list-inline author-meta">
                <li class="author">By {{ Auth::user()->name }} </li>
            <li class="date"><em>on</em>  {{ Auth::user()->created_at}}</li>
              </div>
            <ul class="pull-right list-inline social-share d-flex flex-row align-items-center gap-1"  class="icon">
              <li><a href=""><i class="bi bi-facebook"></i></a></li>
              <li><a href=""><i class="bi bi-twitter"></i></a></li>
              <li><a href=""><i class="bi bi-pinterest"></i></a></li>
              <li><a href=""><i class="bi bi-google-plus"></i></a></li>
              <li><a href=""><i class="bi bi-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </article>
      @include('partials.comments')


    
@endsection





















@endif

