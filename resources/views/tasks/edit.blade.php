@include('base')
@include('nav')

<div class="container">
    <h1>Edit {{ $task->title }}</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
    <form action="{{ route('tasklist.task.update', ['tasklist' => $tasklist,
        'task' => $task]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}"/>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input class="form-control" type="date" name="due_date" id="due_date" value="{{ $task->due_date }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ $task->note }}"/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>
