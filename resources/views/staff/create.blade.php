@php
    $html_tag_data = [];
    $title = 'Ajout du personnel';
    $description= 'Acorn elearning platform course list.';
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description,])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
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

                <!-- Top Buttons Start -->
                <div class="w-100 d-md-none"></div>
                <div class="col-auto d-flex align-items-end justify-content-end">
                    <button type="submit" form="send-form" class="btn btn-outline-primary btn-icon btn-icon-start">
                        <i data-acorn-icon="save"></i>
                        <span>Valider</span>
                    </button>
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>



        <!-- Title and Top Buttons End -->
        <form method="POST" id="send-form" action="{{route('staff.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-n5">
                    <div class="col-xl-6">
                        <div class="mb-5">
                            <h2 class="small-title">Ajout du personnel</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="text" label="Matricule :" name="registration_number" id="registration_number" value="{{old('registration_number')}}"/>
                                    <x-c-input type="text" label="Id Pointeuse :" name="pointing_id" id="pointing_id" value="{{old('pointing_id')}}"/>
                                    <x-c-input type="text" label="Numéro CNSS :	" name="nssf_number" id="nssf_number" value="{{old('nssf_number')}}"/>
                                    <x-c-input type="text" label="Nom :	" name="first_name" id="first_name" value="{{old('first_name')}}"/>
                                    <x-c-input type="text" label="Prenom :" name="last_name" id="last_name" value="{{old('last_name')}}"/>

                                    <div class="form-check form-check-inline mb-3">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="M" @checked(old('gender') == 'M')>
                                        <label class="form-check-label" for="male">Masculin</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="F" @checked(old('gender') == 'F')>
                                        <label class="form-check-label" for="female">Feminin</label>
                                    </div>
                                    <x-c-input type="text" label="Adresse :	" name="address" id="address" value="{{old('address')}}"/>
                                    <x-c-input type="text" label="Code Postal :" name="postal_code" id="postal_code" value="{{old('postal_code')}}"/>
                                    <x-c-select label="Ville  :" name="city_residence_id" :options="$cities" value="{{old('city_residence_id')}}"/>
                                    <x-c-select label="Pays  :" name="country_id" :options="$countries" value="{{old('country_id')}}"/>
                                    <x-c-input type="text" label="Email :" name="email" id="email" value="{{old('email')}}"/>
                                    <x-c-input type="text" label="GSM :" name="phone" id="phone" value="{{old('phone')}}"/>
                                    <x-c-input type="text" label="Fix :" name="fix" id="fix" value="{{old('fix')}}"/>
                                    <x-c-select label="Nationnalité  :" name="nationality_id" :options="$nationalities" value="{{old('nationality_id')}}"/>
                                    <x-c-input type="text" label="CIN  :" name="nic_number" id="nic_number" value="{{old('nic_number')}}"/>
                                    <x-c-input type="date" label="Date CIN :" name="nic_date" id="nic_date" value="{{old('nic_date')}}"/>
                                    <x-c-input type="date" label="Date de naissance :" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}"/>
                                    <x-c-select label="Ville de naissance :" name="place_of_birth_id" :options="$cities" value="{{old('place_of_birth_id')}}"/>
                                    <x-c-input type="date" label="Date de recrutement :" name="recruitment_date" id="recruitment_date" value="{{old('recruitment_date')}}"/>
                                    <x-c-input type="date" label="Date de départ :" name="departure_date" id="departure_date" value="{{old('departure_date')}}"/>
                                    <x-c-input type="text" label="Motif de départ :" name="reason_departure" id="reason_departure" value="{{old('reason_departure')}}"/>
                                    <x-c-select label="Fonction : " name="function_id" :options="$functions" value="{{old('function_id')}}"/>
                                    <x-c-select label="Service : " name="service_id" :options="$services" value="{{old('service_id')}}"/>
                                    <x-c-select label="Sous Service : " name="sub_service_id" :options="$subServices" value="{{old('sub_service_id')}}"/>
                                    <x-c-select label="Etat Civil  :" name="marital_status_id" :options="$maritalStatus" value="{{old('marital_status_id')}}"/>
                                    <x-c-input type="text" label="Nombre des Enfants  :" name="children" id="children" value="{{old('children')}}"/>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-5">
                            <h2 class="small-title">Informations en langue Arabe</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="text" label="Nom en arabe : " name="first_name_ar" id="first_name_ar" value="{{old('first_name_ar')}}"/>
                                    <x-c-input type="text" label="Prénom en arabe :" name="last_name_ar" id="last_name_ar" value="{{old('last_name_ar')}}"/>
                                    <x-c-input type="text" label="Adresse en arabe:	" name="address_ar" id="address_ar" value="{{old('address_ar')}}"/>
                                </div>
                            </div>
                        </div>


                        <div class="mb-5">
                            <h2 class="small-title">Informations en langue Arabe</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="text" label="Salaire: " name="salary" id="salary" value="{{old('salary')}}"/>
                                    <x-c-input type="text" label="Taux Horaire:	" name="rate_hourly" id="rate_hourly" value="{{old('rate_hourly')}}"/>
                                    <x-c-select label="Devise:" name="currency_id" :options="$currencies" value="{{old('currency_id')}}"/>
                                    <x-c-input type="text" label="Nom de la banque :	" name="bank_name" id="bank_name" value="{{old('bank_name')}}"/>
                                    <x-c-input type="text" label="Agence:" name="bank_account" id="bank_account" value="{{old('bank_account')}}"/>
                                    <x-c-input type="text" label="Numéro de compte bancaire :" name="bank_agency" id="bank_agency" value="{{old('bank_agency')}}"/>
                                    <x-c-input type="text" label="PayPal :" name="paypal" id="paypal" value="{{old('paypal')}}"/>
                                </div>
                            </div>
                        </div>


                        <div class="mb-5">
                            <h2 class="small-title">Envoi des photos :</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="file" label="Photo : " name="photo" id="photo" value="{{old('photo')}}"  />
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </form>
    </div>
@endsection
