<x-layout>
    <x-slot:title>
        Edit Internship
        </x-slot>
        <form method="post" action="{{route('internship.update', $it->id)}}">
            @csrf
            {{--        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
{{--            {{Form::hidden('id', $it->id)}}--}}
            <h1 class="h3 mb-3 fw-normal">Edit Internship</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="company_name" value="{{$it->company_name}}">
                <label for="floatingInput">Company Name</label>
            </div>
            <div class="form-floating">
                <textarea type="text" class="form-control" name="description"
                          placeholder="Enter the internship's details."
                          style="height: 250px;">{{$it->description}}</textarea>
                {{--            <label for="floatingInput">Email address</label>--}}
            </div>
            <div class="form-floating">
                <input type="datetime-local" class="form-control" name="expires_at" value="{{$it->expires_at}}">
                <label for="floatingInput">Expiration Date</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="required_faculty" value="{{$it->required_faculty}}">
                <label for="floatingInput">Required Faculty</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="required_department" value="{{$it->required_department}}">
                <label for="floatingInput">Required Department</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="minimum_year" value="{{$it->minimum_year}}">
                <label for="floatingInput">Required Minimum Level (0-5)</label>
            </div>

            {{--        <div class="checkbox mb-3">--}}
            {{--            <label>--}}
            {{--                <input type="checkbox" value="remember-me"> Remember me--}}
            {{--            </label>--}}
            {{--        </div>--}}
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Edit details</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
