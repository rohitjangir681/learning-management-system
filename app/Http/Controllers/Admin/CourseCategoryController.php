<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategoryStoreRequest;
use App\Http\Requests\Admin\CourseCategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CourseCategoryController extends Controller
{

    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::whereNull('parent_id')->get();
        return view('admin.course.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryStoreRequest $request)
    {
        $image_path = $request->hasFile('image') ? $this->uploadFile($request->file('image')) : null;
        $icon_path = $request->hasFile('icon') ? $this->uploadFile($request->file('icon')) : null;
        $category = new CourseCategory();
        $category->image = $image_path;
        $category->icon = $icon_path;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_trending = $request->show_at_trending ? $request->show_at_trending : 0;
        $category->status = $request->status ? $request->status : 0;
        $category->save();

        return redirect()->route('admin.course-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category)
    {
        return view('admin.course.category.edit', compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryUpdateRequest $request, CourseCategory $course_category)
    {
        $course_category->name = $request->name;
        $course_category->show_at_trending = $request->show_at_trending ? $request->show_at_trending : 0;
        $course_category->status = $request->status ? $request->status : 0;
        if ($request->hasFile('image')) {
            $this->deleteFile($course_category->image);
            $course_category->image = $this->uploadFile($request->file('image'));
        }
        if ($request->hasFile('icon')) {
            $this->deleteFile($course_category->icon);
            $course_category->icon = $this->uploadFile($request->file('icon'));
        }
        $course_category->save();

        return redirect()->route('admin.course-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category)
    {
        if ($course_category->image) {
            $this->deleteFile($course_category->image);
        }
        if ($course_category->icon) {
            $this->deleteFile($course_category->icon);
        }
        $course_category->delete();
        return redirect()->route('admin.course-categories.index');
    }
}
