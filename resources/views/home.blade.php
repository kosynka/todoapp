@extends('template')

@section('content')

<div class="container w-50 mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center">To Do List</h3>
            <form action="{{ route('store') }}" method="post" autocomplete="off">
                <div class="input-group">
                    @csrf
                    <input id="task" type="text" name="content" class="form-control" placeholder="Your Task" autofocus>
                    <button type="submit" class="btn btn-outline-success btn-sm px-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </form>

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
                        <form action="{{ route('update', $task->id) }}" method="PUT" class="d-inline">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-outline-primary btn-sm float-end px-3 me-1"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>

                    </li>
                @endforeach
            </ul>
            @else
                <p class="text-center mt-3">Нет тасков</p>
            @endif
        </div>
        @if (count($tasks) > 4)
            <div class="card-footer">
                У Вас осталось {{ count($tasks) }} заданий
            </div>
        @endif
        @if ((count($tasks) > 0) && (count($tasks) < 5))
            <div class="card-footer">
                У Вас осталось {{ count($tasks) }} задания
            </div>
        @endif
    </div>
</div>

@endsection