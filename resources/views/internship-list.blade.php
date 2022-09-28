<x-list-layout>
    <x-slot:title>
        Internships Data
    </x-slot:title>
    <x-slot:route>
        {{--        {{ route('internship.create') }}--}}
    </x-slot:route>
    {{--    <form action="{{route('internship.list', ['filter' => 'true'])}}" method="GET">--}}
    {{--        <input type="dropdown" name="">--}}
    <table class="table">
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
                    <input type="checkbox" value="1" name="show_applicable_only"
                           @if(Auth::check()) @else disabled="true"
                           @endif @isset($applicable_checked) checked="true" @endisset>
                </label>
                <input type="submit" class="btn btn-primary" value="Filter"/>
            </td>
        </tr>
        </tbody>
    </table>
    </form>
    <table class="table">
        <tbody>
        <?php $index = 0; ?>
        <tr>
            @foreach($internships as $internship)
                <td>
                    <div class="card">
                        {{--                        <img src="..." class="card-img-top" alt="...">--}}
                        <div class="card-body">
                            <p class="card-text">
                            @if(Auth::check())
                                @if(Auth::User()->role == 'admin')
                                    <p>ID: {{ $internship->id }}</p>
                                @endif
                            @endif
                            <b>Name:</b>
                            <p>
                                {{ $internship->name }}
                            </p>
                            <b>Company Name:</b>
                            <p>{{ $internship->company_name }}</p>
                            <b>Details:</b>
                            <p>{{ $internship->description }}</p>
                            <b>Requirements:</b>
                            <p>
                                Faculty: {{$internship->required_faculty}}<br>
                                Department: {{$internship->required_department}}<br>
                                Minimum level: {{$internship->minimum_year}}<br>
                            </p>

                            @if(Auth::check())
                                @if(Auth::User()->role == 'admin')
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
                                @endif
                                <form action="{{ route('status.toggle', $internship) }}" method="POST">
                                    @csrf
                                    <input type="submit"
                                           @if(!$internship->statuses->isEmpty())
                                               @if($internship->statuses[0]->current_status == 'Started')
                                                   class="btn btn-warning"
                                           value="Mark as In progress"
                                           @elseif ($internship->statuses[0]->current_status == 'In progress')
                                               class="btn btn-danger"
                                           value="End"
                                           @elseif ($internship->statuses[0]->current_status == 'Ended')
                                               class="btn btn-success"
                                           value="Ended"
                                           disabled="true"
                                           @else
                                               class="btn btn-success"
                                           value="Start"
                                           @endif
                                           @else
                                               class="btn btn-success"
                                           value="Start"
                                        @endif
                                           @if(!($internship->minimum_year <= Auth::User()->current_year &&
                                    ($internship->required_faculty == 'Any' || $internship->required_faculty == Auth::User()->faculty) &&
                                    ($internship->required_department == 'Any' || $internship->required_department == Auth::User()->faculty_department)
                                    ))
                                               disabled="true"
                                        @endif
                                    />
                                </form>

                            @endif
                        </div>
                    </div>
                </td>
                    <?php $index++; ?>
                @if($index%3==0)
        </tr>
        <tr>
        @endif
        @endforeach
        </tbody>
    </table>
    {{ $internships->links() }}
</x-list-layout>
