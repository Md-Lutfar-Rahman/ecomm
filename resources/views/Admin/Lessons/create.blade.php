@extends('Admin.Layouts.admin')

@section('title','Admin|| Lesson Create')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Lesson') }}</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lesson.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Course Name</label>
                            <select name="course_name" id="">
                                <option value="1" selected=1 disabled=1>Select Any Course for this Lesson</option>
                               @foreach ($courses as $course )
                                   <option value="{{$course->name}}">{{$course->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Name</label>
                            <input name="name" id="" cols="30" rows="5" class="form-control">
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Details</label>
                            <textarea class="form-control" name="details"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lession Thumbnail Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        

                        <div class="mb-3">
                            <label class="form-label">Course Intro Video</label>
                            <input type="text" class="form-control" name="lesson_video_link">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection