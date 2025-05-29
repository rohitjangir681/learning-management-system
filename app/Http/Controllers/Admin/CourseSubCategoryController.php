<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSubCategoryStoreRequest;
use App\Http\Requests\Admin\CourseSubCategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseSubCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category)
    {
        $sub_categories = CourseCategory::where(['parent_id' => $course_category->id])->get();
        return view('admin.course.sub-category.index', compact('course_category', 'sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category)
    {
        return view('admin.course.sub-category.create', compact('course_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSubCategoryStoreRequest $request, CourseCategory $course_category)
    {

        $category = new CourseCategory();

        if ($request->hasFile('image')) {
            $category->image = $this->uploadFile($request->file('image'));
        }

        if ($request->hasFile('icon')) {
            $category->icon = $this->uploadFile($request->file('icon'));
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $course_category->id;
        $category->show_at_trending = $request->show_at_trending ? $request->show_at_trending : 0;
        $category->status = $request->status ? $request->status : 0;
        $category->save();

        return redirect()->route('admin.course-sub-categories.index', $course_category->id);
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
    public function edit(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        return view('admin.course.sub-category.edit', compact('course_category', 'course_sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseSubCategoryUpdateRequest $request, CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        $category = $course_sub_category;

        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);
            $category->image = $this->uploadFile($request->file('image'));
        }

        if ($request->hasFile('icon')) {
            $this->deleteFile($category->icon);
            $category->icon = $this->uploadFile($request->file('icon'));
        }

        $category->name = $request->name;
        $category->parent_id = $course_category->id;
        $category->show_at_trending = $request->show_at_trending ? $request->show_at_trending : 0;
        $category->status = $request->status ? $request->status : 0;
        $category->save();

        return redirect()->route('admin.course-sub-categories.index', $course_category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        $this->deleteFile($course_sub_category->image);
        $this->deleteFile($course_sub_category->icon);
        $course_sub_category->delete();
        return redirect()->route('admin.course-sub-categories.index', $course_category->id);
    }
}
