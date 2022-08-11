@extends('template')

@section('content')

<div class="container w-50 mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center">To Do List</h3>
            <form action="{{ route('store') }}" method="post" autocomplete="off">
                <div class="input-group">
                    @csrf
                    <input type="text" name="content" class="form-control" placeholder="Your Task">
                    <button type="submit" class="btn btn-outline-success btn-sm px-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
            </form>
            {{-- INSERT INTO `to_do_lists`(`task`) VALUES ('aaa'), ('bbb'), ('ccc'), ('ddd'); --}}

            @if (count($todolists))
            <ul class="list-group list-group-flush mt-3">
                @foreach ($todolists as $todolist)

                    {{-- UPDATE --}}

                    {{-- <li class="list-group-item">
                        <form action="{{ route('update', $todolist->id) }}" method="PUT">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-outline-primary btn-sm px-4 float-end"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                    </li> --}}

                    <li class="list-group-item">
                        <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                            {{ $todolist->task }}
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm px-4 float-end"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @else
                <p class="text-center mt-3">Нет тасков</p>
            @endif
        </div>
        @if (count($todolists) > 4)
            <div class="card-footer">
                У Вас осталось {{ count($todolists) }} заданий
            </div>
        @endif
        @if ((count($todolists) > 0) && (count($todolists) < 5))
            <div class="card-footer">
                У Вас осталось {{ count($todolists) }} задания
            </div>
        @endif
    </div>
</div>

@endsection