<table class="table table-dark table-striped align-middle text-center">

    <thead>
        <tr>

            @foreach($head as $value)
               <th>{{$value}}</th>
            @endforeach

            @if($hasAction)
                <th>Actions</th>
            @endif

        </tr>
    </thead>

    <tbody>
       @foreach($body as $row)
           <tr>
               @foreach($keys as $key)

                   <td>{{$row[$key]}}</td>
{{--                   @if($loop ->last and $hasAction)--}}
{{--                       <td>--}}
{{--                           <div class="btn-group" role="group" aria-label="">--}}
{{--                               <a href="{{$edit}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>--}}
{{--                               <button type="submit" form="delete-{{strtolower($title)}}-{{$row['id']}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>--}}
{{--                           </div>--}}

{{--                           <form action="" id="delete-{{strtolower($title)}}-{{$row['id']}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">--}}
{{--                               @csrf--}}
{{--                               @method('DELETE')--}}
{{--                           </form>--}}
{{--                       </td>--}}
{{--                   @endif--}}
               @endforeach
           </tr>
       @endforeach
    </tbody>

</table>
