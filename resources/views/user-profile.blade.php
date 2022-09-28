<x-layout>
    <x-slot:title>
        User Profile
    </x-slot:title>
    <h1 class="h3 mb-3 fw-normal">{{$user->name}}'s Profile</h1>
    @isset($user->image)
        <div class="form-floating">
            <img src="{{ url('images/'.$user->image) }}" class="img-thumbnail">
        </div>
    @endisset
    <x-input>
        <x-slot:input_disabled>
            true
        </x-slot:input_disabled>
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
        <x-slot:input_disabled>
            true
        </x-slot:input_disabled>
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
        <x-slot:input_disabled>
            true
        </x-slot:input_disabled>
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
        <x-slot:input_disabled>
            true
        </x-slot:input_disabled>
        <x-slot:label>
            Department
        </x-slot:label>
        <x-slot:name>
            faculty_department
        </x-slot:name>
        <x-slot:value>
            {{ $user->faculty_department }}
        </x-slot:value>
    </x-input>
    <x-input>
        <x-slot:input_disabled>
            true
        </x-slot:input_disabled>
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
    <div class="form-check">
        <label class="form-check-label" for="email_checkbox">
            Subscribe to emails:
            <input class="form-check-input" type="checkbox" value="1" name="email_subscription" id="email_checkbox"
                   @if($user->email_subscription == '1') checked="true" @endif disabled="true">
        </label>
    </div>
    <form action="{{route('user.edit_profile')}}" method="GET">
        @csrf
        <button class="w-100 btn btn-lg btn-primary" type="submit">Go to profile edit</button>
    </form>
    <form action="{{route('user.edit_password')}}" method="GET">
        @csrf
        <button class="w-100 btn btn-lg btn-primary" type="submit">Go to Change password</button>
    </form>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</x-layout>
