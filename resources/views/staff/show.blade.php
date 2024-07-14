@php
    $html_tag_data = [];
    $title = 'Ecole';
    $description= 'Acorn elearning platform course list.';

    $schoolDetails = [
        'Nom' => $school->name,
        'Nom abrégé' => $school->name_abbr,
        'Telephone' => $school->phone,
        'Telephone 2' => $school->phone_alt,
        'Fax' => $school->fax,
        'Responsable' => $school->manager,
        'Gsm Responsable' => $school->manager_phone,
        'Email' => $school->email,
        'Site web' => $school->site_url,
        'Numéro CNSS' => $school->nssf_number,
        'Numéro RC' => $school->cr_number,
        'Compte Bancaire' => $school->bank_account,
        'Banque' => $school->bank_name,
        'Agence' => $school->bank_agency,
        'Longitude' => $school->longitude,
        'Latitude' => $school->latitude,
        'Informations Légales' => $school->legal_informations,
        'Numéro autorisation' => $school->authorization_number,
        'Date autorisation' => $school->authorization_date,
        'Adresse de l\'école' => $school->address,
        'Code Postal' => $school->postal_code,
        'Ville' => $school->state,
        'Pays' => $school->country,
        'Délégation' => $school->delegation,
        'Academie' => $school->academy,
    ];

    $schoolDetailsArabic = [
        'Nom' => $school->name_ar,
        'Adresse de l\'école' => $school->address_ar,
        'Délégation' => $school->delegation_ar,
        'Responsable' => $school->manager_ar,
        'Informations Légales' => $school->legal_informations_ar,
    ];

@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description,])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

@endsection

@section('js_vendor')
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/settings.general.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        let map = L.map('map').setView([{{$school->latitude}},{{$school->longitude}}], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup('Your Location')
            .openPopup();

    </script>
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

        <x-alert />

        <!-- Title and Top Buttons End -->

            <div class="row mb-n5">
                    <div class="col-xl-4">
                        <div class="mb-5">
                            <h2 class="small-title">Modification école</h2>
                            <div class="card">
                                <div class="card-body">

                                   <ul class="list-unstyled">

                                        @foreach($schoolDetails as $key => $detail)
                                            <li>
                                                <b>{{$key}} : </b>
                                                {{$detail}}
                                            </li>
                                        @endforeach

                                   </ul>

                                    <a href="{{route('school.edit',$school)}}" class="btn btn-outline-primary btn-icon btn-icon-start">
                                        <i data-acorn-icon="save" data-acorn-size="13"></i>
                                        <span class="text-small align-middle">Modifier</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h2 class="small-title">Localisation géographique de l'école</h2>
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" class="w-100" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="mb-5">
                            <h2 class="small-title">Informations en langue Arabe</h2>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-unstyled">

                                        @foreach($schoolDetailsArabic as $key => $detail)
                                            <li>
                                                <b>{{$key}} : </b>
                                                {{$detail}}
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h2 class="small-title">Logo</h2>
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{asset('storage/' . $school->logo)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>


                        <div class="mb-5">
                            <h2 class="small-title">Entete pour impression</h2>
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{asset('storage/' . $school->header)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>


                        <div class="mb-5">
                            <h2 class="small-title">Pied de page</h2>
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{asset('storage/' . $school->footer)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
    </div>
@endsection
