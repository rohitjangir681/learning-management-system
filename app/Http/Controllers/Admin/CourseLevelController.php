<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course_levels = CourseLevel::all();
        return view('admin.course.level.index', compact('course_levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:course_levels,name'],
            'slug' => ['required', 'unique:course_levels,slug']
        ]);

        $data = new CourseLevel();
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->save();

        return redirect()
        ->route('admin.course-levels.index')
        ->with('success', 'Course Level created successfully');
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
    public function edit(CourseLevel $course_level)
    {
        return view('admin.course.level.edit', compact('course_level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseLevel $course_level)
    {
        $request->validate([
            'name' => ['required', Rule::unique('course_levels', 'name')->ignore($course_level->id, 'id')],
        ]);

        $course_level->name = $request->name;
        $course_level->save();
        return redirect()->route('admin.course-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLevel $course_level)
    {
        $course_level->delete();
        return redirect()->route('admin.course-levels.index');
    }
}
