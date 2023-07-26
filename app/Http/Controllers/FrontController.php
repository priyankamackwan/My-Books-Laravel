<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function __construct() 
    {
        try {
            $categories_menu =  CourseCategory::orderBy('id','ASC')->with('courseCategoryCourses')->withCount('courseCategoryCourses')->get();
            View::share('categories_menu', $categories_menu);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
    public function index(){
        try {
            $categories =  CourseCategory::orderBy('id','ASC')->with('courseCategoryCourses')->withCount('courseCategoryCourses')->take(8)->get();


            $featured_courses = Course::orderBy('id','ASC')->with('courseLessons')->with('course_category')->where('courses.is_published', '=', 1)->take(8)->get();
            $featured_course_categories = [];
            foreach($featured_courses as $featured_course)
            {
                $featured_course_categories[] = $featured_course->course_category->category_name;
            }

            // $featured_courses = Course::orderBy('id','ASC')->with('courseLessons')->with('course_category')->where('courses.is_published', '=', 1)->take(8)->get();
            
            // foreach($featured_courses as $featured_course)
            // {
            //     $featured_course_categories[] = $featured_course->course_category->category_name;
            // }


            // $featured_course_categories = array_unique($featured_course_categories);
            // $latest_courses = Course::orderBy('id','ASC')->with('courseLessons')->with('course_category')->where('courses.is_published', '=', 1)->take(6)->get();
            
            // return view('frontend.index', compact('categories','featured_courses','featured_course_categories','latest_courses'));

            return view('frontend.index');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function courseList(Request $request){
        try {

            $search = strtoupper($request->input('course_name'));
            $category_filter = $request->input('category_filter');
            
            if($request->ajax()){

                $data = Course::orderBy('id','ASC')
                            ->with('courseLessons')
                            ->with('course_category')
                            ->where('courses.is_published', '=', 1);
                    
                if(isset($search) && !empty($search)){

                    $data->whereHas('course_category', function ($query) use ($search){
                        $query->where(\DB::raw('upper(title)'),'like','%'.$search.'%');
                        $query->orWhere(\DB::raw('upper(category_name)'), 'like', '%'.$search.'%');
                    });
                   
                }   

                if(isset($category_filter) && !empty($category_filter)){
                    $data->where('course_category_id',$category_filter);
                }    
                 
                $courses = $data->get();    
                $course_cout = $data->count();
               
                $obj = [];
                $i = 0;
                foreach($courses as $course){

                    if(!empty($course->thumbnail) && isset($course->thumbnail) && $course->thumbnail != '' && count($course->thumbnail) != 0){
                        foreach($course->thumbnail as $key => $media){
                            $src =  $media->getUrl('thumb');
                        }
                    }else{
                        $src = env('APP_URL').'/images/noimage.png';
                    }

                    $obj[$i]['title'] = $course->title;
                    $obj[$i]['category_title'] = $course->course_category['category_name'];
                    $obj[$i]['count'] = $course_cout;
                    $obj[$i]['route_url'] = url($course->course_category['slug'],$course->slug);
                    $obj[$i]['image_src'] = $src;
                    $obj[$i]['lession_count'] = count($course->courseLessons);
                    $i++;
                }
                   
                return \Response::json($obj, 200);
            }
            
            $courses = Course::orderBy('id','ASC')->with('courseLessons')->with('course_category')->where('courses.is_published', '=', 1)->paginate(10);

            $course_cout = Course::orderBy('id','ASC')->where('courses.is_published', '=', 1)->count();

            $categories_filter =  CourseCategory::orderBy('id','ASC')->get();
            
            return view('frontend.course.index',compact('courses','course_cout','categories_filter'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function courseSingle($category_slug, $course_slug){
        try {
            $course = Course::where('slug', $course_slug)->first();
            
            if(isset($course) && !empty($course)){
                
                $lessons = Lesson::orderBy('id','ASC')->where('course_id', $course->id)->get();
                $lesson_count = Lesson::where('course_id', $course->id)->count();
                $course_category = CourseCategory::where('slug', $category_slug)->first();

                
                if(isset($course_category) && !empty($course_category)){
                    $related_courses = Course::orderBy('id','ASC')->with('courseLessons')->with('course_category')->where('courses.course_category_id',$course_category->id)->whereNotIn('courses.id', [$course->id])->where('courses.is_published', '=', 1)->take(6)->get();
                }
                

                $latest_course = Course::orderBy('id','ASC')->whereNotIn('id', [$course->id])->has('course_category')->take(4)->get();

                return view('frontend.course.show', compact('course','course','lesson_count','latest_course','lessons','course_category','related_courses'));

            }else{
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function lessonDetails($category_slug, $course_slug, $lesson_slug){
        try {
            $course = Course::where('slug', $course_slug)->first();
           
            if(isset($course)){
               
                $lesson_list = Lesson::orderBy('id','ASC')->where('course_id', $course->id)->get();
                $lesson = Lesson::where('course_id', $course->id)->where('slug', $lesson_slug)->first(); 
                $category =  CourseCategory::where('id', $course->course_category_id)->first();

                ##NEXT_PRIVOUS_BUTTON
                
                $previous = Lesson::where('id', ($lesson->id - 1))
                                    ->where('course_id', $course->id)
                                    ->value('slug');

                $next = Lesson::where('id', ($lesson->id + 1))
                                ->where('course_id', $course->id)
                                ->value('slug');
                
                return view('frontend.lesson.show', compact('lesson', 'lesson_list','course','category', 'previous','next'));

            }else{
                return redirect()->back();
            }
            
            

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function categoryList(){
        try {
            $all_categories =  CourseCategory::orderBy('id','ASC')->with('courseCategoryCourses')->withCount('courseCategoryCourses')->paginate(10);
            return view('frontend.category.index', compact('all_categories'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function categoryCourse($slug){
        try {
            $category = CourseCategory::where('slug', $slug)->first();

            if(isset($category)){
                $courses = Course::orderBy('id','ASC')->where('course_category_id', $category->id)
                ->where('courses.is_published', '=', 1)
                ->paginate(10);

                $course_cout = Course::orderBy('id','ASC')->where('courses.is_published', '=', 1)
                ->where('course_category_id', $category->id)
                ->count();
            }else{
                return redirect()->back();
            }
            

            return view('frontend.category.courses', compact('courses', 'course_cout'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function searchResult(Request $request)
    {
        $search_string = strtoupper($request->input("q"));
        $course_categories = [];
        $search_course_catgory_id = $request->input("filter_category");
        
        
        $data = Course::orderBy('id','ASC')
                    ->with('courseLessons')
                    ->with('course_category')
                    ->when($search_course_catgory_id ,function($query,$search_course_catgory_id){ // if role_id equals to 2 
                        $query->where("courses.course_category_id",$search_course_catgory_id);
                    })
                    ->where('courses.is_published', '=', 1);
        
        if(isset($search_string) && !empty($search_string)){

            $data->whereHas('course_category', function ($query) use ($search_string){
                $query->where(\DB::raw('upper(title)'),'like','%'.$search_string.'%');
                $query->orWhere(\DB::raw('upper(category_name)'), 'like', '%'.$search_string.'%');
            });
            
        }   

        $courses = $data->paginate(10);
        
        $courses_cat = Course::orderBy('id','ASC')
                    ->with('courseLessons')
                    ->with('course_category')
                    ->where('courses.title','like','%'.$search_string.'%')
                    ->where('courses.is_published', '=', 1)->get();
                    

        foreach($courses_cat as $course)
        {
            $course_categories[$course->course_category->id] = $course->course_category->category_name;
        }
        $course_categories = array_unique($course_categories);
        
        return view('frontend.course.search-result', compact('courses','course_categories','search_string','search_course_catgory_id'));
        
    }  
}
