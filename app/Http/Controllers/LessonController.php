<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $lessons = Lesson::all();
       return  view('Admin.Lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('Admin.Lessons.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validate the incoming request data
       $request->validate([
        'course_name'=>'required|string|max:255',
        'name' => 'required|string|max:255',
        'details' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
       
        'lesson_video_link' => 'required|string',
    ]);

    try {
        // Handle file uploads


         // Store the files using the public disk
         $imagePath = $request->file('image')->store('public/images');
        



         // Get the filenames from the stored paths
         $imageFilename = basename($imagePath);
       

        
        // Construct the full public storage file paths
        $imagePublicPath = 'storage/images/' . $imageFilename;
      


        // Create new course instance
        $lesson = new Lesson();
        $lesson->name = $request->name;
        $lesson->course_name = $request->course_name;
        $lesson->details = $request->details;
        $lesson->image = $imagePublicPath;
       // $course->intro_video = $request->intro_video_link;
        $lesson->video_link = 'https://www.youtube.com/embed/'.$request->lesson_video_link;

        // Save the course to the database
        $lesson->save();

        // Redirect to a success page or return a response
        return redirect()->route('admin.lesson')->with('success', 'Course created successfully');
    } catch (\Exception $e) {
        // If an error occurs during course creation, delete uploaded files
        Storage::delete([$imagePath]);
        
        // Redirect back with error message
        return redirect()->back()->with('error', 'Failed to create course: ' . $e->getMessage());
    }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
