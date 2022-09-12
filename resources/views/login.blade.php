<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    <x-slot:hide_navbar>
        true
    </x-slot:hide_navbar>
    <form method="post" action="{{route('user.auth')}}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <form method="GET" action="{{route('user.create')}}">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</x-layout>
