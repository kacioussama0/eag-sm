<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>GSM</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($tutors as $tutor)
            <tr>

                <td>{{$tutor->first_name}}</td>
                <td>{{$tutor->last_name}}</td>
                <td>{{$tutor->phone}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <livewire:tutors.delete :tutorId="$tutor->id" />
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
