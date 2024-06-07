@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ $category->category_name }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $category->category_name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// My Works Start //-->
    @if (count($portfolios) > 0)
        <section class="section bg-primary-light" id="porfolio">
            <div class="container">
                <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                    
                    
                    @foreach ($portfolios as $portfolio)
                    
                    @if($portfolio->post_type=="feature")
                    
                    <div class="col-md-6 col-lg-4 portfolio-item {{ $portfolio->portfolio_category->portfolio_category_slug }}">
                            <div class="portfolio-item-inner">
                                @if ($portfolio->image_status == 1 && !empty($portfolio->thumbnail_image))
                                  <div style="height:300px;"  class="portfolio-item-img d-flex justify-content-center">
                                        <img style="max-height:300px;" src="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" alt="Portfolio image" class="img-fluid">
                                      
                                      
                                    </div>
                                @endif
                                <div class="body">
                                    <div class="portfolio-details">
                                        <span>{{ $portfolio->portfolio_category->category_name }}</span>
                                        <h5>{{ $portfolio->title }}</h5>
                                    </div>
                                    <a href="{{ route('portfolio-page.show', ['portfolio_slug' => $portfolio->portfolio_slug]) }}" class="portfolio-link">
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                    @endif
                        
                    @endforeach
                </div>
                  {{ $portfolios->links() }}
            </div>
        </section>
    @else
        <section class="section pb-0 bg-primary-light" id="porfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>{{ __('frontend.updating') }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--// My Works End //-->


@endsection