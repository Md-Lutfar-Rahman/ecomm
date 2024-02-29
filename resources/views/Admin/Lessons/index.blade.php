@extends('Admin.Layouts.admin')
@section('title','Admin||Lessons')
@section('content')
<div class="col-md-10">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a class="btn btn-primary m-2" href="{{route('admin.lesson.create')}}" >Add new Lesson</a>
    <table class="table product-table">
        <thead class="table-light">
            <tr>
                <th>SL</th>
                <th>Course Name</th>
                <th>Lesson Name</th>
                <th>Image</th>
                <th>Video</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($lessons as $lesson )
               <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$lesson->course_name}}</td>
                <td>{{$lesson->name}}</td>
                <td><img src="{{asset($lesson->image)}}" alt="{{$lesson->name}}" style="height:60px;width:60px"></td>
                <td>
                    <iframe src="{{$lesson->video_link}}" frameborder="0" style="height:60px;width:120px"></iframe>
                </td>
                    <td>
                        Edit
                    </td>
                    <td>
                        Delete
                    </td>
               </tr>
           @endforeach
            
          
        </tbody>
    </table>
</div>
@endsection