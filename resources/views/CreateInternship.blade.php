<x-layout>
    <x-slot:title>
        Create Internship
        </x-slot>
        <form method="post" action="{{route('internship.store')}}">
            @csrf
            {{--        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
            <h1 class="h3 mb-3 fw-normal">New Internship</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="name" placeholder="John Doe">
                <label for="floatingInput">Internship Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="company_name" placeholder="John Doe">
                <label for="floatingInput">Company Name</label>
            </div>
            <div class="form-floating">
                <textarea type="text" class="form-control" name="description"
                          placeholder="Enter the internship's details." style="height: 250px;"></textarea>
                {{--            <label for="floatingInput">Email address</label>--}}
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" name="expires_at">
                <label for="floatingInput">Expiration Date</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="required_faculty">
                <label for="floatingInput">Required Faculty</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="required_department">
                <label for="floatingInput">Required Department</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="minimum_year">
                <label for="floatingInput">Required Minimum Level (0-5)</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Add</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
