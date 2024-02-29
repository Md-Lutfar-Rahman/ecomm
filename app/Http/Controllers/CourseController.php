<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
   // for Course related operations
   function courses ()
    {
        $courses = Course::all();
        return  view('Admin.courses.index',compact('courses'));
    }

    function create (){
        return view('Admin.courses.create');
    }

    function store(Request $request){
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
            //'intro_video' => 'required|string',
            'intro_video_link' => 'required|string',
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
            $course = new Course();
            $course->name = $request->name;
            $course->description = $request->description;
            $course->price = $request->price;
            $course->duration = $request->duration;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->image = $imagePublicPath;
           // $course->intro_video = $request->intro_video_link;
            $course->intro_video = 'https://www.youtube.com/embed/'.$request->intro_video_link;
    
            // Save the course to the database
            $course->save();
    
            // Redirect to a success page or return a response
            return redirect()->route('admin.course')->with('success', 'Course created successfully');
        } catch (\Exception $e) {
            // If an error occurs during course creation, delete uploaded files
            Storage::delete([$imagePath]);
            
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to create course: ' . $e->getMessage());
        }
    }


}
