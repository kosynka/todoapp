@extends('template')

@section('content')

<div class="container w-50 mt-5">
    <div class="card shadow-sm">
        <h3 class="text-center card-header mb-1">To Do List</h3>
        <div class="card-body">
            <form action="{{ route('store') }}" method="post" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input id="task" type="text" name="content" class="form-control" placeholder="Your Task" autofocus required>
                    <input id="deadline" type="date" name="deadline" class="form-control btn btn-outline-primary" required>
                    <button type="submit" class="btn btn-outline-success btn-sm px-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </form>

            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Deadline</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    @if (count($tasks))
                        <ul class="list-group list-group-flush mt-3">
                            @foreach ($tasks as $task)
                                <li class="list-group-item">
                                    <form action="{{ route('destroy', $task->id) }}" method="POST" class="d-inline">
                                        {{ $task->content }}
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-outline-danger btn-sm float-end px-3"><i class="fa-solid fa-trash"></i></button>
                                    </form>

                                    <form class="d-inline float-end" method="POST">
                                        @csrf
                                        @method('put')

                                        @if ($today > ($task->deadline))
                                            <span class="font-monospace text-danger">???????????????? {{ $task->deadline }}</span>                            
                                        @endif

                                        @if ($today < ($task->deadline))
                                            <span class="font-monospace text-success">?????????????? {{ $task->deadline }}</span>
                                        @endif

                                        @if ($today == ($task->deadline))
                                            <span class="font-monospace text-warning">?????????????? {{ $task->deadline }}</span> 
                                        @endif

                                        <a href="{{ route('edit', ['task' => $task->id]) }}" class="btn btn-outline-primary btn-sm px-3 me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p class="text-center mt-3">?????? ????????????</p>
                    @endif
            </table>
        </div>

        @if (count($tasks) > 4)
            <div class="card-footer">
                ?? ?????? ???????????????? {{ count($tasks) }} ??????????????
            </div>
        @endif

        @if ((count($tasks) > 0) && (count($tasks) < 5))
            <div class="card-footer">
                ?? ?????? ???????????????? {{ count($tasks) }} ??????????????
            </div>
        @endif
    </div>
</div>

@endsection