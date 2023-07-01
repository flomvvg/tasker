@include('base')
<body>
@include('nav')
</body>
<div class="container">
    <br>
    <h1>Create Task</h1>
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
    <form action="{{ route('tasklist.task.store', ['tasklist' => $tasklist]) }}" class="" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"/>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input class="form-control" type="date" name="due_date" id="due_date" value="{{ old('due_date') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ old('note') }}"/>
        </div>

        <input type="hidden" name="tasklist_id" id="tasklist_id" value="{{ $tasklist->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
