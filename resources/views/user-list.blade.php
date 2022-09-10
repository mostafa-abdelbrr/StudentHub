<x-list-layout>
    <x-slot:title>
        Users Data
        </x-slot>
        <x-slot:route>
            {{ route('user.create') }}
            </x-slot>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('user.edit', $user->id) }}">
                                <input type="submit" class="btn btn-primary" value="Edit"/>
                            </form>
                            <form action="{{route('user.delete', $user->id)}}" method="POST">
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
    {{ $users->links() }}
</x-list-layout>
