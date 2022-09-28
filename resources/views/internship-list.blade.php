<x-list-layout>
    <x-slot:title>
        Internships Data
    </x-slot:title>
    <x-slot:route>
        {{ route('internship.create') }}
    </x-slot:route>
    <form method="GET">
{{--        <input type="dropdown" name="">--}}
        <table class="table" action="{{route('internship.list', ['filter' => 'true'])}}" method="GET">
            <thead>
            <tr>
                <th>Filters</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label>
                        Show Applicable only
                        <input type="checkbox" value="1" name="show_applicable_only" @if(Auth::check()) @else disabled="true" @endif @isset($applicable_checked) checked="true" @endisset>
                    </label>
                    <input type="submit" class="btn btn-primary" value="Filter"/>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($internships as $internship)
            <tr>
                <td>{{ $internship->id }}</td>
                <td>{{ $internship->name }}</td>
                <td>{{ $internship->description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{route('internship.edit', $internship->id)}}">
                            <input type="submit" class="btn btn-primary" value="Edit"/>
                        </form>
                        <form action="{{route('internship.delete', $internship->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $internships->links() }}
</x-list-layout>
