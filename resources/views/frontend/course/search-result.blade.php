@section('meta_tags')
<title>TechedHub Solution</title>
<meta name="keywords" content="TechedHub Courses tutorials">
<meta name="description" content="Techudhub gives you the best learning classes in one place. Get a constantly updating feed of knowledge. We are continuing just for you..">
@endsection

@extends('frontend.layouts.app')
@section('content')

<!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-6 mb-xl-8 z-index-2 border-top py-8">
        <div class="d-xl-flex align-items-center">
            <p class="mb-xl-0">
            @if(count($courses) > 0 )
                We found <span class="text-dark"> {{$courses->total()}} courses</span> available for you</p>
            @else
                We could not find course with your search criteria
            @endif
            </p>
            <!-- <div class="ms-xl-auto d-xl-flex flex-wrap">
                <div class="mb-4 mb-xl-0 ms-xl-6">
                    <form id="filter_form" method="GET" action="{{ route("frontend.search-result") }}">
                        <select id="filter_category" name="filter_category" class="form-select form-select-sm text-dark shadow-none dropdown-menu-end" data-choices>
                            <option value="">All Categories</option>
                            @foreach($course_categories as $key=>$course_categories )
                                @if($search_course_catgory_id == $key)
                                    <option selected="selected" value="{{$key}}">{{$course_categories}}</option>
                                @else
                                    <option value="{{$key}}">{{$course_categories}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                        <input type="hidden" name="q" value="{{$search_string}}" >
                        
                        
                    </form>
                </div>
            </div> -->
        </div>
        
    </div> 

<!-- COURSE
    ================================================== -->
    <div class="container pb-4 pb-xl-7">
        <div class="row row-cols-md-2 row-cols-xl-3 mb-6 mb-xl-3 course-tab">
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
                            <a href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}"><span class="mb-1 d-inline-block text-gray-800 category-blog">{{$course->course_category->category_name}}</span></a>

                            <!-- Heading -->
                            <input type="hidden" value="{{$course->course_category->slug}}" id="category-slug">
                            <input type="hidden" value="{{$course->slug}}" id="course-slug">

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
                                                        <i class="fas fa-book-reader"></i>
                                                        </div>
                                                        <div class="font-size-sm"> {{count($course->courseLessons)}} lessons</div> 
                                                    @else 
                                                    <div class="me-2 d-flex icon-uxs text-secondary">
                                                        <i class="fas fa-book-reader"></i>
                                                        </div>
                                                        <div class="font-size-sm"> 0 lessons</div>       
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
        {{-- <div>{{ $courses->links() }}</div> --}}
        <div>{{ $courses->appends(request()->except('page'))->links() }}</div>
         <!-- ADVERTISEMENT 
            ================================================== -->
            <section class="py-6 py-md-11 bg-white" >
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
@section('script')
<script type="text/javascript">
     $("#filter_category").on('change',function(e){
        
        category= $('#filter_category').val();
        $('#filter_form').submit();
        
    });
</script>
@endsection