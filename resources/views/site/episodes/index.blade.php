@extends('site.layouts.app')

@section('content')

    <section id="courses-part" class="pt-30 pb-120 gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 p-3">
                    <div>
                        <a href="{{ route('site.courses.details', request('course')) }}" class="d-flex align-items-center btn btn-sm btn-link ">
                           <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>
                            Course Overview
                        </a>
                        <div class="d-flex align-items-center mb-3 pt-3">
                            <div class="p-2 bg-dark rounded" style="width: 90px; height: 90px">
                                <img src="{{ asset('site/images/all-icon/book.png') }}" alt="" width="100%" height="100%">
                            </div>
                            <div class="pl-3">
                                <h4>
                                    Laravel Zero To Hero
                                </h4>
                                <span style="font-size: 15px">
                                    <span>12 Episodes</span>
                                    <span class="ml-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        1hr 30min
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <ul class="episode-lists">
                        @foreach ($episodes as $episode)
                            <li class="episode-wrap py-2 mb-3">
                                <a href="{{ route('site.courses.episodes.details', [request('course'), $episode['id']]) }}" class="d-flex episode-link {{ $episode['id'] == $current_episode->id ? 'active' : ''}}">
                                    <div style="width: 50px; height: 50px" class="px-1">
                                        <img src="{{ asset('images/episodes/image/'.$episode['image']) }}" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="text-warning text-dark">
                                            {{ $episode['title'] }}
                                        </h5>
                                        <span style="font-size: 15px" class="mt-2 text-secondary">
                                            <span>Episode 1</span>
                                            <span class="ml-3">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                1hr 30min
                                            </span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-8">
                    <video width="100%" height="500px" controls="controls">
                        <source src="{{ asset('videos/episodes/'.$current_episode->video) }}"/>
                    </video>
                    <div class="py-3">
                        <h5 class="mb-2">
                            Summary
                        </h5>
                        <p>
                            {!! $current_episode->summary !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection