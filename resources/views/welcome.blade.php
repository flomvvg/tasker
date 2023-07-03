@include('base')
@include('nav')
<div class="container">
    <h1 class="d-inline-block">Tasker</h1><p class="d-inline"><i>never forget anything</i></p>
    @if(Auth::check())
        <p>Welcome {{ Auth::user()->username }}.</p>
    @else
        <p>Welcome. Please log in to use Tasker</p>
    @endif
</div>
    </body>
</html>
