@extends('template')

@section('content')

<div class="container w-50 mt-5">
    <div class="card shadow-sm">
        <h3 class="text-center card-header mb-1">Edit Task</h3>

        <div class="card-body">
            <form action="{{ route('update', $task->id) }}" method="post" autocomplete="off">
                <div class="input-group">
                    @csrf
                    @method('put')
                    <input value="{{ $task->content }}" type="text" name="content" class="form-control" placeholder="Your Task" required autofocus>
                    <button type="submit" class="btn btn-outline-success btn-sm px-4"><i class="fa-solid fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="dist/app.js" type="text/javascript"></script>

@endsection