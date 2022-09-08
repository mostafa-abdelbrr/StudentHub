<x-list-layout>
    <x-slot:title>
        Companies Data
        </x-slot>
    <x-slot:route>
        {{ route('company.create') }}
        </x-slot>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Field</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->field }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('company.edit', $company->id) }}">
                                <input type="submit" class="btn btn-primary" value="Edit" />
                            </form>
                            <form action="{{ route('company.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
{{--                                {{ Form::hidden('id', $company->id) }}--}}
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $companies->links() }}

</x-list-layout>
