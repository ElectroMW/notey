<header>
    Notey!
    <form action="/logout" method="POST">
        @csrf
        @if(auth()->user())
            <button type="submit">Logout</button>
        @endif
    </form>
</header>
