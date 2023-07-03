@include('base')
@include('nav')

<div class="container">
    <h1 class="d-inline-block">Your Tasklists</h1>
    <a href="/tasklist/create"><button class="btn btn-success float-right">New List</button></a>
    <br>
    <br>
    @foreach($lists as $list)
        <div>
            <a href="/tasklist/{{ $list->id }}">
                <h2 class="d-inline-block ">{{ $list->name }}</h2>
            </a>
            <form class="form-inline float-right" action="{{ route('tasklist.destroy', ['tasklist' => $list->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger float-right ml-1">Delete</button>
            </form>

            <a href="/tasklist/{{ $list->id }}/edit">
                <button class="btn btn-primary float-right ml-1">Edit</button>
            </a>
            <a href="/tasklist/{{ $list->id }}">
                <button class="btn btn-light float-right ">View</button>
            </a>
            <p class="">{{ $list->description }}</p>

        </div>
        <br>
    @endforeach
</div>
