@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="nav navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
        <a class="navbar-brand" href="#">Tasker</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/tasklists" class="nav-link">Task lists</a>
            </li>
        </ul>
        @if(Auth::guest())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/login" class="nav-link ">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/users/create" class="nav-link ">Register</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        @endif
    </div>
</nav>
