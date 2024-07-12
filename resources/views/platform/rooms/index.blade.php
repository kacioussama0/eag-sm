@php
    $html_tag_data = [];
    $title = 'Ajout de Salle';
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
                            <h2 class="small-title">Ajout de Branche</h2>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('rooms.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <x-c-input type="number" label="Numéro :" name="room_number" id="room_number" value="{{old('room_number')}}"/>
                                        <x-c-input type="number" label="Etage :" name="floor" id="floor" value="{{old('floor')}}"/>
                                        <x-c-input type="number" label="Capacité  :" name="capacity" id="capacity" value="{{old('capacity')}}"/>
                                        <x-c-input type="text" label="Nom de la salle :" name="name" id="name" value="{{old('name')}}"/>
                                        <x-c-select label="Type de salle :	" name="type_room_id" :options="$roomTypes" value="{{old('type_room_id')}}"/>
                                        <x-c-input type="text" label="Nom de la salle en arabe:	" name="name_ar" id="name_ar" value="{{old('name_ar')}}"/>

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
                        <h2 class="small-title">Liste des Salles</h2>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Numero Salle</th>
                                            <th>Nom</th>
                                            <th>Nome en arabe</th>
                                            <th>Etage</th>
                                            <th>Capacité</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{$room->room_number}}</td>
                                                <td>{{$room->name}}</td>
                                                <td>{{$room->name_ar}}</td>
                                                <td>{{$room->floor}}</td>
                                                <td>{{$room->capacity}}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('rooms.edit',$room->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="submit" form="delete-room-{{$room->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                    </div>

                                                    <form action="{{route('rooms.destroy',$room->id)}}" id="delete-room-{{$room->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
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
