@include('base')
<body>
@include('nav')

<div class="container">
    <br>
    <h1>Login</h1>
    <br>
    <form action="/login" method="POST">
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
        @csrf
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" />
        </div>
        <button class="btn btn-primary" type="submit">Login</button>
    </form>
</div>
