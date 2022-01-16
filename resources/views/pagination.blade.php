@if ($jobs->lastPage() > 1)
    <div class="w-12 md:flex justify-center items-center">
        <ul class="pagination ml-auto">
            <li class="{{ ($jobs->currentPage() == 1) ? ' disabled' : '' }} page-item">
                <a class=" page-link " href="{{ $jobs->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Prethodna</span>
                </a>
            </li>
            @for ($i = 1; $i <= $jobs->lastPage(); $i++)
                <li class="{{ ($jobs->currentPage() == $i) ? ' active' : '' }} page-item">
                    <a class=" page-link " href="{{ $jobs->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($jobs->currentPage() == $jobs->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $jobs->url($jobs->currentPage()+1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Sljedeća</span>
                </a>
            </li>
        </ul>
    </div>
@endif