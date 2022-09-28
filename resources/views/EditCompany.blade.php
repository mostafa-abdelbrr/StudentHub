<x-layout>
    <x-slot:title>
        Edit Company
        </x-slot>
        <form method="post" action="{{route('company.update', $company->id)}}">
            @csrf
{{--            {{ Form::hidden('id', $company->id) }}--}}
            {{--        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
            <h1 class="h3 mb-3 fw-normal">New Company</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="name" value="{{$company->name}}">
                <label for="floatingInput">Company Name</label>
            </div>
            <div class="form-floating">
                <img src="{{ url('images/'.$company->logo) }}" class="img-thumbnail">
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="field" value="{{$company->field}}">
                <label for="floatingInput">Field</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="address" value="{{$company->address}}">
                <label for="floatingInput">Address</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
</x-layout>
