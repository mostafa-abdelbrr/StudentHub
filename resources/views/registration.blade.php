<x-layout>
    <x-slot:title>
        Registration
    </x-slot:title>
    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
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
        <x-input>
            <x-slot:label>
                Name
            </x-slot:label>
            <x-slot:name>
                name
            </x-slot:name>
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
        </x-input>
        <x-input>
            <x-slot:label>
                Department
            </x-slot:label>
            <x-slot:name>
                faculty_department
            </x-slot:name>
        </x-input>
        <x-input>
            <x-slot:label>
                Current Level (0-5)
            </x-slot:label>
            <x-slot:name>
                current_year
            </x-slot:name>
        </x-input>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</x-layout>
{{--</main>--}}

{{--</body>--}}
{{--</html>--}}
