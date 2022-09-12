<x-layout>
    <x-slot:title>
        Change Password
    </x-slot:title>
    <form action="{{route('user.update_password')}}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Change password</h1>
        <x-input>
            <x-slot:input_type>
                password
            </x-slot:input_type>
            <x-slot:label>
                Old password
            </x-slot:label>
            <x-slot:name>
                old_password
            </x-slot:name>
        </x-input>
        <x-input>
            <x-slot:input_type>
                password
            </x-slot:input_type>
            <x-slot:label>
                New password
            </x-slot:label>
            <x-slot:name>
                new_password
            </x-slot:name>
        </x-input>
        <x-input>
            <x-slot:input_type>
                password
            </x-slot:input_type>
            <x-slot:label>
                Confirm new password
            </x-slot:label>
            <x-slot:name>
                new_password_confirmation
            </x-slot:name>
        </x-input>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Change password</button>
    </form>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</x-layout>
