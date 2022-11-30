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
          <img src="{{ asset('storage/app/public/images/agents/profile/'.$agent->profile) }}"  alt="" class="postimg" style="height:100px";>
        </div>
        <div class="post-content">
          <div class=" text-center text-uppercase">
          
            <h1 class="post_headings">{{$agent->name}}</h1>
          </div>
          <div class="entry-content">
            <p>{{$agent->description}}  </p>
           
            <div class="container">
                    <div class="img_display">
                    {{-- loop through array of images .printing is as a string using json_decode --}}
                    @foreach (json_decode($agent->images) as $image)
                    <img   src="{{ asset('storage/app/public/images/agents/trips/'.$image) }}" style="height:200px; width: 300px; border-radius:30px"; />
                    @endforeach
                  </div>
            </div>
         
            <div class="action d-flex justify-content-between mt-2 align-items-center">
              @if(Auth::check() && Auth::user()->agent == '1')
              <div class="reply px-4">
                  
                  <small><a href="{{ route('agents.edit',$agent->id) }}">Edit</a></small>
                  <span class="dots"></span>
                  <small>Translate</small>
                 @else
                 <small><a href="/book">book us now</a></small>
                  <span class="dots"></span>
              </div>

              <div class="icons align-items-center">

                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-check-circle-o check-icon"></i>
                  
              </div>
              @endif
            </div>
        
      </div>        
<hr>
          <div class="post-meta">
            <ul class="pull-left list-inline author-meta ml-3">
            
              <li class="date"> <em>email::{{$agent->email}}</em></li>
              <li class="date"> <em>contact::{{$agent->contact}}</em></li>
              
              <li class="date"> <em>address::{{$agent->address}}</em></li>
              <li class="date"> <em>location::{{$agent->location}}</em></li>
            <hr>
            <div class="post-meta">
              <ul class="pull-left list-inline author-meta">
                <li class="author">By {{$agent->name}} </li>
            <li class="date"><em>on</em>  {{$agent->created_at}}</li>
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
      @include('partials.commentForm')
@endsection