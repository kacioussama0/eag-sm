@php

$navLists = [
        [
            "name" => "Platforme",
            "icon" => "home-garage",
            "link" => "#platforme",
            "childrens" => [
                ["name" => "Ecole","link" => "/platform/school/1"],
                ["name" => "Cycles","link" => "/platform/cycles"],
                ["name" => "Branches","link" => "/platform/branches"],
                ["name" => "Niveaux de classes","link" => "/platform/levels"],
                ["name" => "Salles","link" => "/platform/rooms"],
                ["name" => "Classes","link" => "/platform/classes"],
                ["name" => "Documents administratifs","link" => "/platform/school-documents"],
            ]

        ],


             [
            "name" => "Services",
            "icon" => "menu",
            "link" => "/services",
            "childrens" => []

        ],
         [
            "name" => "Sous Services",
            "icon" => "menu-shrink",
            "link" => "/sub-services",
            "childrens" => []

        ],

        [
            "name" => "Ressources humaines",
            "icon" => "user",
            "link" => "#human-resources",
            "childrens" => [
                ["name" => "Personnel","link" => "/human-resources/staff"],
                ["name" => "Absence","link" => "/human-resources/absences"],
                ["name" => "Retard","link" => "/human-resources/delays"],
                ["name" => "Congés","link" => "/human-resources/vacations"],
                ["name" => "Autorisations","link" => "/human-resources/staff-authorizations"],
                ["name" => "Sanctions","link" => "/human-resources/staff-sanctions"],
            ]

        ],

         [
            "name" => "Répartition Annuelle",
            "icon" => "calendar",
            "link" => "#repartition-yearly",
            "childrens" => [
                ["name" => "Matière","link" => "/repartition-yearly/subjects"],
                ["name" => "Composantes","link" => "/repartition-yearly/components"],

            ]

        ],


        [
            "name" => "Demandes d'admission",
            "icon" => "user",
            "link" => "#prospects",
            "childrens" => [
                ["name" => "Demandes d'admission","link" => "/schooling/students"],
            ]

        ],

            [
            "name" => "Scolarité",
            "icon" => "home-garage",
            "link" => "#schooling",
            "childrens" => [
                ["name" => "Elèves","link" => "/schooling/students"],
            ]

        ],


          [
            "name" => "Paramètres",
            "icon" => "gear",
            "link" => "#p-settings",
            "childrens" => [
                ["name" => "Années Scolaires","link" => "/settings/school-years"],
                ["name" => "Comment il a connu l'école","link" => "/settings/school-social"],
                ["name" => "Depenses","link" => "/settings/expenses"],
                ["name" => "Devise","link" => "/settings/currency"],
                ["name" => "Diplômes","link" => "/settings/diplomas"],
                ["name" => "Documents pédagogiques","link" => "/settings/educational-documents"],
                ["name" => "Etat Civil","link" => "/settings/marital-status"],
                ["name" => "Fonctions","link" => "/settings/functions"],
                ["name" => "Langue","link" => "/settings/languages"],
                ["name" => "Lien de Parenté","link" => "/settings/relationship"],
                ["name" => "Nationnalités","link" => "/settings/nationalities"],
                ["name" => "Natures des matières","link" => "/settings/nature-of-materials"],
                ["name" => "Niveaux de Branches","link" => "/settings/branch-levels"],
                ["name" => "Niveaux de formations","link" => "/settings/training-levels"],
                ["name" => "Niveaux scolaires","link" => "/settings/school-levels"],
                ["name" => "Pays","link" => "/settings/countries"],
                ["name" => "Professions","link" => "/settings/professions"],
                ["name" => "Recompenses","link" => "/settings/awards"],
                ["name" => "Religions","link" => "/settings/religions"],
                ["name" => "Sanctions","link" => "/settings/sanctions"],
                ["name" => "Thème Ouvrage","link" => "/settings/book-theme"],
                ["name" => "Types de branches","link" => "/settings/branch-types"],
                ["name" => "Types des documents","link" => "/settings/document-types"],
                ["name" => "Types de professeurs","link" => "/settings/types-of-teachers"],
                ["name" => "Types écoles","link" => "/settings/types-of-schools"],
                ["name" => "Types de salle","link" => "/settings/room-types"],
                ["name" => "Villes","link" => "/settings/cities"],

            ]
            ],

];

@endphp


<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
            <!-- <img src="/img/logo/logo-white.svg" alt="logo" /> -->

            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->

    <!-- Language Switch Start -->
    <div class="language-switch-container">
        <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FR</button>
        <div class="dropdown-menu">
{{--            <a href="#" class="dropdown-item">FR</a>--}}

        </div>
    </div>
    <!-- Language Switch End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="/img/profile/profile-3.webp" />
            <div class="name">Lisa Jackson</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">ACCOUNT</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">User Info</a>
                        </li>
                        <li>
                            <a href="#">Preferences</a>
                        </li>
                        <li>
                            <a href="#">Calendar</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Security</a>
                        </li>
                        <li>
                            <a href="#">Billing</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                    <div class="text-extra-small text-primary">APPLICATION</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Themes</a>
                        </li>
                        <li>
                            <a href="#">Language</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Devices</a>
                        </li>
                        <li>
                            <a href="#">Storage</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Help</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>
                    <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                    <ul class="list-unstyled border-last-none">
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">Joisse Kaycee just sent a new comment!</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">New order received! It is total $147,20.</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">3 items just added to wish list by a user!</a>
                            </div>
                        </li>
                        <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">Kirby Peters just sent a new message!</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            @foreach($navLists as $item)
                <li>
                    <a href="{{$item['link']}}">
                        <i data-acorn-icon="{{$item['icon']}}" class="icon" data-acorn-size="18"></i>
                        <span class="label">{{$item['name']}}</span>
                    </a>
                    @if(count($item['childrens']))
                        <ul id="{{trim($item['link'],"#")}}">
                           @foreach($item['childrens'] as $children)
                                <li>
                                    <a href="{{$children['link']}}">
                                        <span class="label">{{$children['name']}}</span>
                                    </a>
                                </li>
                           @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
