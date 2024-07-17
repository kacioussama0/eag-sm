@php
    $html_tag_data = [];
    $title = 'Fiche de l\'employé';
    $description= 'Acorn elearning platform course list.';

     $staffDetails = [
        'Matricule' => $staff->registration_number,
        'Id Pointeuse' => $staff->pointing_id,
        'Numéro CNSS' => $staff->nssf_number,
        'Date de naissance' => $staff->date_of_birth ?? "Vide",
        'Ville de naissance' => $staff->place_of_birth->name ?? "Vide",
        'Sexe' => $staff->gender == "M" ? "Masculin" : "Feminin",
        'CIN' => $staff->nic_number,
        'Date CIN' => $staff->nic_date,
        'Date de recrutement' => $staff->recruitment_date,
        'Addresse' => $staff->address,
        'Fonction' => $staff->fun->name ?? "Vide",
        'Ville' => $staff->city_resident->name ?? "Vide",
        'Pays' => $staff->country->name ?? "Vide",
        'Nationnalité' => $staff->nationality->name ?? "Vide",
        'Postal Code' => $staff->postal_code ?? "Vide",
        'Fixe' => $staff->fix,
        'Service' => $staff->service->name ?? "Vide",
        'Sous Service' => $staff->sub_service->name ?? "Vide",
        'Etat Civil' => $staff->marital_status->name ?? "Vide",
        'Nombre des Enfants' => $staff->children ?? "Vide",
        'Salaire' => $staff->salary ?? "0.00",
        'Taux Horaire' => $staff->rate_hourly ?? "0.00",
        'Devise' => $staff->currency->name ?? "Vide",

    ];

     $staffDetailsArabic = [
        'Nom en arabe' => $staff->first_name_ar,
        'Prénom en arabe' => $staff->last_name_ar,
        'Adresse en arabe' => $staff->address_ar,

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
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Customers</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->


            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
            <!-- Customer Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <h2 class="small-title">Info</h2>
                <div class="card">
                    <div class="card-body mb-n5">
                        <x-alert/>
                        <div class="d-flex align-items-center flex-column">
                            <div class="mb-5 d-flex align-items-center flex-column">
                                <div class="sw-13 position-relative mb-3 mx-auto">
                                @if(!empty($staff->photo))
                                    <img src="{{asset('storage/' . $staff->photo )}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($staff->gender == 'M')
                                    <img src="{{asset('img/profile/videM.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($staff->gender == 'F')
                                    <img src="{{asset('img/profile/videF.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @endif
                                </div>
                                <div class="h5 mb-1">{{$staff['first_name'] . ' ' . $staff['last_name']}}</div>
                                <div class="text-muted">
                                    <i data-acorn-icon="online-class"  class="text-primary"></i>
                                    <span class="align-middle text-primary">{{$staff->fun->name ?? "Vide"}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100 mb-5">
                                <a href="{{route('staff.edit',$staff)}}" class="btn btn-primary w-100 me-2">Edit</a>
                                <button type="submit" form="delete-staff-{{$staff->id}}" class="btn btn-outline-primary w-100 me-2">Supprimer</button>
                                <form method="POST" id="delete-staff-{{$staff->id}}" onsubmit="return confirm('vous etes sur!')">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div>
                                <p class="text-small text-muted mb-2">INFORMATION</p>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate align-middle">{{$staff['first_name'] . ' ' . $staff['last_name']}}</div>
                                </div>


                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="calendar" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$staff->date_of_birth ?? "Vide"}} à {{$staff->place_of_birth->name ?? "Vide"}}</div>
                                </div>

                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$staff->phone ?? "Vide"}}</div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$staff->email ?? "Vide"}}</div>
                                </div>
                            @if($staff['address'] and $staff->postal_code)
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>

                                    <div class="col text-alternate">{{$staff['address'] . ', ' . $staff->postal_code . ' ' . ($staff->city_resident->name ?? "")}}</div>

                                </div>
                            @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-12 col-xl-8 col-xxl-9">
                <h2 class="small-title">Fiche de l'employé</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($staffDetails as $key => $detail)
                                <li>
                                    <b>{{$key}} : </b>
                                    {{$detail}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <h2 class="small-title">Informations en langue Arabe</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($staffDetailsArabic as $key => $detail)
                                <li>
                                    <b>{{$key}} : </b>
                                    {{$detail}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
