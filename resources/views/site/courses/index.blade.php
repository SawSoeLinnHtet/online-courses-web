@extends('site.layouts.app')

@section('content')
    
    <section id="courses-part" class="pt-30 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showning 9 0f {{ $count }} Results</li>
                        </ul>
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="{{ $course->acsr_course_cover }}" alt="Course">
                                        </div>
                                        <div class="price">
                                            <span>
                                                ${{ floatval($course->price) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <a href="{{ route('site.courses.details', $course->id) }}">
                                            <h4>
                                                {{ $course->title }}
                                            </h4>
                                        </a>
                                        <ul class="pb-3">
                                            <p>
                                                Categories:
                                            </p>
                                            @foreach ($course->Category as $category)
                                                <li>
                                                    <span class="badge badge-primary text-white pb-1">{{ $category->title }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="course-teacher">
                                            <div class="thum">
                                                <a href="#">
                                                    <img src="{{ $course->Instructor->acsr_profile }}" alt="teacher"></a>
                                            </div>
                                            <div class="name">
                                                <a href="#">
                                                    <h6 style="text-transform: capitalize">
                                                        {{ $course->Instructor->name }}
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $courses->links('vendor.pagination.custom') }}
        </div>
    </section>

@endsection