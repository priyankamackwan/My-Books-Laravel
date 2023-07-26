@section('meta_tags')
<title>@if(!empty($lesson->meta_title)) {{$lesson->meta_title}} @else TechedHub @endif</title>

<meta name="keywords" @if(!empty($lesson->meta_keyword)) content="{{$lesson->meta_keyword}}" @elseif(!empty($lesson->title)) content="{{$lesson->title}}" @else content='' @endif>
<meta name="description" @if(!empty($lesson->meta_description)) content="{{$lesson->meta_description}}" @elseif(!empty($lesson->title)) content="{{$lesson->title}}" 
@else content='' @endif>
@endsection


@extends('frontend.layouts.app_without_navbar')

@section('content')

    <!-- NAVBAR
    ================================================== -->
    <header class="bg-white border-bottom py-3 header-fixed" >
        <div class="px-5 px-lg-8 w-100">
            <div class="d-md-flex align-items-center">
                <!-- Brand -->
                <a class="navbar-brand me-0" href="/">
                <img src="{{ asset('img/logo.png')}}" class="navbar-brand-img" alt="...">
            </a>

                <!-- Lesson Title -->
                <div class="ms-md-6 ms-wd-12 ms-xl-10 me-auto mb-5 mb-md-0">
                    <h3 class="mb-0 line-clamp-2 ms-wd-3">Lession - #{{ $lesson->id }} {{$lesson->title}}</h3>
                </div>
                
                <!-- Back to Course -->
                <a href="{{ route('frontend.course-single', [ $category->slug, $course->slug]) }}" class="btn btn-sm btn-primary ms-md-6 px-6 mb-3 mb-md-0 flex-shrink-0">Back to Course</a>
            </div>
        </div>
    </header>


    <!-- COURSE
    ================================================== -->
    <div class="">
        <div class="sidebar-collapse">
            <a class="text-white bg-primary rounded-right-lg p-4 w-60p h-50p" data-bs-toggle="collapse" href="#sidebarcollapseExample" role="button" aria-expanded="false" aria-controls="sidebarcollapseExample">
                <!-- Icon -->
                <svg width="25" height="17" viewBox="0 0 25 17" xmlns="http://www.w3.org/2000/svg">
                    <rect width="25" height="1" fill="currentColor"/>
                    <rect y="8" width="15" height="1" fill="currentColor"/>
                    <rect y="16" width="20" height="1" fill="currentColor"/>
                </svg>

                <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                    <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                </svg>

            </a>

            <div class="collapse shadow" id="sidebarcollapseExample">
                <!-- <div class="p-5">
                    
                    <form class="mt-10 mt-sm-0">
                        <div class="input-group border rounded">
                            <div class="input-group-prepend">
                                <button class="btn btn-sm text-secondary" type="submit">
                                   
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"/>
                                        <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                            <input class="form-control form-control-sm border-0 ps-0" type="search" placeholder="Search item" aria-label="Search">
                        </div>
                    </form>
                </div> -->

                <div id="accordionCurriculum" class="sidebar-collapse-scroll">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center" id="curriculumheadingOne">
                            <h5 class="mb-0 w-100">
                                <button class="d-flex align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#CurriculumcollapseOne" aria-expanded="true" aria-controls="CurriculumcollapseOne">
                                    <span class="me-4 text-dark d-flex">
                                        <!-- Icon -->
                                        <svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="15" height="2" fill="currentColor"/>
                                        </svg>

                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 7H15V9H0V7Z" fill="currentColor"/>
                                            <path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
                                        </svg>

                                    </span>

                                    Lessons
                                </button>
                            </h5>
                        </div>

                        <div id="CurriculumcollapseOne" class="collapse show" aria-labelledby="curriculumheadingOne" data-parent="#accordionCurriculum">

                        @foreach($lesson_list as $list)
                            <div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
                                <div class="d-flex align-items-center me-auto mb-4 mb-md-0">
                                    <div class="text-secondary d-flex">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5717 0H4.16956C4.05379 0.00594643 3.94322 0.0496071 3.85456 0.124286L0.413131 3.57857C0.328167 3.65957 0.280113 3.77191 0.280274 3.88929V16.8514C0.281452 17.4853 0.794988 17.9988 1.42885 18H12.5717C13.1981 17.9989 13.7086 17.497 13.7203 16.8707V1.14857C13.7191 0.514714 13.2056 0.00117857 12.5717 0ZM8.18099 0.857143H10.6988V4.87714L9.80527 3.45214C9.76906 3.39182 9.71859 3.3413 9.65827 3.30514C9.45529 3.18337 9.19204 3.24916 9.07027 3.45214L8.18099 4.87071V0.857143ZM3.7367 1.46786V2.66143C3.73552 3.10002 3.38029 3.45525 2.9417 3.45643H1.74813L3.7367 1.46786ZM12.8546 16.86C12.8534 17.0157 12.7274 17.1417 12.5717 17.1429H1.42885C1.42665 17.1429 1.42445 17.143 1.42226 17.143C1.26486 17.1441 1.13635 17.0174 1.13527 16.86V4.32214H2.9417C3.85793 4.31979 4.60006 3.57766 4.60242 2.66143V0.857143H7.31527V5.23286C7.31345 5.42593 7.37688 5.61391 7.49527 5.76643C7.67533 5.99539 7.98036 6.08561 8.25599 5.99143L8.28813 5.98071C8.49272 5.89484 8.66356 5.7443 8.77456 5.55214L9.44099 4.48071L10.1074 5.55214C10.2184 5.7443 10.3893 5.89484 10.5938 5.98071C10.8764 6.0922 11.1987 6.00509 11.3867 5.76643C11.5051 5.61391 11.5685 5.42593 11.5667 5.23286V0.857143H12.5717C12.7266 0.858268 12.8523 0.982982 12.8546 1.13786V16.86Z" fill="currentColor"/>
                                            <path d="M10.7761 14.3143H3.22252C2.98584 14.3143 2.79395 14.5062 2.79395 14.7429C2.79395 14.9796 2.98584 15.1715 3.22252 15.1715H10.7761C11.0128 15.1715 11.2047 14.9796 11.2047 14.7429C11.2047 14.5062 11.0128 14.3143 10.7761 14.3143Z" fill="currentColor"/>
                                            <path d="M10.7761 12.2035H3.22252C2.98584 12.2035 2.79395 12.3954 2.79395 12.6321C2.79395 12.8687 2.98584 13.0606 3.22252 13.0606H10.7761C11.0128 13.0606 11.2047 12.8687 11.2047 12.6321C11.2047 12.3954 11.0128 12.2035 10.7761 12.2035Z" fill="currentColor"/>
                                            <path d="M10.7761 10.0928H3.22252C2.98584 10.0928 2.79395 10.2847 2.79395 10.5213C2.79395 10.758 2.98584 10.9499 3.22252 10.9499H10.7761C11.0128 10.9499 11.2047 10.758 11.2047 10.5213C11.2047 10.2847 11.0128 10.0928 10.7761 10.0928Z" fill="currentColor"/>
                                            <path d="M10.7761 7.98218H3.22252C2.98584 7.98218 2.79395 8.17407 2.79395 8.41075C2.79395 8.64743 2.98584 8.83932 3.22252 8.83932H10.7761C11.0128 8.83932 11.2047 8.64743 11.2047 8.41075C11.2047 8.17407 11.0128 7.98218 10.7761 7.98218Z" fill="currentColor"/>
                                        </svg>

                                    </div>
                                    <a href="{{ route('frontend.lesson', [$course->course_category->slug, $course->slug, $list->slug]) }}">
                                        <div class="ms-4">
                                           {{ $list->title }} 
                                        </div>
                                    </a>
                                </div>

                               
                            </div>
                        @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="mb-9 row">
                <div class="col-lg-8 col-wd-8 pt-11 pt-lg-8 float-left">
                    <h3 class=""><u>Lesson Description</u></h3>

                    <br>
                   <?php
                    $string = $lesson->long_text;
                    $trans = array("![](" => "<figure class='image'><img style='height: 50 !important;width: 50% !important;' src=", ")" => '><br>');
                    $result = strtr($string,$trans);  
                   ?>
                   
                    <p class="mb-6 line-height-md">{!! $result !!}</p>
                   
                    <!-- /{category}/{course}/{lesson} -->
                    <div class="d-md-flex align-items-center justify-content-between mb-8">
                        <a @if(isset($previous) && !empty($previous) && !is_null($previous)) href="{{ URL::to($category->slug . '/' . $course->slug . '/' . $previous ) }}" 
                        class="btn btn-teal  d-flex align-items-center text-white mb-5 mb-md-0 btn-block mw-md-280p justify-content-center"
                        @else  class="btn btn-teal disabled no-drop d-flex align-items-center text-white mb-5 mb-md-0 btn-block mw-md-280p justify-content-center" @endif>
                            <i class="fas fa-arrow-left font-size-xs"></i>
                            <span class="ms-3">Previouss</span>
                        </a>

                        <a @if(isset($next) && !empty($next) && !is_null($next)) href="{{ URL::to($category->slug . '/' . $course->slug . '/' . $next ) }}" 
                        class="btn btn-teal d-flex align-items-center text-white btn-block mw-md-280p justify-content-center mt-0"
                        @else
                        class="btn btn-teal disabled no-drop d-flex align-items-center text-white btn-block mw-md-280p justify-content-center mt-0"
                        @endif >
                            <span class="me-3">Next</span>
                            <i class="fas fa-arrow-right font-size-xs"></i>
                        </a>

                    </div>

                    
                </div>
                <div class="col-md-3 col-lg-3">
                <!-- BLOG SIDEBAR
                ================================================== -->
                <div class="">
                    <div class="border rounded mb-6">
                        <div class="input-group">
                            <input class="form-control form-control-sm border-0 pe-0" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sm my-2 my-sm-0 text-secondary icon-uxs" type="submit">
                                    <!-- Icon -->
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"></path>
                                        <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"></path>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="border rounded mb-4 p-5 py-md-6">
                  
                        <!-- ADVERTISEMENT 
                        ================================================== -->
                        <section class="py-6 py-md-11 bg-white" data-jarallax data-speed=".8" >
                        <div class="container text-center py-xl-4" data-aos="fade-up">
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-2074345372388693"
                            data-ad-slot="6827333817"
                            data-ad-format="auto"
                            data-full-width-responsive="true"></ins>
                        </div>
                        </section>
                        
                    </div>

                    <div class="border rounded mb-4 p-5 py-md-6">
                       
                        <!-- ADVERTISEMENT 
                        ================================================== -->
                        <section class="py-6 py-md-11 bg-white" data-jarallax data-speed=".8" >
                        <div class="container text-center py-xl-4" data-aos="fade-up">
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-2074345372388693"
                            data-ad-slot="6827333817"
                            data-ad-format="auto"
                            data-full-width-responsive="true"></ins>
                        </div>
                        </section>
                    </div>

                    <div class="border rounded mb-4 p-5 py-md-6">
                       <!-- ADVERTISEMENT 
                        ================================================== -->
                        <section class="py-6 py-md-11 bg-white" data-jarallax data-speed=".8" >
                        <div class="container text-center py-xl-4" data-aos="fade-up">
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-2074345372388693"
                            data-ad-slot="6827333817"
                            data-ad-format="auto"
                            data-full-width-responsive="true"></ins>
                        </div>
                        </section>
                    </div>
                </div>

            </div>
            </div>
           
        </div>
    </div>


@endsection
