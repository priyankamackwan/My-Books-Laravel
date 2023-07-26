@section('meta_tags')
<title>@if(!empty($course->meta_title)) {{$course->meta_title}} @else TechedHub Courses @endif</title>
<meta name="keywords" @if(!empty($course->meta_keyword)) content="{{$course->meta_keyword}}" @elseif(!empty($course->title)) content="{{$course->title}}" @else content="TechedHub Courses" @endif>
<meta name="description" @if(!empty($course->meta_description)) content="{{$course->meta_description}}"  @elseif(!empty($course->title)) content="{{$course->title}}" @else content="TechedHub Courses" @endif>
@endsection


@extends('frontend.layouts.app')
@section('content')


<!-- COURSE
    ================================================== -->
    <section class="py-9 pt-md-11 bg-white border-top border-bottom">
        <div class="container">
            <div class="row mb-8">
                <div class="col-lg-8 mb-6 mb-lg-0 position-relative">
                    <h1 class="me-7 me-xl-14">
                        {{ $course->title}}
                    </h1>
                    <?php
                    $string = $course->description;
                    $trans = array("![](" => "<figure class='image'><img style='height: 20 !important;width: 20% !important;' src=", ")" => '><br>');
                    $result = strtr($string,$trans);  
                ?>
                    {{-- <p class="me-xl-13 mb-5">{!! $result !!}</p> --}}

                    

                    <!-- COURSE META
                    ================================================== -->
                    <div class="d-md-flex align-items-center mb-5">
                        

                        <div class="mb-4 mb-md-0 me-md-8 me-lg-4 me-xl-8">
                            
                            <a href="#" class="font-size-sm text-gray-800">{{$course_category->category_name}}</a>
                        </div>

                        
                    </div>

                    <!-- COURSE INFO TAB
                    ================================================== -->
                    <div id="Overview" class="mb-8">
                        <ul class="nav course-tab-v1 border-bottom h4 mb-8">
                            <li class="nav-item">
                                <a class="nav-link active" href="#Overview" data-bs-toggle="smooth-scroll" data-bs-offset="0">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Curriculum" data-bs-toggle="smooth-scroll" data-bs-offset="0">Curriculum</a>
                            </li>
                            
                        </ul>

                        <h3 class="">Course Description</h3>
                        {!! $course->description !!}

                        
                        
                    </div>

                    <div id="Curriculum" class="mb-8">
                        
                        <ul class="nav course-tab-v1 border-bottom h4 mb-8">
                            <li class="nav-item">
                                <a class="nav-link" href="#Overview" data-bs-toggle="smooth-scroll" data-bs-offset="0">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#Curriculum" data-bs-toggle="smooth-scroll" data-bs-offset="0">Curriculum</a>
                            </li>
                        
                            
                        </ul>

                        <div id="accordionCurriculum">
                            <div class="border rounded shadow mb-6 overflow-hidden">
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
                                    <?php $i = 0;?>
                                    @foreach($lessons as $lesson)
                                        <?php $i++;?>
                                        <div class="border-top @if($i % 2 == 0) bg-gray-100 @endif px-5 py-4 min-height-70 d-md-flex align-items-center">
                                            <div class="d-flex align-items-center me-auto mb-4 mb-md-0">
                                                <div class="text-secondary d-flex">
                                                <i class="fa fa-book"></i>
                                                </div>
                                                <a href="{{ route('frontend.lesson', [$course->course_category->slug, $course->slug, $lesson->slug]) }}">
                                                    <div class="ms-4">
                                                    {{ $lesson->title }}
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

                <div class="col-lg-4">
                    <!-- SIDEBAR FILTER
                    ================================================== -->
                    <div class="d-block rounded border p-2 shadow mb-6">
                        

                        <div class="pt-5 pb-4 px-5 px-lg-3 px-xl-5">
                            <div>
                                @if(!empty($course->thumbnail) && isset($course->thumbnail) && $course->thumbnail != '' && count($course->thumbnail) != 0)
                                    @foreach($course->thumbnail as $key => $media)
                                        <img alt="..." class="avatar-img rounded-lg"  src="{{ $media->getUrl('thumb') }}" alt="">
                                            
                                    @endforeach
                                    @else
                                        <img alt="..." class="avatar-img rounded-lg"  src="{{ asset('images/noimage.png')}}" alt="">
                                    @endif 
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <ins class="h2 mb-0">{{$course->price}}</ins>
                                
                                
                            </div>

                            

                        
                            <ul class="list-group list-group-flush">
                                
                              

                                <li class="list-group-item d-flex align-items-center py-3">
                                    <div class="text-secondary d-flex icon-uxs">
                                        <!-- Icon -->
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.7262 1.94825C13.4059 0.396725 10.401 0.315126 8.00002 1.73839C5.59897 0.315126 2.59406 0.396725 0.273859 1.94825C0.102729 2.06241 -3.54271e-05 2.25456 6.30651e-07 2.46027V14.6553C-0.000323889 14.8826 0.124616 15.0914 0.324917 15.1987C0.525109 15.3058 0.768066 15.294 0.9569 15.168C2.98471 13.8111 5.63063 13.8111 7.65844 15.168C7.66645 15.1735 7.67568 15.1747 7.68368 15.1796C7.69169 15.1846 7.7003 15.1932 7.70953 15.1987C7.73102 15.2079 7.75302 15.2159 7.77538 15.2227C7.79773 15.2329 7.82077 15.2415 7.84428 15.2486C7.87828 15.2564 7.91286 15.2616 7.94766 15.264C7.96551 15.264 7.98213 15.2714 7.99998 15.2714C8.00492 15.2714 8.00982 15.2714 8.01538 15.2714C8.03604 15.2699 8.05655 15.2672 8.07693 15.2634C8.10808 15.2602 8.13895 15.2547 8.16923 15.2467C8.19018 15.2399 8.21074 15.2319 8.23078 15.2227C8.24986 15.2147 8.27016 15.2104 8.28862 15.2006C8.29724 15.1956 8.30402 15.1883 8.31264 15.1827C8.32125 15.1772 8.3311 15.1753 8.33971 15.1698C10.3675 13.8129 13.0134 13.8129 15.0413 15.1698C15.3233 15.3595 15.7057 15.2846 15.8953 15.0026C15.9643 14.9 16.0008 14.779 16 14.6554V2.46027C16 2.25456 15.8973 2.06241 15.7262 1.94825ZM7.38462 13.6036C5.43516 12.6896 3.18022 12.6896 1.23076 13.6036V2.79993C3.12732 1.67313 5.48806 1.67313 7.38462 2.79993V13.6036ZM14.7692 13.6036C12.8198 12.6896 10.5648 12.6896 8.61538 13.6036V2.79993C10.5119 1.67313 12.8727 1.67313 14.7692 2.79993V13.6036Z" fill="currentColor"/>
                                        </svg>

                                    </div>
                                    <h6 class="mb-0 ms-3 me-auto">{{$course_category->category_name}}</h6>
                                    
                                </li>

                                <li class="list-group-item d-flex align-items-center py-3">
                                    <div class="text-secondary d-flex icon-uxs">
                                        <!-- Icon -->
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.7262 1.94825C13.4059 0.396725 10.401 0.315126 8.00002 1.73839C5.59897 0.315126 2.59406 0.396725 0.273859 1.94825C0.102729 2.06241 -3.54271e-05 2.25456 6.30651e-07 2.46027V14.6553C-0.000323889 14.8826 0.124616 15.0914 0.324917 15.1987C0.525109 15.3058 0.768066 15.294 0.9569 15.168C2.98471 13.8111 5.63063 13.8111 7.65844 15.168C7.66645 15.1735 7.67568 15.1747 7.68368 15.1796C7.69169 15.1846 7.7003 15.1932 7.70953 15.1987C7.73102 15.2079 7.75302 15.2159 7.77538 15.2227C7.79773 15.2329 7.82077 15.2415 7.84428 15.2486C7.87828 15.2564 7.91286 15.2616 7.94766 15.264C7.96551 15.264 7.98213 15.2714 7.99998 15.2714C8.00492 15.2714 8.00982 15.2714 8.01538 15.2714C8.03604 15.2699 8.05655 15.2672 8.07693 15.2634C8.10808 15.2602 8.13895 15.2547 8.16923 15.2467C8.19018 15.2399 8.21074 15.2319 8.23078 15.2227C8.24986 15.2147 8.27016 15.2104 8.28862 15.2006C8.29724 15.1956 8.30402 15.1883 8.31264 15.1827C8.32125 15.1772 8.3311 15.1753 8.33971 15.1698C10.3675 13.8129 13.0134 13.8129 15.0413 15.1698C15.3233 15.3595 15.7057 15.2846 15.8953 15.0026C15.9643 14.9 16.0008 14.779 16 14.6554V2.46027C16 2.25456 15.8973 2.06241 15.7262 1.94825ZM7.38462 13.6036C5.43516 12.6896 3.18022 12.6896 1.23076 13.6036V2.79993C3.12732 1.67313 5.48806 1.67313 7.38462 2.79993V13.6036ZM14.7692 13.6036C12.8198 12.6896 10.5648 12.6896 8.61538 13.6036V2.79993C10.5119 1.67313 12.8727 1.67313 14.7692 2.79993V13.6036Z" fill="currentColor"/>
                                        </svg>

                                    </div>
                                    <h6 class="mb-0 ms-3 me-auto">Lessons</h6>
                                    <span>{{ $lesson_count }}</span>
                                </li>
                               
                            </ul>
                        </div>
                    </div>

                    <div class="d-block rounded border p-2 shadow mb-6">
                        

                        <div class="pt-5 pb-4 px-5 px-lg-3 px-xl-5">
                            <div>
                                  <!-- ADVERTISEMENT 
                                ================================================== -->
                                <section class="py-6 py-md-11 bg-white" data-jarallax data-speed=".8" style="background-image: url(assets/img/illustrations/illustration-4.jpg)">
                                    <div class="container text-center py-xl-4" data-aos="fade-up">
                                    <ins class="adsbygoogle"
                                        style="display:block"
                                        data-ad-format="autorelaxed"
                                        data-ad-client="ca-pub-2074345372388693"
                                        data-ad-slot="2875662270"></ins>
                                    </div>
                                </section>

                            </div>
                           

                        </div>
                    </div>

                    <div class="d-block">
                        <div class="border rounded px-6 px-lg-5 px-xl-6 pt-5 shadow">
                            <h3 class="mb-5">Latest Courses</h3>
                            <ul class="list-unstyled mb-0">
                            
                                @if(isset($latest_course) && count($latest_course) > 0)
                                    @foreach($latest_course as $latest)
                                    <li class="media mb-6 d-flex">
                                    @if(!empty($latest_course->thumbnail) && isset($latest_course->thumbnail) && $latest_course->thumbnail != '' && count($latest_course->thumbnail) != 0)
                                    @foreach($latest_course->thumbnail as $key => $media)
                                
                                    
                                            <a href="{{ route('frontend.course-single', [$latest->course_category->slug,$latest->slug]) }}" class="w-100p d-block me-5">
                                                <img alt="..." class="avatar-img rounded-lg h-60p w-80p"  src="{{ $media->getUrl('thumb') }}" alt="">
                                            </a>
                                        
                                    @endforeach
                                    @else
                                            <a href="{{ route('frontend.course-single', [$latest->course_category->slug,$latest->slug]) }}" class="w-100p d-block me-5">
                                                <img alt="..." class="avatar-img rounded-lg h-60p w-80p"  src="{{ asset('images/noimage.png')}}" alt="">
                                            </a>
                                    @endif   

                                        <div class="media-body flex-grow-1">
                                            <a href="{{ route('frontend.course-single', [$course->course_category->slug,$latest->slug]) }}" class="d-block">
                                                <h6 class="line-clamp-2 mb-3">{{ $latest->title }}</h6>
                                            </a>
                                            <p class="line-clamp-2 mb-3">
                                                
                                            {{ $latest->course_category['category_name'] }}
                                        
                                        </p>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                <h6 class="mb-5">No Latest Courses Found</h6>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mb-5 mb-md-8">
                <h1>Related Courses</h1>
                <p class="font-size-lg text-capitalize">Discover your perfect program in our courses.</p>
            </div>

            <div class="mx-n4 mb-12" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true}'>
                @if(isset($related_courses) && count($related_courses) > 0)
                    @foreach($related_courses as $related_course)
                        <div class="col-md-6 col-lg-4 col-xl-3 pb-4 pb-md-5" style="padding-right:15px;padding-left:15px;">
                            <!-- Card -->
                            <div class="card border shadow-dark-hover p-2 sk-fade">
                                <!-- Image -->
                                <div class="card-zoom position-relative">
                                    
                                
                                    @if(!empty($related_course->thumbnail) && isset($related_course->thumbnail) && $related_course->thumbnail != '' && count($related_course->thumbnail) != 0)
                                    @foreach($related_course->thumbnail as $key => $media)
                                
                                    
                                            <a href="{{ route('frontend.course-single', [$related_course->course_category->slug,$related_course->slug]) }}" class="w-100p d-block me-5">
                                                <img alt="..." class="rounded shadow-light-lg"  src="{{ $media->getUrl('thumb') }}" alt="">
                                            </a>
                                        
                                    @endforeach
                                    @else
                                            <a href="{{ route('frontend.course-single', [$related_course->course_category->slug,$related_course->slug]) }}" class="w-100p d-block me-5">
                                                <img alt="..." class="rounded shadow-light-lg"  src="{{ asset('images/noimage.png')}}" alt="">
                                            </a>
                                    @endif  

                                    <span class="sk-fade-right badge-float bottom-0 right-0 mb-2 me-2">
                                        <ins class="h5 mb-0 text-white">{{$related_course->price}}</ins>
                                    </span>
                                </div>

                                <!-- Footer -->
                                <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                                    <!-- Preheading -->
                                    <a href="{{ route('frontend.course-single', [$related_course->course_category->slug,$related_course->slug]) }}"><span class="mb-1 d-inline-block text-gray-800">{{ $related_course->course_category->category_name }}</span></a>

                                    <!-- Heading -->
                                    <div class="position-relative">
                                        <a href="{{ route('frontend.course-single', [$related_course->course_category->slug,$related_course->slug]) }}" class="d-block stretched-link"><h5 class="line-clamp-2 h-md-48 h-lg-58 me-md-8 me-lg-10 me-xl-4 mb-2">{{ $related_course->title }}</h5></a>

                                        <div class="row mx-n2 align-items-end">
                                            <div class="col px-2">
                                                <ul class="nav mx-n3">
                                                    <li class="nav-item px-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 d-flex icon-uxs text-secondary">
                                                                <!-- Icon -->
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor"/>
                                                                </svg>

                                                            </div>
                                                            <div class="font-size-sm">{{count($related_course->courseLessons)}} lessons</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h6 class="mb-5">No Related Courses Found</h6>
                @endif    
                
            </div>
        </div>
    </section>

@endsection