<!-- NAVBAR
    ================================================== -->
    <header class="navbar navbar-expand-xl navbar-light">
        <div class="container ">

            <!-- Brand -->
            <a class="navbar-brand ms-0" href="/">
                <img src="{{ asset('img/logo.png')}}" class="navbar-brand-img" alt="...">
            </a>

            <!-- Vertical Menu -->
            <ul class="navbar-nav navbar-vertical ms-xl-4 d-none d-xl-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pb-4 mb-n4 px-0 pt-0" id="navbarVerticalMenu" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                        <div class="bg-dark rounded-pill py-3 px-5 d-flex align-items-center">
                            <div class="me-3 ms-1 d-flex text-white">
                                <!-- Icon -->
                                <svg width="25" height="17" viewBox="0 0 25 17" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="25" height="1" fill="currentColor"></rect>
                                    <rect y="8" width="15" height="1" fill="currentColor"></rect>
                                    <rect y="16" width="20" height="1" fill="currentColor"></rect>
                                </svg>

                            </div>
                            <span class="text-white fw-medium me-1">Courses</span>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-md bg-primary rounded py-4 mt-4" aria-labelledby="navbarVerticalMenu">
                        @foreach($categories_menu as $category)
                        
                            <li class="dropdown-item dropright">
                                <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    <div class="me-4 d-flex text-white icon-xs">
                                        <!-- Icon -->
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5717 0H4.16956C4.05379 0.00594643 3.94322 0.0496071 3.85456 0.124286L0.413131 3.57857C0.328167 3.65957 0.280113 3.77191 0.280274 3.88929V16.8514C0.281452 17.4853 0.794988 17.9988 1.42885 18H12.5717C13.1981 17.9989 13.7086 17.497 13.7203 16.8707V1.14857C13.7191 0.514714 13.2056 0.00117857 12.5717 0ZM8.18099 0.857143H10.6988V4.87714L9.80527 3.45214C9.76906 3.39182 9.71859 3.3413 9.65827 3.30514C9.45529 3.18337 9.19204 3.24916 9.07027 3.45214L8.18099 4.87071V0.857143ZM3.7367 1.46786V2.66143C3.73552 3.10002 3.38029 3.45525 2.9417 3.45643H1.74813L3.7367 1.46786ZM12.8546 16.86C12.8534 17.0157 12.7274 17.1417 12.5717 17.1429H1.42885C1.42665 17.1429 1.42445 17.143 1.42226 17.143C1.26486 17.1441 1.13635 17.0174 1.13527 16.86V4.32214H2.9417C3.85793 4.31979 4.60006 3.57766 4.60242 2.66143V0.857143H7.31527V5.23286C7.31345 5.42593 7.37688 5.61391 7.49527 5.76643C7.67533 5.99539 7.98036 6.08561 8.25599 5.99143L8.28813 5.98071C8.49272 5.89484 8.66356 5.7443 8.77456 5.55214L9.44099 4.48071L10.1074 5.55214C10.2184 5.7443 10.3893 5.89484 10.5938 5.98071C10.8764 6.0922 11.1987 6.00509 11.3867 5.76643C11.5051 5.61391 11.5685 5.42593 11.5667 5.23286V0.857143H12.5717C12.7266 0.858268 12.8523 0.982982 12.8546 1.13786V16.86Z" fill="currentColor"></path>
                                        <path d="M10.7761 14.3143H3.22252C2.98584 14.3143 2.79395 14.5062 2.79395 14.7429C2.79395 14.9796 2.98584 15.1715 3.22252 15.1715H10.7761C11.0128 15.1715 11.2047 14.9796 11.2047 14.7429C11.2047 14.5062 11.0128 14.3143 10.7761 14.3143Z" fill="currentColor"></path>
                                        <path d="M10.7761 12.2035H3.22252C2.98584 12.2035 2.79395 12.3954 2.79395 12.6321C2.79395 12.8687 2.98584 13.0606 3.22252 13.0606H10.7761C11.0128 13.0606 11.2047 12.8687 11.2047 12.6321C11.2047 12.3954 11.0128 12.2035 10.7761 12.2035Z" fill="currentColor"></path>
                                        <path d="M10.7761 10.0928H3.22252C2.98584 10.0928 2.79395 10.2847 2.79395 10.5213C2.79395 10.758 2.98584 10.9499 3.22252 10.9499H10.7761C11.0128 10.9499 11.2047 10.758 11.2047 10.5213C11.2047 10.2847 11.0128 10.0928 10.7761 10.0928Z" fill="currentColor"></path>
                                        <path d="M10.7761 7.98218H3.22252C2.98584 7.98218 2.79395 8.17407 2.79395 8.41075C2.79395 8.64743 2.98584 8.83932 3.22252 8.83932H10.7761C11.0128 8.83932 11.2047 8.64743 11.2047 8.41075C11.2047 8.17407 11.0128 7.98218 10.7761 7.98218Z" fill="currentColor"></path>
                                    </svg>

                                    </div>
                                        {{$category->category_name}}
                                </a>

                                @if(isset($category->courseCategoryCourses) && count($category->courseCategoryCourses) > 0)
                                    <div class="dropdown-menu ps-3 top-0 pe-0 py-0 shadow-none bg-transparent">
                                        <div class="dropdown-menu-md bg-primary rounded dropdown-menu-inner">
                                            @foreach($category->courseCategoryCourses as $course)
                                                @if($course->is_published == 1)
                                                    <a class="dropdown-item" href="{{ route('frontend.course-single', [$course->course_category->slug,$course->slug]) }}">
                                                        {{$course->title}}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </li>
                            
                        
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Collapse -->
            <div class="collapse navbar-collapse z-index-lg" id="navbarCollapse">

                <!-- Toggler -->
                <button class="navbar-toggler outline-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Icon -->
                    <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                        <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                    </svg>

                </button>

                <!-- Navigation -->
                <ul class="navbar-nav ms-5">
                    <li class="nav-item">
                        <a class="nav-link px-xl-4" id="navbarLandings"  href="/" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                        
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link px-xl-4" id="navbarLandings"  href="{{ route('frontend.course-list') }}" aria-haspopup="true" aria-expanded="false">
                            Courses
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-xl-4" id="navbarLandings"  href="#" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        
                    </li>
             
                    
                </ul>
            </div>

            <!-- Search -->
            <form class="d-wd-flex ms-auto w-xl-350p" method="GET" action="{{ route("frontend.search-result") }}">
                <div class="input-group bg-white rounded-pill overflow-hidden">
                    <div class="input-group-prepend">
                        <button class="btn btn-sm my-2 my-sm-0 text-secondary icon-xs d-flex align-items-center" type="submit">
                            <!-- Icon -->
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"></path>
                                <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"></path>
                            </svg>

                        </button>
                    </div>
                    <input name="q" class="form-control form-control-sm border-0 ps-0" type="search" placeholder="What do you want to learn ?" aria-label="Search">
                </div>
            </form>

            <!-- Search, Account & Cart -->
            

            <!-- Toggler -->
            <button class="navbar-toggler ms-4 ms-md-5 shadow-none bg-teal text-white icon-xs p-0 outline-0 h-40p w-40p d-flex d-xl-none place-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Icon -->
                <svg width="25" height="17" viewBox="0 0 25 17" xmlns="http://www.w3.org/2000/svg">
                    <rect width="25" height="1" fill="currentColor"></rect>
                    <rect y="8" width="15" height="1" fill="currentColor"></rect>
                    <rect y="16" width="20" height="1" fill="currentColor"></rect>
                </svg>

            </button>
        </div>
    </header>

