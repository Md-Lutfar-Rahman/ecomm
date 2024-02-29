@extends('Admin.Layouts.admin')

    @section('title','Admin||Course');

        @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
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
                <div class="col-md-10">
                    <a class="btn btn-primary m-2" href="{{route('admin.course.create')}}" >Add new Course</a>
                    <table class="table product-table">
                        <thead class="table-light">
                            <tr>
                                <th>SL</th>
                                <th>Course Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Durations</th>
                                <th>Image</th>
                                <th>Intro Video</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course )
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->description}}</td>  
                            <td>{{$course->price}}</td> 
                            <td>{{$course->duration}}</td>
                            <td><img src="{{ asset($course->image) }}" alt="{{ $course->name }}" style="height:50px;width:50px" ></td>

                            <td>
                                <iframe width="360" height="115" src="{{$course->intro_video}}" frameborder="0" allowfullscreen></iframe>
                              
                            </td>
                            
                           <td>Edit</td>
                           <td>Delete</td>
                        </tr>
                        @endforeach
                            
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection