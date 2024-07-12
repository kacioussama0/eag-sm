@php
    $html_tag_data = [];
    $title = 'Ajout de Classe';
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

    <script>

        const branches = document.querySelector('#branch_id');

        branches.onchange = async function (event) {

            const ID = event.target.value;
            const levels = document.querySelector('#level_id');

            levels.innerHTML = `<option value="" disabled="" selected="">Select</option>`;

            const response = await  fetch(`{{url('') }}\\platform\\branches\\levels\\${ID}`);

            const data = await response.json();

            for(let i = 0 ; i < data.length ; i++) {
                levels.innerHTML += `<option value="${data[i].id}">${data[i].name}</option>`;
            }


        }

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


        <!-- Title and Top Buttons End -->

            @csrf
            @method('PUT')
            <div class="row mb-n5">

                    <div class="col-xl-4">
                        <div class="mb-5">
                            <x-alert />
                            <h2 class="small-title">Ajout de Classe</h2>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('classes.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <x-c-select label="Branche :" name="branch_id" :options="$branches" value="{{old('branch_id')}}"/>
                                        <x-c-select label="Niveau :" name="level_id" :options="[]" value="{{old('level_id')}}"/>
                                        <x-c-input type="text" label="Code :" name="code_class" id="classe_id" value="{{old('code_class')}}"/>
                                        <x-c-input type="text" label="Nom de la classe :" name="name" id="name" value="{{old('name')}}"/>
                                        <x-c-input type="text" label="Nom de la classe en arabe :" name="name_ar" id="name_ar" value="{{old('name_ar')}}"/>
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
                        <h2 class="small-title">Liste des Classes</h2>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Nom de classe</th>
                                            <th>Nom en arabe</th>
                                            <th>Branche</th>
                                            <th>Niveau</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($classes as $classe)
                                            <tr>
                                                <td>{{$classe->code_class}}</td>
                                                <td>{{$classe->name}}</td>
                                                <td>{{$classe->name_ar}}</td>
                                                <td>{{$classe->branch->name}}</td>
                                                <td>{{$classe->level->name}}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('classes.edit',$classe->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="submit" form="delete-class-{{$classe->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                    </div>

                                                    <form action="{{route('classes.destroy',$classe->id)}}" id="delete-class-{{$classe->id}}"  method="POST" onsubmit="return confirm('es-tu sûr ?')">
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
