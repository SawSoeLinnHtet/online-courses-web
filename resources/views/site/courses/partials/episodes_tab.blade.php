<div class="curriculam-cont">
    <div class="accordion" id="accordionExample">
        @if(isset($episodes) && count($episodes) !== 0)
            @foreach ($episodes as $key=>$episode)
                <div class="card">
                    <div class="card-header bg-white" id="heading{{ $key }}">
                        <div data-toggle="collapse" style="cursor: pointer" class="collapsed py-3 px-4" data-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                            <ul>
                                <li class="d-inline-block">
                                    0{{ $key + 1 }}.
                                </li>
                                <li class="d-inline-block">
                                    <span class="head">
                                        <a href="{{ route('site.courses.episodes.details', [request('course'), $episode->slug]) }}" class="d-inline text-warning pl-2" style="font-weight: bold; font-size: 20px">
                                            {{ $episode->acsr_title_limit }}
                                        </a>
                                    </span>
                                </li>
                                <li class="d-inline-block float-right pr-3"><span class="time d-none d-md-block"><i class="fa fa-clock-o "></i> <span>{{ $episode->duration }}</span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                        <div class="card-body px-3 py-3">
                            <p>
                                {!! $episode->summary !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card">
                <span class="text-info">
                    There is no episodes right now! Please comeback later.
                </span>
            </div>
        @endif
    </div>
</div>