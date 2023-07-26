@section('meta_tags')
<title>TechedHub Solution</title>
<meta name="keywords" content="TechedHub Category Courses tutorials">
<meta name="description" content="Techudhub gives you the best learning classes in one place. Get a constantly updating feed of knowledge. We are continuing just for you..">
@endsection

@extends('frontend.layouts.app')
@section('content')

 <!-- PAGE TITLE
    ================================================== -->
    <header class="py-8 py-lg-12 mb-8 overlay overlay-primary overlay-80" 
    style="background-image: url({{ asset('img/covers/cover-19.jpg') }});">
        <div class="container text-center py-xl-5">
            <h1 class="display-4 fw-semi-bold mb-0 text-white">All Courses</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="/">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                        Courses
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Img -->
        <img class="d-none img-fluid" src="..." alt="...">
    </header>


    <!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-6 mb-xl-8 z-index-2">
        <div class="d-xl-flex align-items-center">
            <p class="mb-xl-0">We found <span class="text-dark">{{$course_cout}} courses</span> available for you</p>
            
        </div>
    </div> 


    <!-- COURSE
    ================================================== -->
    
    <div class="container pb-4 pb-xl-7">
        <div class="row row-cols-md-2 row-cols-xl-3 mb-6 mb-xl-3">
            @foreach($courses as $course)
                <div class="col-md pb-4 pb-md-7">
                    <!-- Card -->
                    <div class="card card-border-hover border shadow-dark-hover p-2 lift sk-fade">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                             <!-- page detail redirect here -->
                             
                                @if(!empty($course->thumbnail) && isset($course->thumbnail) && $course->thumbnail != '' && count($course->thumbnail) != 0)
                                @foreach($course->thumbnail as $key => $media)
                              
                                   
                                        <a href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}" class="card-img sk-thumbnail d-block">
                                            <img class="rounded shadow-light-lg"  src="{{ $media->getUrl('thumb') }}" alt="">
                                        </a>
                                     
                                @endforeach
                                @else
                                        <a href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}" class="card-img sk-thumbnail d-block">
                                            <img class="rounded shadow-light-lg"  src="{{ asset('images/noimage.png')}}" alt="">
                                        </a>
                                @endif   
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                           
                            <!-- Preheading -->
                            <a href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}"><span class="mb-1 d-inline-block text-gray-800">{{$course->course_category->category_name}}</span></a>

                            <!-- Heading -->
                            <div class="position-relative">
                                <a href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}" class="d-block stretched-link"><h4 class="line-clamp-2 h-md-48 h-lg-58 me-md-6 me-lg-10 me-xl-4 mb-2">{{$course->title }}</h4></a>

                                <div class="row mx-n2 align-items-end">
                                    <div class="col px-2">
                                        <ul class="nav mx-n3">
                                            <li class="nav-item px-3">
                                                <div class="d-flex align-items-center">
                                                    
                                                        

                                                    
                                                    @if(isset($course->courseLessons) && count($course->courseLessons)>0)
                                                        <!-- Icon -->
                                                        <div class="me-2 d-flex icon-uxs text-secondary">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor"/>
                                                            </svg>
                                                        </div>
                                                        <div class="font-size-sm"> {{count($course->courseLessons)}} lessons</div>    
                                                    @endif
                                                    
                                                </div>
                                            </li>
                                           
                                        </ul>
                                    </div>

                                    <div class="col-auto px-2 text-right">
                                        <ins class="h4 mb-0 d-block mb-lg-n1">{{$course->price}}</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $courses->links() }}</div>
            <!-- ADVERTISEMENT 
            ================================================== -->
            <section class="py-6 py-md-11 bg-white">
                <div class="container text-center py-xl-4" data-aos="fade-up">
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="autorelaxed"
                    data-ad-client="ca-pub-2074345372388693"
                    data-ad-slot="2875662270"></ins>
                </div>
            </section>
        
    </div>
            
    
@endsection