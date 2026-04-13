{{-- Reusable Pagination Component --}}
{{-- Usage: @include('partials._pagination', ['paginator' => $flights]) --}}

@if ($paginator->hasPages())
    <nav class="pagination-wrapper" aria-label="Pagination">

        {{-- Info text --}}
        <div class="pagination-info">
            Showing <strong>{{ $paginator->firstItem() }}</strong> to <strong>{{ $paginator->lastItem() }}</strong>
            of <strong>{{ $paginator->total() }}</strong> results
        </div>

        <ul class="pagination-list">

            {{-- Previous Button --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                @if ($paginator->onFirstPage())
                    <span class="page-link page-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Previous
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link page-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Previous
                    </a>
                @endif
            </li>

            {{-- Page Numbers --}}
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                    @if ($page == $paginator->currentPage())
                        <span class="page-link">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    @endif
                </li>
            @endforeach

            {{-- Next Button --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link page-nav">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                @else
                    <span class="page-link page-nav">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                @endif
            </li>

        </ul>
    </nav>
@endif

<style>
    .pagination-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid #e2e8f0;
    }

    .pagination-info {
        font-size: 14px;
        color: #64748b;
    }

    .pagination-info strong {
        color: #1e293b;
        font-weight: 600;
    }

    .pagination-list {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .page-item .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-width: 40px;
        height: 40px;
        padding: 0 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #475569;
        background: white;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .page-item .page-link:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        color: #1e293b;
        text-decoration: none;
    }

    .page-item.active .page-link {
        background: #3b82f6;
        border-color: #3b82f6;
        color: white;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.35);
    }

    .page-item.disabled .page-link {
        background: #f8fafc;
        border-color: #e2e8f0;
        color: #cbd5e1;
        cursor: not-allowed;
        pointer-events: none;
    }

    .page-nav {
        padding: 0 16px !important;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .pagination-list {
            flex-wrap: wrap;
            justify-content: center;
        }

        .page-item .page-link {
            min-width: 36px;
            height: 36px;
            font-size: 13px;
            padding: 0 8px;
        }
    }
</style>
