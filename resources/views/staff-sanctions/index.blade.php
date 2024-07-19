@php
    $html_tag_data = [];
    $title = 'Ajout de Sanction';
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
                            <form method="POST" action="{{route('staff-sanctions.store')}}">
                                @csrf

                                <x-c-select label="Employé : " name="staff_id" :options="$staffs" value="{{old('staff_id')}}" />
                                <x-c-input type="date" label="Date: " name="date" id="date" value="{{old('date')}}"/>
                                <x-c-input type="text" label="Motif : " name="reason" id="reason" value="{{old('reason')}}"/>
                                <x-c-select label="Type : " name="type_sanction_id" :options="$sanctionsType" value="{{old('type_sanction_id ')}}" />
                                <x-c-input type="text" label="Description : " name="description" id="description" value="{{old('description')}}"/>
                                <x-c-input type="text" label="Décision : " name="decision" id="decision" value="{{old('decision')}}"/>

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
                    <h2 class="small-title">Liste des Sanctions</h2>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                <tr>
                                    <th>Employé</th>
                                    <th>Date</th>
                                    <th>Motif</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Décision</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sanctions as $sanction)
                                    <tr>

                                        <td>{{$sanction->staff->full_name}}</td>
                                        <td>{{$sanction->date}}</td>
                                        <td>{{$sanction->reason}}</td>
                                        <td>{{$sanction->type->name}}</td>
                                        <td>{{$sanction->description}}</td>
                                        <td>{{$sanction->decision}}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{route('staff-sanctions.edit',$sanction->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                <button type="submit" form="delete-sanction-{{$sanction->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </div>

                                            <form action="{{route('staff-sanctions.destroy',$sanction->id)}}" id="delete-sanction-{{$sanction->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
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
