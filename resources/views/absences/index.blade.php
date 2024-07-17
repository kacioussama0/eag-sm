@php
    $html_tag_data = [];
    $title = 'Ajout de absence';
    $description= 'Acorn elearning platform course list.';
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description,])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('js_vendor')
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/settings.general.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row g-0">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Settings</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->


            </div>
        </div>


        <!-- Title and Top Buttons End -->

            @csrf
            @method('PUT')
            <div class="row mb-n5">

                    <div class="col-xl-4">
                        <div class="mb-5">
                            <x-alert />
                            <h2 class="small-title">Ajout</h2>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('absences.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <x-c-input type="date" label="Date: " name="date" id="date" value="{{old('date')}}"/>

                                        <x-c-select label="Employé : " name="staff_id" :options="$staffs" value="{{old('staff_id')}}" />

                                        <div class="mb-3">
                                            <label for="hours">Heures</label>
                                            <select name="hours[]" id="hours" multiple class="form-select">
                                                @for($i = 8 ; $i <= 20 ; $i++)
                                                    <option value="{{$i}}">{{$i}}h00</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <x-c-input type="text" label="Motif: " name="reason" id="reason" value="{{old('reason')}}"/>
                                        <x-c-input type="file" label="Attachment : " name="justification_attachment" id="justification_attachment"/>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" @checked(old('justificated'))value="1" name="justificated" id="justificated">
                                            <label class="form-check-label" for="justificated">
                                                Justifié
                                            </label>
                                        </div>

                                        <button type="submit"  class="btn btn-outline-primary btn-icon btn-icon-start">
                                            <i data-acorn-icon="save"></i>
                                            <span>Valider</span>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                    <div class="mb-5">
                        <h2 class="small-title">Liste des absences</h2>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employé</th>
                                            <th>Date</th>
                                            <th>Heures</th>
                                            <th>Total</th>
                                            <th>Motif</th>
                                            <th>Justifié</th>
                                            <th>Attachment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($absences as $absence)
                                            <tr>
                                                <td>{{$absence->staff->first_name . ' ' . $absence->staff->last_name}}</td>
                                                <td>{{$absence->date}}</td>
                                                <td>{{implode(' h | ',unserialize($absence->hours))}} h</td>
                                                <td>{{count(unserialize($absence->hours))}} Heures</td>
                                                <td>{{$absence->reason}}</td>
                                                <td>{{$absence->justificated ? "Justifié" : "Non Justifié"}}</td>
                                                <td>
                                                    @if($absence->justification_attachment)
                                                        <a href="{{asset('storage/' . $absence->justification_attachment)}}" class="link-primary" download><i data-acorn-icon="attachment" data-acorn-size="18"></i></a>
                                                    @else
                                                        Vide
                                                    @endif

                                                </td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('absences.edit',$absence->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="submit" form="delete-absence-{{$absence->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                    </div>

                                                    <form action="{{route('absences.destroy',$absence->id)}}" id="delete-absence-{{$absence->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>
@endsection
