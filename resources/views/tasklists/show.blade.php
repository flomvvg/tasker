@include('base')
@include('nav')

<div class="container">
    <h1 class="d-inline-block">{{ $list->name }}</h1>
    <a href="/tasklist/{{ $list->id }}/edit">
        <button class="btn btn-primary float-right ml-1">Edit</button>
    </a>
    <a href="{{ route('tasklist.task.create', ['tasklist' => $list]) }}">
        <button class="btn btn-success float-right ml-1">Create Task</button>
    </a>
    <p>{{ $list->description }}</p>
    <br>
    @foreach($tasks as $task)
        @if($task->done)
            <div class="p-2 rounded" style="background-color: rgba(0, 155, 0, 0.65)">
                <a href="{{ route('tasklist.task.show', ['tasklist' => $list,
            'task' => $task]) }}"><h3 class="d-inline-block">{{ $task->title }}</h3>
                </a>
                <a href="{{ route('tasklist.task.edit', ['tasklist' => $list,
            'task' => $task]) }}">
                    <button class="btn btn-primary float-right ml-1">Edit</button>
                </a>
                <form action="{{ route('tasklist.task.done', ['tasklist' => $list,
            'task' => $task]) }}" method="POST" class="form-inline float-right">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger float-right ml-1">Reopen</button>
                </form>
                <a href="{{ route('tasklist.task.show', ['tasklist' => $list,
            'task' => $task]) }}">
                    <button class="btn btn-light float-right ml-1">View</button>
                </a>
            </div>
        @else
            <div class="p-2 rounded">
                <a href="{{ route('tasklist.task.show', ['tasklist' => $list,
            'task' => $task]) }}"><h3 class="d-inline-block">{{ $task->title }}</h3>
                </a>
                <a href="{{ route('tasklist.task.edit', ['tasklist' => $list,
            'task' => $task]) }}">
                    <button class="btn btn-primary float-right ml-1">Edit</button>
                </a>
                <form action="{{ route('tasklist.task.done', ['tasklist' => $list,
            'task' => $task]) }}" method="POST" class="form-inline float-right">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="done" id="done" value="true">
                    <button class="btn btn-success float-right ml-1">Done</button>
                </form>
                <a href="{{ route('tasklist.task.show', ['tasklist' => $list,
            'task' => $task]) }}">
                    <button class="btn btn-light float-right ml-1">View</button>
                </a>
            </div>
        @endif
        <hr>
    @endforeach
</div>
