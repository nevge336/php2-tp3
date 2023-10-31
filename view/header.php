<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{path}}assets/css/style.css">
    <meta name="description" content="Enchère de timbres rares. Timbre Madagascar 1962">
    <meta name="keywords" content="timbre, Madagascar, Stampee, enchère">
    <meta name="author" content="Geneviève Neveu">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>{{ title }}</title>

</head>

<body>

    <!-- Navigation-->
    <nav class="navigation">
        <header>
            <a href="{{path}}">
                <img class="logo" src="{{path}}assets/img/logo-1-alt.png" alt="logo Stampee">
            </a>
        </header>
        <div class="menu-action">
            <div class="dropdown">

                <a id="enchere" href="{{path}}product/index">
                    <svg class="icone" style="enable-background:new 0 0 64 64" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2h11.113V0H0v13.865h2zM2 51.207H0V64h13.113v-2H2zM50.887 0v2H62v10.793h2V0zM62 62H50.887v2H64V51.207h-2zM3.48 30.413 1.9 32.008l1.584 1.584C11.346 41.449 21.673 45.377 32 45.377s20.655-3.928 28.517-11.786l1.583-1.583-1.583-1.6c-15.725-15.714-41.309-15.714-57.037.005zM32 36.679A4.684 4.684 0 0 1 27.321 32c0-2.58 2.099-4.678 4.679-4.678S36.679 29.42 36.679 32A4.684 4.684 0 0 1 32 36.679zM4.722 32l.176-.177a38.12 38.12 0 0 1 21.238-10.748A12.394 12.394 0 0 0 19.602 32c0 4.727 2.646 8.833 6.536 10.925a38.121 38.121 0 0 1-21.24-10.748l-.176-.176zm54.556 0-.175.176a38.126 38.126 0 0 1-21.24 10.748A12.394 12.394 0 0 0 44.399 32c0-4.725-2.645-8.831-6.534-10.924a38.129 38.129 0 0 1 21.236 10.746l.177.179z" />
                        <path d="M32 29.322A2.682 2.682 0 0 0 29.321 32c0 1.477 1.202 2.679 2.679 2.679s2.679-1.202 2.679-2.679A2.682 2.682 0 0 0 32 29.322zM19.25 7.138l1.604-1.195 1.792 2.406-1.604 1.195zM22.835 11.949l1.603-1.195 1.793 2.406-1.604 1.195zM31 10.541h2v2.5h-2zM31 4.541h2v3h-2zM37.768 13.16l1.793-2.406 1.604 1.195-1.793 2.406zM41.353 8.348l1.793-2.405 1.604 1.195-1.793 2.406zM41.354 55.652l1.604-1.195 1.792 2.405-1.604 1.195zM37.77 50.84l1.603-1.194 1.792 2.405-1.603 1.195zM31 56.459h2v3h-2zM31 50.959h2v2.5h-2zM19.25 56.862l1.793-2.405 1.603 1.195-1.793 2.405zM22.835 52.051l1.793-2.405 1.603 1.195-1.793 2.405z" />
                    </svg>
                </a>
                <p>ENCHERES</p>
                <div>
                    <ul>
                        <li><a href="#">En direct</a></li>
                        <li><a href="#">Toutes les ventes</a></li>
                        <li><a href="#">Ventes du jour</a></li>

                        <li><a href="#">Ventes fermées</a></li>
                    </ul>
                </div>
            </div>
            <div class="login">
                <a href="{{path}}login">
                    <svg class="icone " style="enable-background:new 0 0 16 16" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 9H4a4 4 0 0 0-4 4v3h16v-3a4 4 0 0 0-4-4z" />
                        <path d="M12 5V4a4 4 0 0 0-8 0v1a4 4 0 0 0 8 0z" />
                    </svg>
                </a>
                <p>CONNEXION</p>
            </div>
        </div>

        <input type="checkbox" class="trigger menu" aria-label="ouvrir menu">
        <div class="main-menu">
            <a href="{{path}}login"><i class="fa-regular fa-user"></i>Connexion</a>
            <a href="{{path}}product/index"><i class="fa-solid fa-gavel"></i>Enchères</a>
            <a href="#"><i class="fa-regular fa-newspaper"></i>Actualités</a>
            <a href="#"><i class="fa-regular fa-gem"></i>Timbres</a>
            <a href="#"><i class="fa-solid fa-glasses"></i>Lord Stampee</a>
            <a href="#"><i class="fa-regular fa-circle-question"></i>Aide</a>
            <a href="#"><i class="fa-regular fa-envelope"></i>Contact</a>
        </div>
    </nav>
    <main class="gouttiere">
        <h1>{{ title }} </h1>