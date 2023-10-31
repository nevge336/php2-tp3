{{ include('header.php', {title: 'Login'})}}


{% if errors is defined %}
<span class="error">{{ errors|raw }}</span>
{% endif %}
{% if session %}
<div class="flex-un">
    <a href="{{path}}login/logout">Logout</a>
    <h3>Bienvenue {{session.user_name}}</h3>
    
</div>

{% endif %}

{% if guest %}
<section class="flex-column">


    <div>
        <form action="{{path}}login/auth" method="post">

            <label>Courriel
                <input type="email" name="username" value="{{data.username}}">
            </label>
            <label>Mot de passe
                <input type="password" name="password">
            </label>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="inscription">
        <p>Pas encore membre?</p>
        <p>(c'est gratuit)</p>
        <a href="{{path}}user/create">
            <p class="button small fourth">Inscription</p>
        </a>
    </div>

</section>
{% endif %}
{{ include('footer.php') }}