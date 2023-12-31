<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::with(['course_category', 'students', 'teacher', 'media'])->get();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_categories = CourseCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = User::pluck('name', 'id');

        $teachers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courses.create', compact('course_categories', 'students', 'teachers'));
    }

    public function store(StoreCourseRequest $request)
    {
      
        $data = $request->all();

        $collection = Course::where('title',$request->title)->first();
        if(isset($collection) && !empty($collection)){
            if($request->ajax()){
                return \Response::json($collection, 200);
            }
            return redirect()->route('admin.courses.index');
        }

        $filter_string = str_replace(" ", "-", strtolower(trim($request->title)));
        $data['course_category_id'] = $request->course_category_id;
        $data['slug'] = preg_replace('/[^A-Za-z0-9\-]/', '', $filter_string);
        $course = Course::create($data);

        $course->students()->sync($request->input('students', []));
        foreach ($request->input('thumbnail', []) as $file) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('thumbnail');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        if($request->ajax()){
            return \Response::json($course, 200);
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_categories = CourseCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = User::pluck('name', 'id');

        $teachers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('course_category', 'students', 'teacher');

        return view('admin.courses.edit', compact('course', 'course_categories', 'students', 'teachers'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->all();

        $filter_string = str_replace(" ", "-", strtolower(trim($request->title)));
        $data['slug'] = preg_replace('/[^A-Za-z0-9\-]/', '', $filter_string);

        $course->update($data);

        $course->students()->sync($request->input('students', []));
        if (count($course->thumbnail) > 0) {
            foreach ($course->thumbnail as $media) {
                if (!in_array($media->file_name, $request->input('thumbnail', []))) {
                    $media->delete();
                }
            }
        }
        $media = $course->thumbnail->pluck('file_name')->toArray();
        foreach ($request->input('thumbnail', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('thumbnail');
            }
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('course_category', 'students', 'teacher');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Course();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
