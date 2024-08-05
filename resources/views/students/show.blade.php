@php
    $html_tag_data = [];
    $title = 'Fiche élève';
    $description= 'Acorn elearning platform course list.';

     $studentDetails = [
        'Numéro' => $student->number,
        'Nom' => $student->first_name,
        'Prenom' => $student->last_name,
        'Sexe' => $student->gender == "M" ? "Masculin" : "Feminin",
        'Nationnalité' => $student->nationality->name ?? "Vide",
        'Adresse' => $student->address,
        'Ville' => $student->city_resident->name ?? "Vide",
        'Code postal' => $student->postal_code,
        'Pays' => $student->country->name ?? "Vide",
        'Email' => $student->email,
        'GSM' => $student->phone,
        'Téléphone' => $student->fix,
        'Numéro CIN' => $student->nic_number,
        'Numéro CNE' => $student->cne_number,
        'Date de naissance' => $student->date_of_birth,
        'Ville de naissance' => $student->place_of_birth->name ?? "Vide",
        'Pays de naissance' => $student->country_of_birth->name ?? "Vide",
        'Langue maternelle' => $student->maternal_language->name ?? "Vide",
        'Seconde Langue' => $student->second_language->name ?? "Vide",
        'Religion' => $student->religion->name ?? "Vide",
        'Devise' => $student->currency->name ?? "Vide",
        'Nom d\'assurance (ou carte vitale)' => $student->assurance_name,
        'Numéro d\'assurance (ou carte vitale)' => $student->assurance_number,
        'Ancienne Ecole' => $student->old_school,
        'Ancienne Académie' => $student->old_academy,
        'Ancienne délégation' => $student->old_delegation,
        'Commune' => $student->old_state,
        'Remarques' => $student->remarks,
        'Comment il a connu l\'école' => "",
        'Boursier' => $student->scholarship_holder ? "Oui" : "Non",
        'Bon Payeur' => $student->payment_voucher ? "Oui" : "Non",
    ];

     $studentDetailsArabic = [
        'Nom en arabe' => $student->first_name_ar,
        'Prénom en arabe' => $student->last_name_ar,
        'Adresse en arabe' => $student->address_ar,

     ];
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description,])

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

@endsection

@section('js_vendor')
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    @livewireScripts
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
                                @if(!empty($student->photo))
                                    <img src="{{asset('storage/' . $student->photo )}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($student->gender == 'M')
                                    <img src="{{asset('img/profile/videM.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($student->gender == 'F')
                                    <img src="{{asset('img/profile/videF.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @endif
                                </div>
                                <div class="h5 mb-1">{{$student['first_name'] . ' ' . $student['last_name']}}</div>
                                <div class="text-muted">
                                    <i data-acorn-icon="online-class"  class="text-primary"></i>
{{--                                    <span class="align-middle text-primary">{{$student->fun->name ?? "Vide"}}</span>--}}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100 mb-5">
                                <a href="{{route('students.edit',$student)}}" class="btn btn-primary w-100 me-2">Edit</a>
                                <button type="submit" form="delete-student-{{$student->id}}" class="btn btn-outline-primary w-100 me-2">Supprimer</button>
                                <form method="POST" id="delete-student-{{$student->id}}" onsubmit="return confirm('vous etes sur!')">
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
                                    <div class="col text-alternate align-middle">{{$student['first_name'] . ' ' . $student['last_name']}}</div>
                                </div>


                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="calendar" class="text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$student->date_of_birth ?? "Vide"}} à {{$student->place_of_birth->name ?? "Vide"}}</div>
                                </div>

                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$student->phone ?? "Vide"}}</div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>
                                    <div class="col text-alternate">{{$student->email ?? "Vide"}}</div>
                                </div>
                            @if($student['address'] and $student->postal_code)
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            <i data-acorn-icon="pin" class="text-primary" data-acorn-size="17"></i>
                                        </div>
                                    </div>

                                    <div class="col text-alternate">{{$student['address'] . ', ' . $student->postal_code . ' ' . ($student->city_resident->name ?? "")}}</div>

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
                            @foreach($studentDetails as $key => $detail)
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
                            @foreach($studentDetailsArabic as $key => $detail)
                                <li>
                                    <b>{{$key}} : </b>
                                    {{$detail}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-12">

                <h2 class="small-title">Informations Détaillé</h2>

                <div class="card">
                    <div class="card-body">
                        <div class=" accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Informations générales
                                    </button>
                                </h4>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @livewire('tutors.index')
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Informations Pédagogiques
                                    </button>
                                </h4>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Informations Administratives
                                    </button>
                                </h4>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
