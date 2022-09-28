<x-layout>
    <x-slot:title>
        Edit Company
    </x-slot:title>
    <form method="post" action="{{route('company.update', $company->id)}}" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal">New Company</h1>
        <x-input>
            <x-slot:label>
                Company Name
            </x-slot:label>
            <x-slot:name>
                name
            </x-slot:name>
            <x-slot:value>
                {{ $company->name }}
            </x-slot:value>
        </x-input>
        @isset($company->logo)
            <div class="form-floating">
                <img src="{{ url('images/'.$company->logo) }}" class="img-thumbnail">
            </div>
        @endisset
        <x-input>
            <x-slot:input_type>
                file
            </x-slot:input_type>
            <x-slot:label>
                Company logo
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
            <x-slot:value>
                {{ $company->field}}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Address
            </x-slot:label>
            <x-slot:name>
                address
            </x-slot:name>
            <x-slot:value>
                {{ $company->address }}
            </x-slot:value>
        </x-input>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</x-layout>
