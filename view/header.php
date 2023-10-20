<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{path}}assets/css/main.css">
</head>

<body>
    <!-- mettre une condition s'il y a un header -->
    <nav>

        <div class='menu'>
            <header>
                <a href='{{path}}'>
                    <img src='{{path}}assets/img/logo_forum.svg' alt='logo'>
                </a>
                <p>Mlab</p>
            </header>
            {% if session %}

            <h3>Bienvenue {{session.user_name}}</h3>


            {% endif %}
            <div>
                {% if guest %}
                <a href="{{path}}login">Login</a>
                {% else %}
                <a href="{{path}}client/index">Clients</a>
                <a href="{{path}}product/index">Produits</a>
                {% if session.privilege == 1 %}
                <a href="{{path}}user/index">User</a>
                <a href="{{path}}logbook/index">Logbook</a>
                {% endif %}
                <a href="{{path}}login/logout">Logout</a>

                {% endif %}

            </div>
        </div>
    </nav>

    <main>
        <h1>{{title}} </h1>