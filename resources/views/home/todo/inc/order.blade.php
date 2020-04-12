@if ($request->order_by === $name)
    @if ($request->order === 'asc')
        <i class="fa fa-sort-asc" aria-hidden="true"/>
    @elseif ($request->order === 'desc')
        <i class="fa fa-sort-desc" aria-hidden="true"/>
    @endif
@else
    <i class="fa fa-sort" aria-hidden="true"/>
@endif
