<?php
$link_limit = 4; // maximum number of links (a little bit inaccurate, but will be ok for now)
$query_string = \Request::except(['page','request_list_scope']);
$query_string = http_build_query($query_string,'','&');
?>
@if ($paginator->hasPages())
<div>
    <ul class="pagination">
        @if ($paginator->currentPage() != 2 && !$paginator->onFirstPage())
        <li class="page-item ">
            <a class="page-link" href="{{ \Request::url() .'?'. $query_string }}" tabindex="-1">Trang đầu</a>
        </li>
        @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>
                    @if ($from < $i && $i < $to)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) .'&'. $query_string }}">{{$i}}</a></li>
                    @endif
            @endfor



        @if ($paginator->hasMorePages() && $paginator->currentPage() + 1 != $paginator->lastPage())

        <li class="page-item">
        <a class="page-link" href="{{ \Request::url().'?'.$query_string.'&page='.$paginator->lastPage() }}">Trang cuối</a>
        </li>
        @endif
    </ul>
</div>
@endif
