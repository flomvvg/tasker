@include('base')
<body>
@include('nav')

<div class="container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
    <br>
    <h1>{{ $user->username }}</h1>
    <br>
    <p>Username: {{ $user->username }}</p>
    <p>E-Mail Address: {{ $user->email }}</p>
    <p>Joined at: {{ $user->created_at }}</p>
</div>
