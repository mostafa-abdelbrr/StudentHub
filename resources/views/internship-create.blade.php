<x-layout>
    <x-slot:title>
        Create Internship
        </x-slot:title>
        <form method="post" action="{{route('internship.store')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">New Internship</h1>
            <x-input>
                <x-slot:label>
                    Internship Name
                </x-slot:label>
                <x-slot:name>
                    name
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Company Name
                </x-slot:label>
                <x-slot:name>
                    company_name
                </x-slot:name>
            </x-input>
            <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                          placeholder="Enter the internship's details." style="height: 250px;">{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <x-input>
                <x-slot:input_type>
                    datetime-local
                </x-slot:input_type>
                <x-slot:label>
                    Expiration Date
                </x-slot:label>
                <x-slot:name>
                    expires_at
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Required Faculty
                </x-slot:label>
                <x-slot:name>
                    required_faculty
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Required Department
                </x-slot:label>
                <x-slot:name>
                    required_department
                </x-slot:name>
            </x-input>
            <x-input>
                <x-slot:label>
                    Required Minimum Level (0-5)
                </x-slot:label>
                <x-slot:name>
                    minimum_level
                </x-slot:name>
            </x-input>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Add</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
