@php
    $html_tag_data = [];
    $title = 'Ajout de Autorisation';
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
                                    <form method="POST" action="{{route('staff-authorizations.store')}}">
                                        @csrf

                                        <x-c-select label="Employé : " name="staff_id" :options="$staffs" value="{{old('staff_id')}}" />
                                        <x-c-input type="date" label="Date: " name="start_date" id="start_date" value="{{old('start_date')}}"/>
                                        <x-c-input type="date" label="Fin : " name="end_date" id="end_date" value="{{old('end_date')}}"/>
                                        <x-c-input type="text" label="Motif : " name="reason" id="reason" value="{{old('reason')}}"/>
                                        <x-c-select label="Type : " name="type_authorization_id" :options="$authorizationsType" value="{{old('type_authorization_id')}}" />

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
                        <h2 class="small-title">Liste des autorisations</h2>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employé</th>
                                            <th>Date</th>
                                            <th>Durée</th>
                                            <th>Fin</th>
                                            <th>Type</th>
                                            <th>Motif</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($authorizations as $authorization)
                                            <tr>

                                                <td>{{$authorization->staff->full_name}}</td>
                                                <td>{{$authorization->start_date}}</td>
                                                <td>{{$authorization->duration}}</td>
                                                <td>{{$authorization->end_date}}</td>
                                                <td>{{$authorization->type->name ?? "Vide"}}</td>
                                                <td>{{$authorization->reason}}</td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('staff-authorizations.edit',$authorization->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="submit" form="delete-authorization-{{$authorization->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                    </div>

                                                    <form action="{{route('staff-authorizations.destroy',$authorization->id)}}" id="delete-authorization-{{$authorization->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
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
