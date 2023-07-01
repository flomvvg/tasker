@include('base')
@include('nav')

<div class="container">
    <h1 class="d-inline-block">{{ $task->title }}</h1>
    <a href="{{ route('tasklist.task.edit', ['tasklist' => $tasklist,
        'task' => $task]) }}">
        <button class="btn btn-primary float-right ml-1">Edit</button>
    </a>
    @if($task->done)
    <form action="{{ route('tasklist.task.done', ['tasklist' => $tasklist,
            'task' => $task]) }}" method="POST" class="form-inline float-right">
        @csrf
        @method('PATCH')
        <button class="btn btn-danger float-right ml-1">Reopen</button>
    </form>
    @else
    <form action="{{ route('tasklist.task.done', ['tasklist' => $tasklist,
        'task' => $task]) }}" method="POST" class="form-inline float-right">
        @csrf
        @method('PATCH')
        <input type="hidden" name="done" id="done" value="true">
        <button class="btn btn-success float-right ml-1">Done</button>
    </form>
    @endif

    <hr>
    <p><strong>Due Date: </strong>
    @if ($task->due_date == null)
        No due date set.
    @else
            {{ \Carbon\Carbon::parse($task->due_date)->toDateString() }}
    @endif
    </p>
    <hr>
    <p><strong>Description:</strong></p>
    <p>{{ $task->description }}</p>
    <hr>
    <p><strong>Note: </strong>{{ $task->note }}</p>
</div>
