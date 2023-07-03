@include('base')
@include('nav')
<div class="container">
    <br>
    <h1>Create Tasklist</h1>
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
    <form action="{{ route('tasklist.task.item.update', [$tasklist, $task, $item]) }}" class="" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
