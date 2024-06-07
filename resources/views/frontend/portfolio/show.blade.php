@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section  d-none d-xl-block" data-scroll-index="1" @if ($portfolio->breadcrumb_status == 1 && !empty($portfolio->custom_breadcrumb_image))  data-bg-image-path = "{{ asset('uploads/img/portfolio/breadcrumb/'.$portfolio->custom_breadcrumb_image) }}"
             @elseif (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ $portfolio->title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $portfolio->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
            














    <!--// Portfolio Single Section Start //-->
    <section class="section" id="portfolio-single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($sliders) > 0)
          
              <style>
.container_Lv0 {
    position: relative;
    width: 100%;
    height: auto;
    margin: 0 auto;
   
    overflow: hidden;
    border-radius: 1em;
}
.container_Lv1 {
    display: flex;
    min-width: fit-content;
}
    .container_Lv2 {
        position: relative;
        height: 30em;
        width: 100%;
        background-color: #F5F5F5;
    }
    .container_Lv2 img{
        user-select: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(calc(-50%)) translatey(calc(-50%));
        max-height: 100%;
        max-width: 100%;
    }
    
    @media only screen and (max-width: 600px) {
 .container_Lv2 {
    height: 15em;
  }
}


    </style>



<div class="container container_Lv0">

    <div id="carouselExampleIndicators" class="carousel slide container_Lv2" data-ride="carousel">
  
      <div class="carousel-inner">
          
             @foreach ($sliders as $key => $slider)
        <div class="carousel-item container_Lv2 {{$key == 0 ? 'active' : ''}}">
         <a target="_blank" href="{{ asset('uploads/img/portfolio/slider/'.$slider->portfolio_image) }}">
             <img src="{{ asset('uploads/img/portfolio/slider/'.$slider->portfolio_image) }}">
             
         </a> 
        </div>
        
        @endforeach
       
      </div>
      <a class="carousel-control-prev btn-circle" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="fa fa-angle-left shadow-none p-3 bg-dark  text-light" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <i class="fa fa-angle-right shadow-none p-3 bg-dark  text-light" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>


  </div>
          
          
                        @endif
                    <div class="portfolio-single-inner">
                        <h4>{{ $portfolio->title }}</h4>
                        <div class="author-meta">
                            <a href="#"><span class="far fa-calendar-alt"></span>{{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($portfolio->created_at)->isoFormat('GGGG') }}</a>
                            <a href="#"><span class="far fa-bookmark"></span>{{ $portfolio->category_name }}</a>
                        @if(!empty($portfolio->lnk_button_name) )
                                <a class="btn btn-success text-white float-right" href="{{$portfolio->lnk_button_link}}">{{ $portfolio->lnk_button_name }}</a>
                                
                                @endif
                
                        </div>
                        <p>@php echo html_entity_decode($portfolio->desc); @endphp</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="widget-sidebar">
                       @if (count($details) > 0)
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.portfolio_details') }}</h5>
                                <div class="sidebar-details-list">
                                    <ul>
                                       @foreach ($details as $detail)
                                            <li><h6>{{ $detail->title }}<span>{{ $detail->desc }}</span></h6></li>
                                           @endforeach
                                    </ul>
                                </div>
                            </div>
                           @endif

                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.categories') }}</h5>
                            @if($portfolio->post_type=="feature")
                            
                            <ul class="sidebar-category-list clearfix">
                                @foreach ($portfolio_count_categories_feature as $portfolio_count_category)
                                    <li class="@if ($portfolio_count_category->portfolio_category->category_name == $portfolio->category_name) active @endif">
                                        @if (isset($portfolio_count_category->portfolio_category->portfolio_category_slug))
                                            <a href="{{ url('portfolio/category/'.$portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }}<span class="category-count">
                                                ({{ $portfolio_count_category->category_count }})</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @elseif($portfolio->post_type=="works")
                                  
                            <ul class="sidebar-category-list clearfix">
                                @foreach ($portfolio_count_categories as $portfolio_count_category)
                                    <li class="@if ($portfolio_count_category->portfolio_category->category_name == $portfolio->category_name) active @endif">
                                        @if (isset($portfolio_count_category->portfolio_category->portfolio_category_slug))
                                            <a href="{{ url('portfolio/category2/'.$portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }}<span class="category-count">({{ $portfolio_count_category->category_count }})</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            
                            @endif
                            
                            
                            
                        </div>
                           @if (count($recent_posts) > 0)
                               <div class="sidebar-widgets">
                                   <h5 class="inner-header-title">{{ __('frontend.recent_posts') }}</h5>
                                   @foreach ($recent_posts as $recent_post)
                                       <div class="recent-post-item clearfix">
                                           <div class="recent-post-img mr-3">
                                               <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                   @if (!empty($recent_post->blog_image))
                                                       <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid image-size-100" alt="blog image">
                                                   @else
                                                       <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="blog image">
                                                   @endif
                                               </a>
                                           </div>
                                           <div class="recent-post-body">
                                               <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                   <h6 class="recent-post-title">{{ $recent_post->title }}</h6>
                                               </a>
                                               <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</p>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           @endif
                           <div class="sidebar-widgets">
                               <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                               <ul class="sidebar-share clearfix">
                                   <li>
                                       <a href="{{$portfolio->getShareUrl('twitter')}}" target="_blank">
                                           <i class="fab fa-twitter"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="{{$portfolio->getShareUrl('whatsapp')}}" target="_blank">
                                           <i class="fab fa-whatsapp"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="{{$portfolio->getShareUrl('pinterest')}}" target="_blank">
                                           <i class="fab fa-pinterest"></i>
                                       </a>
                                   </li>
                               </ul>
                           </div>
                           <div class="sidebar-widgets">
                               <div class="subscribe-newsletter">
                                   <div class="subscribe-newsletter-text">
                                       <div class="icon">
                                           <span class="fa fa-envelope-open-text"></span>
                                       </div>
                                       <h5>{{ __('frontend.subscribe_newsletter') }}</h5>
                                       <p>{{ __('frontend.get_the_latest_news') }}</p>
                                       <form action="{{ route('subscribe-section.store') }}" method="POST">
                                           @csrf
                                           <div class="form-newsletter">
                                               <input type="text" name="email" placeholder="{{ __('frontend.enter_email') }}" required>
                                               <button><i class="fa fa-arrow-right"></i></button>
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
    <!--// Portfolio Single Section End //-->

@endsection
