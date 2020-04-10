
@extends('layouts.index')

@section('content')

    <a href="/todo/add" class="btn btn-primary mb-3">Add Todo</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" onclick="window.orderTodo('user_name')">Name </th>
            <th scope="col" onclick="window.orderTodo('user_email')">Email</th>
            <th scope="col" onclick="window.orderTodo('text')">Text</th>
            <th scope="col" onclick="window.orderTodo('ready')">Ready</th>
            <th scope="col">Edited</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $todo)
        <tr>
            <td>{{ $todo->user_name }}</td>
            <td>{{ $todo->user_email }}</td>
            <td>{{ $todo->text }}</td>
            <td>{{ $todo->ready ? 'yes' : 'no' }}</td>
            <td>{{ $todo->updated_by_admin ? 'yes' : 'no' }}</td>
            <td>
                @if($auth->role === 'admin')
                    <a href="/todo/edit?id={{ $todo->id }}" class="btn btn-info btn-sm">edit</a>
                    <a href="/todo/ready?id={{ $todo->id }}" class="btn btn-info btn-sm ml-2">ready</a>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @include('pagination.index', [
        'page' => $request->page,
        'paginator' => $list,
        'append' => "&order_by={$request->order_by}&order={$request->order}"
    ])

    @if ($success['add'])
        <div class="alert alert-info mt-3" role="alert">
            Data has been added!
        </div>
    @endif
    @if ($success['edit'])
        <div class="alert alert-info mt-3" role="alert">
            Data has been updated!
        </div>
    @endif

@endsection

@push('script')
<script type="text/javascript">
    const request = {!! json_encode($request->only('order', 'order_by', 'page')) !!}
    function orderTodo(orderBy)
    {
        let order = 'asc';
        if (orderBy === request.order_by) {
            order = request.order === 'asc' ? 'desc' : 'asc';
        }

        window.location = '/?page=' + request.page + '&order_by=' + orderBy + '&order=' + order;
    }
</script>
@endpush


