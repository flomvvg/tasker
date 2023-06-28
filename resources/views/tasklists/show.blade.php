@include('base')
@include('nav')

<div class="container">
    <h1 class="d-inline-block ">{{ $list->name }}</h1>
    <a href="/tasklist/{{ $list->id }}/edit">
        <button class="btn btn-primary float-right ml-1">Edit</button>
    </a>
    <p>{{ $list->description }}</p>
</div>
