@php
    $html_tag_data = [];
    $title = 'Liste des élèves';
    $description= 'Acorn elearning platform course list.';
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description,])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/instructor.list.js"></script>
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

        <x-alert/>

        <a href="{{route('students.create')}}" class="btn btn-outline-primary my-3"><i data-acorn-icon="plus" data-acorn-size="16" class="text-primary"></i>Ajout d'élève</a>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xxl-4 g-3 mb-5">
            @foreach($students as $student)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="sw-13 position-relative mb-3 mx-auto">
                                @if(!empty($student->photo))
                                    <img src="{{asset('storage/' . $student->photo )}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($student->gender == 'M')
                                    <img src="{{asset('img/profile/videM.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @elseif($student->gender == 'F')
                                    <img src="{{asset('img/profile/videF.jpg')}}" class="img-fluid rounded-xl" alt="thumb" />
                                @endif
                            </div>
                            <a href="Instructor.Detail.html" class="body-link">{{$student->full_name}}</a>
{{--                            <div class="text-muted text-medium mb-2">{{$staff->service->name ?? "Vide"}}</div>--}}
{{--                            <div class="text-muted sh-5">Fonction : {{$staff->fun->name ?? "Vide"}} </div>--}}
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="email" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="sh-4 d-flex align-items-center lh-1-25">{{$student->email ?? "Vide"}}</div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="phone" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="sh-4 d-flex align-items-center lh-1-25">{{$student->phone ?? "Vide"}}</div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-4">
                                <div class="col-auto">
                                    <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="calendar" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="sh-4 d-flex align-items-center lh-1-25">{{$student->date_of_birth ?? "Vide"}} à {{$student->place_of_birth->name ?? "Vide"}}</div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between w-100">
                                <a href="{{route('students.show',$student)}}" class="btn btn-outline-primary w-100 me-1 btn-sm"><i class="bi bi-person me-2"></i> Detail</a>

                                <button class="btn btn-icon btn-icon-only btn-outline-primary btn-sm" type="button"  data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                    <i data-acorn-icon="more-horizontal"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{route('students.edit',$student)}}" class="dropdown-item"><i class="bi bi-pencil me-2"></i> Edit</a>
                                    <button type="submit" form="delete-student-{{$student->id}}" class="dropdown-item"><i class="bi bi-trash-fill me-2"></i> Supprimer</button>
                                    <form method="POST" action="{{route('students.destroy',$student->id)}}" id="delete-student-{{$student->id}}" onsubmit="return confirm('vous etes sur!')">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
