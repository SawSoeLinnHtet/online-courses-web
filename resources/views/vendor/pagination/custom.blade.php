@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12">
            <nav class="courses-pagination mt-50">
                <ul class="pagination justify-content-center">
                    @if ($paginator->onFirstPage())
                        <li class="page-item" class="disable">
                            <a href="javascript:void(0)">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $paginator->previousPageUrl() }}">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif
        
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item"><a class="active" href="javascript:void(0)">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="javascript:void(0)" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif