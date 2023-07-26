@section('meta_tags')
<title>TechedHub Solution</title>
<meta name="keywords" content="TechedHub Courses tutorials">
<meta name="description" content="Techudhub gives you the best learning classes in one place. Get a constantly updating feed of knowledge. We are continuing just for you..">
@endsection


@extends('frontend.layouts.app')
@section('content')

 <!-- PAGE TITLE
    ================================================== -->
    <!-- <header class="py-8 py-lg-12 mb-8 overlay overlay-primary overlay-80" 
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
       
        <img class="d-none img-fluid" src="..." alt="...">
    </header> -->


    <!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-6 mb-xl-8 z-index-2 border-top py-8">
   

        <div class="d-xl-flex align-items-center">
            <p class="mb-xl-0 rootNode">
                We found <b class="rootNode">
                <span class="text-dark count-tab" id="counttab">@if(isset($course_cout)) {{$course_cout}} @endif</span> 
                <span class="text-dark childNode" style="display:none;"></span> 
                </b> courses available for you
            </p>

            <div class="ms-xl-auto d-xl-flex flex-wrap">
                <div class="mb-4 mb-xl-0 ms-xl-6">
                    <!-- Search -->
                    
                    <!-- <form class=""  method="GET" role="search"> -->
                  
                        <div class="input-group input-group-filter">
                            <input  class="form-control search-item form-control-sm placeholder-dark border-end-0" value="{{ old('course_name') }}" type="search" placeholder="Search our courses" name="course_name"  onkeypress="return enterKeyPressed(event)" id="search_data" aria-label="Search">

                            <div class="input-group-append">
                                <button id="search" class="btn search-item btn-sm btn-outline-white border-start-0 text-dark bg-transparent" type="submit">
                                    <!-- Icon -->
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"/>
                                        <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>

                <div class="mb-4 mb-xl-0 ms-xl-6">
                    <select name="dropdown-category" id="dropdown-category" class="form-select form-select-sm text-dark shadow-none dropdown-menu-end" data-choices>
                            <option value='0'>All Categories</option>
                            @if(isset($categories_filter))
                                @foreach($categories_filter as $filter)
                                    <option value="{{ $filter->id }}" >{{ $filter->category_name }}</option>
                                @endforeach
                            @endif
                    </select>
                </div>

               
            </div>
        </div>
    </div> 


    <!-- COURSE
    ================================================== -->
    <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <div class="spinner-border text-primary mb-1" role="status" style="height: 100px;width: 100px;display:none">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
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
        <div class="pagination-class">{{ $courses->links() }}</div>

        <section class="py-6 bg-white search-item-error" style="display:none">
        <div class="container text-center py-xl-4">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h4 class="text-capitalize">Sorry We could not find course with your search criteria</h4>
                </div>
            </div>
        </div>
        </section><br>
      


        <!-- ADVERTISEMENT 
                        ================================================== -->
        <section class="py-6 py-md-11 bg-white">
        <div class="container text-center py-xl-4">
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
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    var HTMLContent = function() { 
        value= $('#search_data').val();

        $.ajax({
            type: "get",
            url: '{{ route('frontend.course-list')}}',
            data: {'course_name':value},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $(".spinner-border").show()
                $(".container").css("opacity", "0.1");
            },
            complete: function() {
                $(".spinner-border").hide()
                $(".container").css("opacity", "1");
            },
            success: function(response){
              
                if(response.data !== 'undefined'){
                    var div = $('.course-tab');

                    var collection_html = '';
                    var i = 0;
                    $('#counttab').hide();
                    if(response.length == 0){
                        $('.childNode').show();
                        $('.childNode').text(0);
                        $('.pagination-class').hide();
                        $('.search-item-error').show();
                    }
                  
                    $.each(response, function( index, value ) {
                    
                       
                        $('.search-item-error').hide();
                        $('.childNode').show();
                        $('.childNode').text(value.count);
                    
                        collection_html += '<div class="col-md pb-4 pb-md-7"><div class="card card-border-hover border shadow-dark-hover p-2 lift sk-fade"><div class="card-zoom position-relative"><a href="'+value.route_url+'" class="card-img sk-thumbnail d-block"><img class="rounded shadow-light-lg"  src="'+value.image_src+'" alt=""></a></div><div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative"><a href=""><span class="mb-1 d-inline-block text-gray-800 category-blog">'+value.category_title+'</span></a><div class="position-relative"><a href="'+value.route_url+'" class="d-block stretched-link"><h4 class="line-clamp-2 h-md-48 h-lg-58 me-md-6 me-lg-10 me-xl-4 mb-2">'+value.title+'</h4></a><div class="row mx-n2 align-items-end"><div class="col px-2"><ul class="nav mx-n3"><li class="nav-item px-3"><div class="d-flex align-items-center"><div class="me-2 d-flex icon-uxs text-secondary"><i class="fas fa-book-reader"></i></div><div class="font-size-sm">'+value.lession_count+' lessons</div></div></li></ul></div><div class="col-auto px-2 text-right"><ins class="h4 mb-0 d-block mb-lg-n1"></ins></div></div></div></div></div></div>';

                    });
                
                    div.html(collection_html);
                   

                }

                
            }
        });
    }

    $("#search").on('click',function(e){
        e.preventDefault();
        HTMLContent();
        
    });

    function enterKeyPressed(event) {
      if (event.keyCode == 13) {
            HTMLContent();
      } 
   }

  
    $('#dropdown-category').change(function(){
        var id = $(this).val();
        $('#dropdown-category').find('option').not(':first').remove();
        var category_filter = id;
        value= $('#search_data').val();

        $('.spinner-border').show();

        $.ajax({
            type: "get",
            url: '{{ route('frontend.course-list')}}',
            data: {
                'category_filter':category_filter, 
                'course_name':value
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
               
                $('.spinner-border').hide();

                if(response.data !== 'undefined'){
                    var div = $('.course-tab');

                    var collection_html = '';
                    var i = 0;
                    $.each(response, function( index, value ) {
                     
                        $('#counttab').hide();
                        $('.childNode').show();
                        $('.childNode').text(value.count);
                       
                        collection_html += '<div class="col-md pb-4 pb-md-7"><div class="card card-border-hover border shadow-dark-hover p-2 lift sk-fade"><div class="card-zoom position-relative"><a href="'+value.route_url+'" class="card-img sk-thumbnail d-block"><img class="rounded shadow-light-lg"  src="'+value.image_src+'" alt=""></a></div><div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative"><a href=""><span class="mb-1 d-inline-block text-gray-800 category-blog">'+value.category_title+'</span></a><div class="position-relative"><a href="'+value.route_url+'" class="d-block stretched-link"><h4 class="line-clamp-2 h-md-48 h-lg-58 me-md-6 me-lg-10 me-xl-4 mb-2">'+value.title+'</h4></a><div class="row mx-n2 align-items-end"><div class="col px-2"><ul class="nav mx-n3"><li class="nav-item px-3"><div class="d-flex align-items-center"><div class="me-2 d-flex icon-uxs text-secondary"><i class="fas fa-book-reader"></i></div><div class="font-size-sm">'+value.lession_count+' lessons</div></div></li></ul></div><div class="col-auto px-2 text-right"><ins class="h4 mb-0 d-block mb-lg-n1"></ins></div></div></div></div></div></div>';

                    });
                   
                    div.html(collection_html);

                }

                
            }
        });

    });

   

</script>
@endsection