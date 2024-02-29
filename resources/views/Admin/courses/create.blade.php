@extends('Admin.Layouts.admin')
@section('title','Course || Create')
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Course') }}</div>
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
                        <form method="POST" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course Price</label>
                                <input type="number" class="form-control" name="price">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Course Duration</label>
                                <input type="number" class="form-control" name="duration">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Starting Date</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ending Date</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Course Thumbnail</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course Intro Video</label>
                                <input type="text" class="form-control" name="intro_video_link">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
