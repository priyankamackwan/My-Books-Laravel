<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseCategoryRequest;
use App\Http\Requests\StoreCourseCategoryRequest;
use App\Http\Requests\UpdateCourseCategoryRequest;
use App\Models\CourseCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseCategoriesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseCategory::query()->select(sprintf('%s.*', (new CourseCategory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_category_show';
                $editGate = 'course_category_edit';
                $deleteGate = 'course_category_delete';
                $crudRoutePart = 'course-categories';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('category_name', function ($row) {
                return $row->category_name ? $row->category_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.courseCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseCategories.create');
    }

    public function store(StoreCourseCategoryRequest $request)
    {
       
        $collection = CourseCategory::where('category_name',$request->category_name)->first();
        if(isset($collection) && !empty($collection)){
            if($request->ajax()){
                return \Response::json($collection, 200);
            }
            return redirect()->route('admin.course-categories.index');
        }

        $data = $request->all();
        $data['slug'] = str_replace(" ", "-", strtolower($request->category_name));
        $courseCategory = CourseCategory::create($data);

        if($request->ajax()){
            return \Response::json($courseCategory, 200);
        }

        return redirect()->route('admin.course-categories.index');
    }

    public function edit(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseCategories.edit', compact('courseCategory'));
    }

    public function update(UpdateCourseCategoryRequest $request, CourseCategory $courseCategory)
    {
        $data = $request->all();
        $data['slug'] = str_replace(" ", "-", strtolower($request->category_name));
        $courseCategory->update($data);

        return redirect()->route('admin.course-categories.index');
    }

    public function show(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategory->load('courseCategoryCourses');

        return view('admin.courseCategories.show', compact('courseCategory'));
    }

    public function destroy(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseCategoryRequest $request)
    {
        CourseCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
