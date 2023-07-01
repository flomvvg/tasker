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
    <form action="{{ route('tasklist.task.item.store', [$tasklist, $task]) }}" class="" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
