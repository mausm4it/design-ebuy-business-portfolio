@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">

            <div class="col-12 col-sm-6 col-xl-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="text-uppercase font-14">{{ __('content.blogs') }}</h6>

                                <!-- Heading -->
                                <span class="font-24 text-dark mb-0">
                                 @if ($blogs_count == 0) 0 @else {{ $blogs_count }} @endif
                                </span>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fab fa-blogger-b font-46 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <div class="col-12 col-sm-6 col-xl-4">
            <!-- Card -->
    
      <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                          
                            <h6 class="text-uppercase font-14">{{ __('content.features') }}</h6>

                            
                            <span class="font-24 text-dark mb-0">
                                 @if ($features_count == 0) 0 @else {{ $features_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                           
                            <div class="icon">
                                <i class="fas fa-puzzle-piece font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        

  <div class="col-12 col-sm-6 col-xl-4">
           
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            
                            <h6 class="text-uppercase font-14">{{ __('content.counters') }}</h6>

                           
                            <span class="font-24 text-dark mb-0">
                                 @if ($counters_count == 0) 0 @else {{ $counters_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                           
                            <div class="icon">
                                <i class="fas fa-clock font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        <div class="col-12 col-sm-6 col-xl-4">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="text-uppercase font-14">{{ __('content.services') }}</h6>

                            <!-- Heading -->
                            <span class="font-24 text-dark mb-0">
                                 @if ($services_count == 0) 0 @else {{ $services_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-people-carry font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="text-uppercase font-14">{{ __('content.teams') }}</h6>

                            <!-- Heading -->
                            <span class="font-24 text-dark mb-0">
                                 @if ($teams_count == 0) 0 @else {{ $teams_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-users font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="text-uppercase font-14">{{ __('content.testimonials') }}</h6>

                            <!-- Heading -->
                            <span class="font-24 text-dark mb-0">
                                 @if ($testimonials_count == 0) 0 @else {{ $testimonials_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-comment-alt font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="text-uppercase font-14">{{ __('content.pages') }}</h6>

                            <!-- Heading -->
                            <span class="font-24 text-dark mb-0">
                                 @if ($pages_count == 0) 0 @else {{ $pages_count }} @endif
                                </span>
                        </div>

                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-file-alt font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl">
            <!-- Card -->
            <div class="card box-margin">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Title -->
                            <h6 class="font-14 text-uppercase">
                                {{ __('content.sections') }}
                            </h6>
                            <!-- Heading -->
                            <a href="{{ url('admin/section/create') }}">
                                <span class="font-24 text-dark mb-0">
                                    {{ __('content.show') }} / {{ __('content.hide') }}
                                </span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <!-- Icon -->
                            <div class="icon">
                                <i class="fas fa-puzzle-piece font-46 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- / .row -->

@endsection