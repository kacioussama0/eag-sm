@php
    $html_tag_data = [];
    $title = 'Ecole';
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
        <form method="POST" id="send-form" action="{{route('school.update',$school)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-n5">
                    <div class="col-xl-4">
                        <div class="mb-5">
                            <h2 class="small-title">Modification école</h2>
                            <div class="card">
                                <div class="card-body">


                                        <x-c-input type="text" label="Nom" name="name" id="name" value="{{$school['name']}}"/>
                                        <x-c-input type="text" label="Nom abrégé" name="name_abbr" id="name_abbr" value="{{$school['name_abbr']}}"/>
                                        <x-c-input type="text" label="Gsm Responsable" name="manager_phone" id="manager_phone" value="{{$school['manager_phone']}}" />
                                        <x-c-input type="email" label="Email" name="email" id="email" value="{{$school['email']}}" />
                                        <x-c-input type="url" label="Site web" name="site_url" id="site_url" value="{{$school['site_url']}}" />
                                        <x-c-input type="text" label="Addresse" name="address" id="address" value="{{$school['address']}}" />
                                        <x-c-input type="text" label="Code Postal" name="postal_code" id="postal_code" value="{{$school['postal_code']}}"/>
                                        <x-c-input type="text" label="Pays" name="country" id="country" value="{{$school['country']}}"/>
                                        <x-c-input type="text" label="Délégation" name="delegation" id="delegation" value="{{$school['delegation']}}"/>
                                        <x-c-input type="text" label="Academie" name="academy" id="academy" value="{{$school['academy']}}"/>
                                        <x-c-input type="text" label="Telephone" name="phone" id="phone" value="{{$school['phone']}}"/>
                                        <x-c-input type="text" label="Teléphone 2" name="phone_alt" id="phone_alt" value="{{$school['phone_alt']}}"/>
                                        <x-c-input type="text" label="Fax" name="fax" id="fax" value="{{$school['fax']}}"/>
                                        <x-c-input type="text" label="Numéro CNSS" name="nssf_number" id="nssf_number" value="{{$school['nssf_number']}}"/>
                                        <x-c-input type="text" label="Numéro RC" name="cr_number" id="cr_number" value="{{$school['cr_number']}}"/>
                                        <x-c-input type="text" label="Compte Bancaire" name="bank_account" id="bank_account" value="{{$school['bank_account']}}"/>
                                        <x-c-input type="text" label="Banque" name="bank_name" id="bank_name" value="{{$school['bank_name']}}"/>
                                        <x-c-input type="text" label="Agence" name="bank_agency" id="bank_agency" value="{{$school['bank_agency']}}"/>
                                        <x-c-input type="text" label="Longitude" name="longitude" id="longitude" value="{{$school['longitude']}}"/>
                                        <x-c-input type="text" label="Latitude" name="latitude" id="latitude" value="{{$school['latitude']}}"/>
                                        <x-c-input type="text" label="Informations Légales" name="legal_informations" id="legal_informations" value="{{$school['legal_informations']}}"/>
                                        <x-c-input type="text" label="Numéro autorisation" name="authorization_number" id="authorization_number" value="{{$school['authorization_number']}}"/>
                                        <x-c-input type="date" label="Date autorisation" name="authorization_date" id="authorization_date" value="{{$school['authorization_date']}}"/>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="mb-5">
                            <h2 class="small-title">Informations en langue Arabe</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="text" label="Nom" name="name_ar" id="name_ar" value="{{$school['name_ar']}}"/>
                                    <x-c-input type="text" label="Adresse de l'école" name="address_ar" id="address_ar" value="{{$school['address_ar']}}"/>
                                    <x-c-input type="text" label="Délégation" name="delegation_ar" id="delegation_ar" value="{{$school['delegation_ar']}}" />
                                    <x-c-input type="text" label="Responsable" name="manager_ar" id="manager_ar" value="{{$school['manager_ar']}}" />
                                    <x-c-input type="text" label="Informations Légales" name="legal_informations_ar" id="legal_informations_ar" value="{{$school['legal_informations_ar']}}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h2 class="small-title">Envoi des photos :</h2>
                            <div class="card">
                                <div class="card-body">
                                    <x-c-input type="file" label="Logo" name="logo" id="logo"  />
                                    <x-c-input type="file" label="Entete" name="header" id="header"  />
                                    <x-c-input type="file" label="Pied de page" name="footer" id="footer" />
                                    <x-c-input type="file" label="Réglement intérieur" name="school_rules" id="school_rules" />
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </form>
    </div>
@endsection
