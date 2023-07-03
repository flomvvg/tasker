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
        <a href="{{ route('tasklist.show', $tasklist) }}">
            <button class="btn btn-light float-right">Show Tasklist</button></a>
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
    <hr>
    <h2 class="d-inline-block">Items</h2>
    <a href="{{ route('tasklist.task.item.create', ['tasklist' => $tasklist,
        'task' => $task]) }}">
        <button class="btn btn-success float-right ml-1">New Item</button>
    </a>
    <hr>
    @foreach($items as $item)
        <div class="">
            <h5 class="d-inline-block">{{ $item->name }}</h5>
            <form action="{{ route('tasklist.task.item.destroy', [$tasklist, $task, $item]) }}"
                  method="POST" class="form-inline float-right">
                @csrf
                @method('DELETE')
                <input type="hidden" name="done" id="done" value="true">
                <button class="btn btn-danger float-right ml-1">Delete</button>
            </form>
            <a href="{{ route('tasklist.task.item.edit', [$tasklist, $task, $item]) }}">
                <button class="btn btn-primary float-right ml-1">Edit</button>
            </a>

        </div>
        <hr>
    @endforeach
</div>
