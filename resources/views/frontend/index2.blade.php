
@extends('frontend.layouts.app')
@section('content')
   
    

    
    <!-- FEATURED PRODUCT
    ================================================== -->
    <section class="py-9 pt-md-11 bg-white border-top border-bottom">
        <div class="container">
            

            <!-- Nav -->
            
            <nav class="nav justify-content-center mb-6 tab-nav">
                <a href="#" class="btn-sm btn-pill me-1 mb-1 text-tropaz fw-medium px-6 active" data-toggle="pill" data-filter="*" data-target="#courses">
                    All Categories
                </a>
                @foreach($featured_course_categories as $featured_course_category)
                    <a href="#" class="btn-sm btn-pill me-1 mb-1 text-tropaz fw-medium px-6" data-toggle="pill" data-filter=".{{ Str::replaceArray(' ', ['-'], $featured_course_category) }}" data-target="#courses">
                        
                        {{$featured_course_category}}
                    </a>
                @endforeach
                
            </nav>

            <!-- Items -->
            
            <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4" id="courses" data-isotope="{&quot;layoutMode&quot;: &quot;fitRows&quot;}" style="position: relative; height: 758.718px;">
                @foreach($featured_courses as $featured_course)
                    <div class="col-md pb-4 pb-md-6 {{ Str::replaceArray(' ', ['-'], $featured_course->course_category->category_name) }}" style="position: absolute; left: 0px; top: 0px;">
                        <!-- Card -->
                        <div class="card card-border-hover border shadow-dark-hover p-2 sk-fade">
                            <!-- Image -->
                            <div class="card-zoom position-relative">
                                
                                @if(!empty($featured_course->thumbnail) && isset($featured_course->thumbnail) && $featured_course->thumbnail != '' && count($featured_course->thumbnail) != 0)
                                @foreach($featured_course->thumbnail as $key => $media)
                              
                                   
                                        <a href="{{ route('frontend.course-single', [$featured_course->course_category->slug,$featured_course->slug]) }}" class="card-img sk-thumbnail d-block">
                                            <img class="rounded shadow-light-lg"  src="{{ $media->getUrl('thumb') }}" alt="">
                                        </a>
                                     
                                @endforeach
                                @else
                                        <a href="{{ route('frontend.course-single', [$featured_course->course_category->slug,$featured_course->slug]) }}" class="card-img sk-thumbnail d-block">
                                            <img class="rounded shadow-light-lg"  src="{{ asset('images/noimage.png')}}" alt="">
                                        </a>
                                @endif 

                                <span class="sk-fade-right badge-float bottom-0 right-0 mb-2 me-2">
                                    <ins class="h5 mb-0 text-white">{{$featured_course->price}}</ins>
                                </span>
                            </div>

                            <!-- Footer -->
                            <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                                <!-- Preheading -->
                                <a href="{{ route('frontend.course-single', [$featured_course->course_category->slug,$featured_course->slug]) }}"><span class="mb-1 d-inline-block text-gray-800">{{$featured_course->course_category->category_name}}</span></a>

                                <!-- Heading -->
                                <div class="position-relative">
                                    <a href="{{ route('frontend.course-single', [$featured_course->course_category->slug,$featured_course->slug]) }}" class="d-block stretched-link"><h5 class="line-clamp-2 h-md-48 h-lg-58 me-md-8 me-lg-10 me-xl-4 mb-2">{{$featured_course->title }}</h5></a>
                                    
                                    <div class="row mx-n2 align-items-end">
                                        <div class="col px-2">
                                            <ul class="nav mx-n3">
                                                <li class="nav-item px-3">
                                                    <div class="d-flex align-items-center">
                                                        @if(isset($featured_course->courseLessons) && count($featured_course->courseLessons)>0)
                                                            <!-- Icon -->
                                                            <div class="me-2 d-flex icon-uxs text-secondary">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor"/>
                                                                </svg>
                                                            </div>
                                                            <div class="font-size-sm"> {{count($featured_course->courseLessons)}} lessons</div>    
                                                        @endif
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
                
            </div>
        </div>
    </section>


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

    <!-- CATEGORIES
    ================================================== -->
    <section class="py-5 py-md-11 bg-white">
        <div class="container">
            <div class="row align-items-end mb-md-7 mb-4" data-aos="fade-up">
                <div class="col-md mb-4 mb-md-0">
                    <h1 class="mb-1">Trending Categories</h1>
                    
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('frontend.category-list') }}" class="d-flex align-items-center fw-medium">
                        Browse All
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor"></path>
                            </svg>

                        </div>
                    </a>
                </div>
                
            </div>

            <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4">
                @foreach($categories as $category)

               
                <div class="col mb-md-6 mb-4 px-2 px-md-4" data-aos="fade-up" data-aos-delay="150">
                    <!-- Card -->
                    <a href="{{ route('frontend.category.course', $category->slug) }}" class="card icon-category border shadow-dark p-md-5 p-3 text-center lift">
                        <!-- Image -->
                        <div class="position-relative text-light">
                            <div class="position-absolute bottom-0 right-0 left-0 icon-h-p">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <!-- Icon BG -->
                            <svg width="116" height="82" viewBox="0 0 116 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9238 65.8391C11.9238 65.8391 20.4749 72.4177 35.0465 70.036C49.6182 67.6542 75.9897 78.4406 75.9897 78.4406C75.9897 78.4406 90.002 85.8843 104.047 79.2427C118.093 72.6012 115.872 58.8253 115.872 58.8253C115.743 56.8104 115.606 46.9466 97.5579 22.0066C91.0438 13.0024 84.1597 6.97958 75.9458 3.74641C58.8245 -2.99096 37.7881 -0.447684 22.9067 9.81852C15.5647 14.8832 7.65514 22.0695 3.0465 31.5007C-7.27017 52.6135 11.9238 65.8391 11.9238 65.8391Z" fill="currentColor"/>
                            </svg>

                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0 pt-6">
                            <h5 class="mb-0 line-clamp-1">{{ $category->category_name}}</h5>
                            <p class="mb-0 line-clamp-1">Over {{ $category->course_category_courses_count}} Courses</p>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>
    </section>
   

    <!-- TESTIMONIAL
    ================================================== -->
    <section class="pt-5 pt-md-11 pb-9">
        <div class="container">
            <div class="text-center mb-2" data-aos="fade-up">
                <h1 class="mb-1">What our students have to say</h1>
                <p class="font-size-lg text-capitalize mb-0">Discover your perfect program in our courses.</p>
            </div>

            <div class="mx-n4" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true}'>
                <div class="col-12 col-md-6 col-xl-4 py-md-7 py-3" data-aos="fade-up" data-aos-delay="50" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-6 lift-md">
                        <!-- Image -->
                        <div class="card-zoom">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-custom me-5">
                                    <img src="/img/avatars/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Albert Cole</h5>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0">
                            <p class="mb-0 text-capitalize">“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4 py-md-7 py-3" data-aos="fade-up" data-aos-delay="100" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-6 lift-md">
                        <!-- Image -->
                        <div class="card-zoom">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-custom me-5">
                                    <img src="/img/avatars/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Alison Dawn</h5>
                                    <span>WordPress Developer</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0">
                            <p class="mb-0 text-capitalize">“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4 py-md-7 py-3" data-aos="fade-up" data-aos-delay="150" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-6 lift-md">
                        <!-- Image -->
                        <div class="card-zoom">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-custom me-5">
                                    <img src="/img/avatars/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Daniel Parker</h5>
                                    <span>Front-end Developer</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0">
                            <p class="mb-0 text-capitalize">“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4 py-md-7 py-3" data-aos="fade-up" data-aos-delay="200" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-6 lift-md">
                        <!-- Image -->
                        <div class="card-zoom">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-custom me-5">
                                    <img src="/img/avatars/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Albert Cole</h5>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0">
                            <p class="mb-0 text-capitalize">“ I believe in lifelong learning and Skola is a great place to learn from experts. I've learned a lot and recommend it to all my friends “</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row w-xl-80 mx-xl-auto text-center">
                <div class="col-md-3 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
                    <div class="h1"><span data-toggle="countup" data-from="0" data-to="749" data-aos="" data-aos-id="countup:in" class="aos-init aos-animate counted">749</span></div>
                    <p class="font-size-lg fw-medium mb-0">Creative Events</p>
                </div>

                <div class="col-md-3 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="h1"><span data-toggle="countup" data-from="0" data-to="853" data-aos="" data-aos-id="countup:in" class="aos-init aos-animate counted">853</span></div>
                    <p class="font-size-lg fw-medium mb-0">Skilled Tutors</p>
                </div>

                <div class="col-md-3 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                    <div class="h1"><span data-toggle="countup" data-from="0" data-to="28" data-aos="" data-aos-id="countup:in" class="aos-init aos-animate counted">28</span>k+</div>
                    <p class="font-size-lg fw-medium mb-0">Online Courses</p>
                </div>

                <div class="col-md-3 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="h1"><span data-toggle="countup" data-from="0" data-to="53" data-aos="" data-aos-id="countup:in" class="aos-init aos-animate counted">53</span>k+</div>
                    <p class="font-size-lg fw-medium mb-0">People Worldwide</p>
                </div>
            </div>
        </div>
    </section>
    <!-- LATEST Cources -->
    <section class="pt-5 pb-9 py-md-11">
        <div class="container ">
            <div class="row align-items-end mb-4 mb-md-7">
                <div class="col-md mb-4 mb-md-0">
                    <h1 class="mb-1">Latest Courses</h1>
                    <p class="font-size-lg mb-0 text-capitalize">Discover your perfect program in our courses.</p>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('frontend.course-list') }}" class="d-flex align-items-center fw-medium">
                        Browse All
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor"></path>
                            </svg>

                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-xl-2">
                @foreach($latest_courses as $latest_course)
                    <div class="col-xl mb-5 mb-md-6">
                        <!-- Card -->
                        <div class="card border shadow p-2 lift">
                            <div class="row gx-0 align-items-center">
                                <!-- Image -->
                                {{-- <a href="./event-single.html" class="col-auto d-block mw-md-152" style="max-width: 120px;">
                                    <img class="img-fluid rounded shadow-light-lg h-100 h-md-auto o-f-c" src="assets/img/events/event-1.jpg" alt="...">
                                </a> --}}
                                @if(!empty($latest_course->thumbnail) && isset($latest_course->thumbnail) && $latest_course->thumbnail != '' && count($latest_course->thumbnail) != 0)
                                @foreach($latest_course->thumbnail as $key => $media)
                              
                                   
                                        <a href="{{ route('frontend.course-single', [$latest_course->course_category->slug,$latest_course->slug]) }}" class="col-auto d-block mw-md-152" style="max-width: 120px;">
                                            <img class="img-fluid rounded shadow-light-lg h-100 h-md-auto o-f-c"  src="{{ $media->getUrl('thumb') }}" alt="">
                                        </a>
                                     
                                @endforeach
                                @else
                                        <a href="{{ route('frontend.course-single', [$latest_course->course_category->slug,$latest_course->slug]) }}" class="col-auto d-block mw-md-152" style="max-width: 120px;">
                                            <img class="img-fluid rounded shadow-light-lg h-100 h-md-auto o-f-c"  src="{{ asset('images/noimage.png')}}" alt="">
                                        </a>
                                @endif   

                                <!-- Body -->
                                <div class="col">
                                    <div class="card-body py-0 px-md-5 px-3">
                                        <a href="{{ route('frontend.course-single', [$latest_course->course_category->slug,$latest_course->slug]) }}" class="d-block mb-2"><h5 class="line-clamp-2 h-xl-52">{{$latest_course->title}}</h5></a>

                                        <ul class="nav mx-n3 d-block d-md-flex">
                                            <li class="nav-item px-3 mb-3 mb-md-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2 d-flex text-secondary icon-uxs">
                                                        <!-- Icon -->
                                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.3164 4.20996C13.985 4.37028 13.8464 4.76904 14.0067 5.10026C14.4447 6.00505 14.6667 6.98031 14.6667 8C14.6667 11.6759 11.6759 14.6667 8 14.6667C4.32406 14.6667 1.33333 11.6759 1.33333 8C1.33333 4.32406 4.32406 1.33333 8 1.33333C9.52328 1.33333 10.9543 1.83073 12.1387 2.77165C12.4259 3.00098 12.846 2.95296 13.0754 2.66471C13.3047 2.37663 13.2567 1.95703 12.9683 1.72803C11.5661 0.613607 9.8016 0 8 0C3.58903 0 0 3.58903 0 8C0 12.411 3.58903 16 8 16C12.411 16 16 12.411 16 8C16 6.77767 15.7331 5.60628 15.2067 4.51969C15.0467 4.18766 14.6466 4.04932 14.3164 4.20996Z" fill="currentColor"></path>
                                                            <path d="M7.99967 2.66663C7.63167 2.66663 7.33301 2.96529 7.33301 3.33329V7.99996C7.33301 8.36796 7.63167 8.66663 7.99967 8.66663H11.333C11.701 8.66663 11.9997 8.36796 11.9997 7.99996C11.9997 7.63196 11.701 7.33329 11.333 7.33329H8.66634V3.33329C8.66634 2.96529 8.36768 2.66663 7.99967 2.66663Z" fill="currentColor"></path>
                                                        </svg>

                                                    </div>
                                                    <div class="font-size-sm">{{$latest_course->course_category->category_name}}</div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- LaTest News -->
    <section class="bg-white py-5 py-md-11">
        <div class="container ">
            <div class="row align-items-end mb-4 mb-md-7 aos-init">
                <div class="col-md mb-4 mb-md-0">
                    <h1 class="mb-1">Latest News</h1>
                    <p class="font-size-lg mb-0 text-capitalize">Discover your perfect program in our courses.</p>
                </div>
                <div class="col-md-auto">
                    <a href="#" class="d-flex align-items-center fw-medium">
                        Browse All
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor"></path>
                            </svg>

                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                <div class="col-md mb-5 mb-lg-0">
                    <!-- Card -->
                    <div class="card border shadow p-2 rounded-lg lift sk-fade">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <a href="./blog-single.html" class="card-img d-block sk-thumbnail img-ratio-3"><img class="rounded shadow-light-lg img-fluid" src="assets/img/post/post-1.jpg" alt="..."></a>

                            <a href="#" class="badge sk-fade-bottom badge-lg badge-purple badge-pill badge-float bottom-0 left-0 mb-4 ms-4 px-5 me-4">
                                <span class="text-white fw-normal font-size-sm">Figma</span>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-0 pt-4">
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-3 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8102 9.52183C13.313 9.08501 12.7102 8.70758 12.0181 8.40008C11.7223 8.2687 11.3761 8.40191 11.2447 8.69762C11.1134 8.99334 11.2466 9.33952 11.5423 9.47102C12.1258 9.73034 12.6287 10.0436 13.0367 10.4021C13.5396 10.8441 13.8281 11.484 13.8281 12.1582V13.2422C13.8281 13.5653 13.5653 13.8281 13.2422 13.8281H1.75781C1.43475 13.8281 1.17188 13.5653 1.17188 13.2422V12.1582C1.17188 11.484 1.46038 10.8441 1.96335 10.4021C2.55535 9.88186 4.2802 8.67188 7.5 8.67188C9.89079 8.67188 11.8359 6.72672 11.8359 4.33594C11.8359 1.94515 9.89079 0 7.5 0C5.10921 0 3.16406 1.94515 3.16406 4.33594C3.16406 5.7336 3.82896 6.97872 4.85893 7.77214C2.97432 8.18642 1.80199 8.98384 1.18984 9.52183C0.433731 10.1862 0 11.147 0 12.1582V13.2422C0 14.2115 0.788498 15 1.75781 15H13.2422C14.2115 15 15 14.2115 15 13.2422V12.1582C15 11.147 14.5663 10.1862 13.8102 9.52183ZM4.33594 4.33594C4.33594 2.59129 5.75535 1.17188 7.5 1.17188C9.24465 1.17188 10.6641 2.59129 10.6641 4.33594C10.6641 6.08059 9.24465 7.5 7.5 7.5C5.75535 7.5 4.33594 6.08059 4.33594 4.33594Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">Jack Wilson</div>
                                    </a>
                                </li>
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-2 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0664 1.17188H11.7188V0.46875C11.7188 0.209883 11.5089 0 11.25 0C10.9911 0 10.7812 0.209883 10.7812 0.46875V1.17188H4.21875V0.46875C4.21875 0.209883 4.0089 0 3.75 0C3.4911 0 3.28125 0.209883 3.28125 0.46875V1.17188H1.93359C0.867393 1.17188 0 2.03927 0 3.10547V13.0664C0 14.1326 0.867393 15 1.93359 15H13.0664C14.1326 15 15 14.1326 15 13.0664V3.10547C15 2.03927 14.1326 1.17188 13.0664 1.17188ZM1.93359 2.10938H3.28125V2.57812C3.28125 2.83699 3.4911 3.04688 3.75 3.04688C4.0089 3.04688 4.21875 2.83699 4.21875 2.57812V2.10938H10.7812V2.57812C10.7812 2.83699 10.9911 3.04688 11.25 3.04688C11.5089 3.04688 11.7188 2.83699 11.7188 2.57812V2.10938H13.0664C13.6157 2.10938 14.0625 2.55621 14.0625 3.10547V4.21875H0.9375V3.10547C0.9375 2.55621 1.38434 2.10938 1.93359 2.10938ZM13.0664 14.0625H1.93359C1.38434 14.0625 0.9375 13.6157 0.9375 13.0664V5.15625H14.0625V13.0664C14.0625 13.6157 13.6157 14.0625 13.0664 14.0625Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">06 April, 2020</div>
                                    </a>
                                </li>
                            </ul>

                            <!-- Heading -->
                            <a href="./blog-single.html" class="d-block"><h5 class="line-clamp-2 h-48 h-lg-52">The Best Destinations to Begin Your Round the World Trip</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-5 mb-lg-0">
                    <!-- Card -->
                    <div class="card border shadow p-2 rounded-lg lift sk-fade">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <a href="./blog-single.html" class="card-img d-block sk-thumbnail img-ratio-3"><img class="rounded shadow-light-lg img-fluid" src="assets/img/post/post-2.jpg" alt="..."></a>

                            <a href="#" class="badge sk-fade-bottom badge-lg badge-purple badge-pill badge-float bottom-0 left-0 mb-4 ms-4 px-5 me-4">
                                <span class="text-white fw-normal font-size-sm">Adobe XD</span>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-0 pt-4">
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-3 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8102 9.52183C13.313 9.08501 12.7102 8.70758 12.0181 8.40008C11.7223 8.2687 11.3761 8.40191 11.2447 8.69762C11.1134 8.99334 11.2466 9.33952 11.5423 9.47102C12.1258 9.73034 12.6287 10.0436 13.0367 10.4021C13.5396 10.8441 13.8281 11.484 13.8281 12.1582V13.2422C13.8281 13.5653 13.5653 13.8281 13.2422 13.8281H1.75781C1.43475 13.8281 1.17188 13.5653 1.17188 13.2422V12.1582C1.17188 11.484 1.46038 10.8441 1.96335 10.4021C2.55535 9.88186 4.2802 8.67188 7.5 8.67188C9.89079 8.67188 11.8359 6.72672 11.8359 4.33594C11.8359 1.94515 9.89079 0 7.5 0C5.10921 0 3.16406 1.94515 3.16406 4.33594C3.16406 5.7336 3.82896 6.97872 4.85893 7.77214C2.97432 8.18642 1.80199 8.98384 1.18984 9.52183C0.433731 10.1862 0 11.147 0 12.1582V13.2422C0 14.2115 0.788498 15 1.75781 15H13.2422C14.2115 15 15 14.2115 15 13.2422V12.1582C15 11.147 14.5663 10.1862 13.8102 9.52183ZM4.33594 4.33594C4.33594 2.59129 5.75535 1.17188 7.5 1.17188C9.24465 1.17188 10.6641 2.59129 10.6641 4.33594C10.6641 6.08059 9.24465 7.5 7.5 7.5C5.75535 7.5 4.33594 6.08059 4.33594 4.33594Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">Jack Wilson</div>
                                    </a>
                                </li>
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-2 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0664 1.17188H11.7188V0.46875C11.7188 0.209883 11.5089 0 11.25 0C10.9911 0 10.7812 0.209883 10.7812 0.46875V1.17188H4.21875V0.46875C4.21875 0.209883 4.0089 0 3.75 0C3.4911 0 3.28125 0.209883 3.28125 0.46875V1.17188H1.93359C0.867393 1.17188 0 2.03927 0 3.10547V13.0664C0 14.1326 0.867393 15 1.93359 15H13.0664C14.1326 15 15 14.1326 15 13.0664V3.10547C15 2.03927 14.1326 1.17188 13.0664 1.17188ZM1.93359 2.10938H3.28125V2.57812C3.28125 2.83699 3.4911 3.04688 3.75 3.04688C4.0089 3.04688 4.21875 2.83699 4.21875 2.57812V2.10938H10.7812V2.57812C10.7812 2.83699 10.9911 3.04688 11.25 3.04688C11.5089 3.04688 11.7188 2.83699 11.7188 2.57812V2.10938H13.0664C13.6157 2.10938 14.0625 2.55621 14.0625 3.10547V4.21875H0.9375V3.10547C0.9375 2.55621 1.38434 2.10938 1.93359 2.10938ZM13.0664 14.0625H1.93359C1.38434 14.0625 0.9375 13.6157 0.9375 13.0664V5.15625H14.0625V13.0664C14.0625 13.6157 13.6157 14.0625 13.0664 14.0625Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">06 April, 2020</div>
                                    </a>
                                </li>
                            </ul>

                            <!-- Heading -->
                            <a href="./blog-single.html" class="d-block"><h5 class="line-clamp-2 h-48 h-lg-52">An Indigenous Anatolian Syllabic Script From 3500 Years Ago</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-5 mb-lg-0">
                    <!-- Card -->
                    <div class="card border shadow p-2 rounded-lg lift sk-fade">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <a href="./blog-single.html" class="card-img d-block sk-thumbnail img-ratio-3"><img class="rounded shadow-light-lg img-fluid" src="assets/img/post/post-9.jpg" alt="..."></a>

                            <a href="./blog-single.html" class="badge badge-lg sk-fade-bottom badge-purple badge-pill badge-float bottom-0 left-0 mb-4 ms-4 px-5 me-4">
                                <span class="text-white fw-normal font-size-sm">Photoshop</span>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-0 pt-4">
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-3 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8102 9.52183C13.313 9.08501 12.7102 8.70758 12.0181 8.40008C11.7223 8.2687 11.3761 8.40191 11.2447 8.69762C11.1134 8.99334 11.2466 9.33952 11.5423 9.47102C12.1258 9.73034 12.6287 10.0436 13.0367 10.4021C13.5396 10.8441 13.8281 11.484 13.8281 12.1582V13.2422C13.8281 13.5653 13.5653 13.8281 13.2422 13.8281H1.75781C1.43475 13.8281 1.17188 13.5653 1.17188 13.2422V12.1582C1.17188 11.484 1.46038 10.8441 1.96335 10.4021C2.55535 9.88186 4.2802 8.67188 7.5 8.67188C9.89079 8.67188 11.8359 6.72672 11.8359 4.33594C11.8359 1.94515 9.89079 0 7.5 0C5.10921 0 3.16406 1.94515 3.16406 4.33594C3.16406 5.7336 3.82896 6.97872 4.85893 7.77214C2.97432 8.18642 1.80199 8.98384 1.18984 9.52183C0.433731 10.1862 0 11.147 0 12.1582V13.2422C0 14.2115 0.788498 15 1.75781 15H13.2422C14.2115 15 15 14.2115 15 13.2422V12.1582C15 11.147 14.5663 10.1862 13.8102 9.52183ZM4.33594 4.33594C4.33594 2.59129 5.75535 1.17188 7.5 1.17188C9.24465 1.17188 10.6641 2.59129 10.6641 4.33594C10.6641 6.08059 9.24465 7.5 7.5 7.5C5.75535 7.5 4.33594 6.08059 4.33594 4.33594Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">Jack Wilson</div>
                                    </a>
                                </li>
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-2 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0664 1.17188H11.7188V0.46875C11.7188 0.209883 11.5089 0 11.25 0C10.9911 0 10.7812 0.209883 10.7812 0.46875V1.17188H4.21875V0.46875C4.21875 0.209883 4.0089 0 3.75 0C3.4911 0 3.28125 0.209883 3.28125 0.46875V1.17188H1.93359C0.867393 1.17188 0 2.03927 0 3.10547V13.0664C0 14.1326 0.867393 15 1.93359 15H13.0664C14.1326 15 15 14.1326 15 13.0664V3.10547C15 2.03927 14.1326 1.17188 13.0664 1.17188ZM1.93359 2.10938H3.28125V2.57812C3.28125 2.83699 3.4911 3.04688 3.75 3.04688C4.0089 3.04688 4.21875 2.83699 4.21875 2.57812V2.10938H10.7812V2.57812C10.7812 2.83699 10.9911 3.04688 11.25 3.04688C11.5089 3.04688 11.7188 2.83699 11.7188 2.57812V2.10938H13.0664C13.6157 2.10938 14.0625 2.55621 14.0625 3.10547V4.21875H0.9375V3.10547C0.9375 2.55621 1.38434 2.10938 1.93359 2.10938ZM13.0664 14.0625H1.93359C1.38434 14.0625 0.9375 13.6157 0.9375 13.0664V5.15625H14.0625V13.0664C14.0625 13.6157 13.6157 14.0625 13.0664 14.0625Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">06 April, 2020</div>
                                    </a>
                                </li>
                            </ul>

                            <!-- Heading -->
                            <a href="./blog-single.html" class="d-block"><h5 class="line-clamp-2 h-48 h-lg-52">10 Best Countries to Visit for Beginner Travelers</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-5 mb-lg-0">
                    <!-- Card -->
                    <div class="card border shadow p-2 rounded-lg lift sk-fade">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <a href="./blog-single.html" class="card-img d-block sk-thumbnail img-ratio-3"><img class="rounded shadow-light-lg img-fluid" src="assets/img/post/post-3.jpg" alt="..."></a>

                            <a href="./blog-single.html" class="badge badge-lg sk-fade-bottom badge-purple badge-pill badge-float bottom-0 left-0 mb-4 ms-4 px-5 me-4">
                                <span class="text-white fw-normal font-size-sm">Photoshop</span>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-0 pt-4">
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-3 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.8102 9.52183C13.313 9.08501 12.7102 8.70758 12.0181 8.40008C11.7223 8.2687 11.3761 8.40191 11.2447 8.69762C11.1134 8.99334 11.2466 9.33952 11.5423 9.47102C12.1258 9.73034 12.6287 10.0436 13.0367 10.4021C13.5396 10.8441 13.8281 11.484 13.8281 12.1582V13.2422C13.8281 13.5653 13.5653 13.8281 13.2422 13.8281H1.75781C1.43475 13.8281 1.17188 13.5653 1.17188 13.2422V12.1582C1.17188 11.484 1.46038 10.8441 1.96335 10.4021C2.55535 9.88186 4.2802 8.67188 7.5 8.67188C9.89079 8.67188 11.8359 6.72672 11.8359 4.33594C11.8359 1.94515 9.89079 0 7.5 0C5.10921 0 3.16406 1.94515 3.16406 4.33594C3.16406 5.7336 3.82896 6.97872 4.85893 7.77214C2.97432 8.18642 1.80199 8.98384 1.18984 9.52183C0.433731 10.1862 0 11.147 0 12.1582V13.2422C0 14.2115 0.788498 15 1.75781 15H13.2422C14.2115 15 15 14.2115 15 13.2422V12.1582C15 11.147 14.5663 10.1862 13.8102 9.52183ZM4.33594 4.33594C4.33594 2.59129 5.75535 1.17188 7.5 1.17188C9.24465 1.17188 10.6641 2.59129 10.6641 4.33594C10.6641 6.08059 9.24465 7.5 7.5 7.5C5.75535 7.5 4.33594 6.08059 4.33594 4.33594Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">Jack Wilson</div>
                                    </a>
                                </li>
                                <li class="nav-item px-3">
                                    <a href="./blog-single.html" class="d-flex align-items-center text-gray-800">
                                        <div class="me-2 d-flex">
                                            <!-- Icon -->
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0664 1.17188H11.7188V0.46875C11.7188 0.209883 11.5089 0 11.25 0C10.9911 0 10.7812 0.209883 10.7812 0.46875V1.17188H4.21875V0.46875C4.21875 0.209883 4.0089 0 3.75 0C3.4911 0 3.28125 0.209883 3.28125 0.46875V1.17188H1.93359C0.867393 1.17188 0 2.03927 0 3.10547V13.0664C0 14.1326 0.867393 15 1.93359 15H13.0664C14.1326 15 15 14.1326 15 13.0664V3.10547C15 2.03927 14.1326 1.17188 13.0664 1.17188ZM1.93359 2.10938H3.28125V2.57812C3.28125 2.83699 3.4911 3.04688 3.75 3.04688C4.0089 3.04688 4.21875 2.83699 4.21875 2.57812V2.10938H10.7812V2.57812C10.7812 2.83699 10.9911 3.04688 11.25 3.04688C11.5089 3.04688 11.7188 2.83699 11.7188 2.57812V2.10938H13.0664C13.6157 2.10938 14.0625 2.55621 14.0625 3.10547V4.21875H0.9375V3.10547C0.9375 2.55621 1.38434 2.10938 1.93359 2.10938ZM13.0664 14.0625H1.93359C1.38434 14.0625 0.9375 13.6157 0.9375 13.0664V5.15625H14.0625V13.0664C14.0625 13.6157 13.6157 14.0625 13.0664 14.0625Z" fill="currentColor"></path>
                                            </svg>

                                        </div>
                                        <div class="font-size-sm">06 April, 2020</div>
                                    </a>
                                </li>
                            </ul>

                            <!-- Heading -->
                            <a href="./blog-single.html" class="d-block"><h5 class="line-clamp-2 h-48 h-lg-52">10 Best Countries to Visit for Beginner Travelers</h5></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

   

   

    <!-- CALL ACTION
    ================================================== -->
    <section class="py-6 py-md-11 border-top border-bottom jarallax" data-jarallax data-speed=".8" style="background-image: url(/img/illustrations/illustration-1.jpg)">
        <div class="container text-center py-xl-4" data-aos="fade-up">
            <h1 class="text-capitalize">Get personal learning recommendations</h1>
            <div class="font-size-lg mb-md-6 mb-4">Enhance your skills with best Online courses</div>
            <div class="mx-auto">
                <a href="./course-list-v1.html" class="btn btn-primary btn-x-wide lift d-inline-block">GET STARTED NOW</a>
            </div>
        </div>
    </section>

    
@endsection