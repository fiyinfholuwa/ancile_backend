@if ($paginator->lastPage() > 1)
    <div class="row portfolio container">
        <div class="col-12 load-more">
            @if ($paginator->currentPage() > 1)
                <a class="btn" href="{{ $paginator->url($paginator->currentPage()-1) }}">Prev</a>
            @endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <a href="{{ $paginator->url($i) }}" class="page2{{ $i == $paginator->currentPage() ? ' current' : '' }}">{{ $i }}</a>
            @endfor

            @if ($paginator->currentPage() < $paginator->lastPage())
                <a class="btn" href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>
            @endif
        </div>
    </div>
    <style>
        .load-more {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #2857b3;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin: 0 4px;
        }

        .page2 {
            display: inline-block;
            padding: 8px 12px;
            background-color: #fff;
            color: #2857b3;
            text-decoration: none;
            border: 1px solid #2857b3;
            border-radius: 4px;
            margin: 0 4px;
        }

        .page2.current {
            background-color: #2857b3;
            color: #fff;
        }

        a {
            font-weight: bolder;
            font-size: 14px;
        }
    </style>
@endif
