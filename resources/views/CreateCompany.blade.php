<x-layout>
    <x-slot:title>
        Create Company
        </x-slot>
        <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal">New Company</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="name" placeholder="">
                <label for="floatingInput">Company Name</label>
            </div>
            <div class="form-floating">
                <input type="file" class="form-control" name="logo" placeholder="">
                <label for="floatingInput">Company Logo</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="field" placeholder="">
                <label for="floatingInput">Field</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="address" placeholder="">
                <label for="floatingInput">Address</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Add</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
