@php
    $html_tag_data = [];
    $title = 'Editer Sanction';
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


        <div class="row mb-n5">

            <div class="col-xl-4">
                <div class="mb-5">
                    <x-alert />
                    <h2 class="small-title">{{$title}}</h2>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route('staff-sanctions.update',$staff_sanction)}}">
                                @csrf
                                @method("PUT")
                                <x-c-select label="Employé : " name="staff_id" :options="$staffs" value="{{$staff_sanction->staff_id}}" />
                                <x-c-input type="date" label="Date: " name="date" id="date" value="{{$staff_sanction->date}}"/>
                                <x-c-input type="text" label="Motif : " name="reason" id="reason" value="{{$staff_sanction->reason}}"/>
                                <x-c-select label="Type : " name="type_sanction_id" :options="$sanctionsType" value="{{$staff_sanction->type_sanction_id}}" />
                                <x-c-input type="text" label="Description : " name="description" id="description" value="{{$staff_sanction->description}}"/>
                                <x-c-input type="text" label="Décision : " name="decision" id="decision" value="{{$staff_sanction->decision}}"/>

                                <button type="submit"  class="btn btn-outline-primary btn-icon btn-icon-start">
                                    <i data-acorn-icon="save"></i>
                                    <span>Valider</span>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
