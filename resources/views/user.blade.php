<x-layout>
    <x-slot:title>
        Edit User
        </x-slot>
        <form method="POST" action="{{route('user.update', $user->id)}}">
            @csrf
{{--            {{ Form::hidden('id', $user->id) }}--}}
            <h1 class="h3 mb-3 fw-normal">Edit user data</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="faculty" value="{{$user->faculty}}">
                <label for="floatingInput">Faculty Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="faculty_department" value="{{$user->faculty_department}}">
                <label for="floatingInput">Department</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="current_year" value="{{$user->current_year}}">
                <label for="floatingInput">Current Level (0-5)</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>
        </form>
        @if($user->email_verified_at === null)
            <form action="{{route('user.verify')}}" method="POST">
                @csrf
                {{ Form::hidden('id', $user->id) }}
                <button class="w-100 btn btn-lg btn-primary" type="submit">Verify</button>
            </form>
        @endif
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</x-layout>
