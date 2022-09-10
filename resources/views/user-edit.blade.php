<x-layout>
    <x-slot:title>
        Edit User
    </x-slot:title>
    <form method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Edit user data</h1>
        <x-input>
            <x-slot:input_type>
                file
            </x-slot:input_type>
            <x-slot:label>
                Profile Picture
            </x-slot:label>
            <x-slot:name>
                image
            </x-slot:name>
        </x-input>
        @isset($user->image)
        <div class="form-floating">
            <img src="{{ url('images/'.$user->image) }}" class="img-thumbnail">
        </div>
        @endisset
        <x-input>
            <x-slot:label>
                Name
            </x-slot:label>
            <x-slot:name>
                name
            </x-slot:name>
            <x-slot:value>
                {{ $user->name }}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:input_type>
                email
            </x-slot:input_type>
            <x-slot:label>
                Email
            </x-slot:label>
            <x-slot:name>
                email
            </x-slot:name>
            <x-slot:value>
                {{ $user->email }}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:input_type>
                password
            </x-slot:input_type>
            <x-slot:label>
                Password
            </x-slot:label>
            <x-slot:name>
                password
            </x-slot:name>
        </x-input>
        <x-input>
            <x-slot:label>
                Faculty Name
            </x-slot:label>
            <x-slot:name>
                faculty
            </x-slot:name>
            <x-slot:value>
                {{ $user->faculty }}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Department
            </x-slot:label>
            <x-slot:name>
                department
            </x-slot:name>
            <x-slot:value>
                {{ $user->department }}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Current Level (0-9)
            </x-slot:label>
            <x-slot:name>
                current_year
            </x-slot:name>
            <x-slot:value>
                {{ $user->current_year }}
            </x-slot:value>
        </x-input>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>
    </form>
    @if($user->email_verified_at === null)
        <form action="{{route('user.verify', $user->id)}}" method="POST">
            @csrf
            <button class="w-100 btn btn-lg btn-primary" type="submit">Verify</button>
        </form>
    @endif
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</x-layout>
