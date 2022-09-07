<x-list-layout>
    <x-slot:title>
        Internships Data
        </x-slot>
        <x-slot:route>
            {{ route('internship.create') }}
            </x-slot>
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
                            <form action="{{route('internship.delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{ Form::hidden('id', $internship->id) }}
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
