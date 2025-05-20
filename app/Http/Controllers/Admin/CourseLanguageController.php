<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CourseLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CourseLanguage $course_language)
    {
        $course_languages = CourseLanguage::all();
        return view('admin.course.language.index', compact('course_languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:course_languages,name'],
            'slug' => ['required', 'unique:course_languages,slug']
        ]);

        $data = new CourseLanguage();
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->save();

        return redirect()
        ->route('admin.course-language.index')
        ->with('success', 'Course Language created successfully');
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
    public function edit(CourseLanguage $course_language)
    {
        return view('admin.course.language.edit', compact('course_language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseLanguage $course_language)
    {
        $request->validate([
            'name' => ['required', Rule::unique('course_languages', 'name')->ignore($course_language->id, 'id')],
        ]);

        $course_language->name = $request->name;
        $course_language->save();
        return redirect()->route('admin.course-language.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLanguage $course_language)
    {
        $course_language->delete();
        return redirect()->route('admin.course-language.index');
    }
}
