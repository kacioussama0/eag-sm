<table class="table table-dark table-striped">
    <thead>
    <tr>
        @foreach($thead as $value)
            <th>{{$value}}</th>
        @endforeach
    </tr>
    </thead>

    <tbody>
        @foreach($tbody as $key => $tr)

            <tr>
               @foreach($tr as $k => $td)
                   {{$k}}
               @endforeach
            </tr>

        @endforeach

{{--            <td>--}}
{{--                <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                    <a href="{{route('cycles.edit',$cycle->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>--}}
{{--                    <button type="submit" form="delete-cycle-{{$cycle->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>--}}
{{--                </div>--}}

{{--                <form action="{{route('cycles.destroy',$cycle->id)}}" id="delete-cycle-{{$cycle->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                </form>--}}
{{--            </td>--}}
        </tr>

    </tbody>
</table>
