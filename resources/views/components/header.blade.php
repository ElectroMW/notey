<header class="d-flex justify-content-between border-bottom bg-light">
    <div class="align-self-center p-3">
        Notey!
    </div>
    @if(auth()->user())
        <div class="">
            <form action="/logout" method="POST" class="form-inline mb-0 mt-2 mr-2">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    @endif
</header>
