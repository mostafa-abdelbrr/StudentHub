<x-layout>
    <x-slot:title>
        Create Company
    </x-slot:title>
        <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal">New Company</h1>
            <x-input>
                <x-slot:label>
                    Company Name
                </x-slot:label>
                <x-slot:name>
                    name
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:input_type>
                    file
                </x-slot:input_type>
                <x-slot:label>
                    Company Logo
                </x-slot:label>
                <x-slot:name>
                    logo
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Field
                </x-slot:label>
                <x-slot:name>
                    field
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Address
                </x-slot:label>
                <x-slot:name>
                    address
                </x-slot:name>
            </x-input>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Add</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
