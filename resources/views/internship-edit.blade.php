<x-layout>
    <x-slot:title>
        Edit Internship
    </x-slot:title>
    <form method="post" action="{{route('internship.update', $internship->id)}}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Edit Internship</h1>
        <x-input>
            <x-slot:label>
                Name
            </x-slot:label>
            <x-slot:name>
                name
            </x-slot:name>
            <x-slot:value>
                {{$internship->name}}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Company Name
            </x-slot:label>
            <x-slot:name>
                company_name
            </x-slot:name>
            <x-slot:value>
                {{$internship->company_name}}
            </x-slot:value>
        </x-input>
        <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                          placeholder="Enter the internship's details."
                          style="height: 250px;">
                    {{ old('description', $internship->description) }}
                </textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <x-input>
            <x-slot:type>
                datetime-local
            </x-slot:type>
            <x-slot:label>
                Expiration Date
            </x-slot:label>
            <x-slot:name>
                expires_at
            </x-slot:name>
            <x-slot:value>
                {{$internship->expires_at}}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Required Faculty
            </x-slot:label>
            <x-slot:name>
                required_faculty
            </x-slot:name>
            <x-slot:value>
                {{$internship->required_faculty}}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Required Department
            </x-slot:label>
            <x-slot:name>
                required_department
            </x-slot:name>
            <x-slot:value>
                {{$internship->required_department}}
            </x-slot:value>
        </x-input>
        <x-input>
            <x-slot:label>
                Required Minimum Level (0-5)
            </x-slot:label>
            <x-slot:name>
                minimum_year
            </x-slot:name>
            <x-slot:value>
                {{$internship->minimum_year}}
            </x-slot:value>
        </x-input>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Edit details</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</x-layout>
