
<!-- image -->
@extends('layouts.home')
@section('content')


<div class="img-head">
  <div class="intro">
    <p class="headings"><span class="big">Bismilah. </span> <em class="italics">the Pillgrimage</em></p>
    <p class="heading_btn">hajj made easy for everyone.<span class="text"><em>maasha Allah </em></span></p>
   
</div>


  <div>
  <p class="quotes">
 وَإِذْ جَعَلْنَا الْبَيْتَ مَثَابَةً لِّلنَّاسِ وَأَمْنًا وَاتَّخِذُوا مِن مَّقَامِ إِبْرَاهِيمَ مُصَلًّى ۖ وَعَهِدْنَا إِلَىٰ إِبْرَاهِيمَ وَإِسْمَاعِيلَ أَن طَهِّرَا بَيْتِيَ لِلطَّائِفِينَ وَالْعَاكِفِينَ وَالرُّكَّعِ السُّجُودِ 

 <span class="translation"> 
  
  <br/> " And [mention] when We made the House a place of return for the people and [a place of] security. <br>And take, [O believers], from the standing place of Abraham a place of prayer.<br> And We charged Abraham and Ishmael, [saying]
  ‘ Purify My House for those who perform Tawaf and <br> those who are staying [there] for worship and those who bow and prostrate [in prayer]."
  
  <br><span class="chapter">2-Surah Al-Baqarah ( The Cow ) 125</span>
  </span>
</p> 
  </div>

</div>

<!-- display agent -->

      <div>
        <ul class="recent">
            <li class="recent_list"><a href='#'>Recently Added</a></li>
           <li class="recent_list"><a href="#">Browse all</a></li>
      
        </ul>
      </div>
              <div class="card_display">
                <div class="card-group">
                  @if(count($agents)>0)
                  @foreach ($agents as $agent)
                
                  <div class="row ">
                      <div class="col"> 
                        
                        <div class="card" style="max-width:400px;">
                          <div class="row g-0">
                            <div class="col-sm-5">
                                 <img src="{{ asset('storage/images/agents/profile/'.$agent->profile) }}" class="card-img-top h-100 " alt="...">
                              </div>
                             <div class="col-sm-7">
                              <div class="card-body">
                                  <h5 class="card-title">{{$agent->name}}</h5>
                                  <p class="card-text">{{Str::limit($agent->description,90,$end='...')}}</p>
                                  <a  href="/singlepost/{{$agent->id}}">View Profile</a>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                     </div>
                    
                </div>
                   @endforeach
                        @else
                        <p>No agent has sign in yet</p>              
                        @endif
              </div>
              
             
 <!-- carousel -->
 <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" class="slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 c-img" src="{{asset('images/image3.jpg')}}"  alt="First slide">
    </div>
  
    <div class="carousel-item">
      <img class="d-block w-100 c-img" src="{{asset('images/photo.avif')}}" alt="second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 c-img" src="{{asset('images/photo2.avif')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


@endsection
