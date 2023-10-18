{{ include('header.php', {title: 'Modifier un user'})}}
<div class="sous-menu">
    <a href="{{path}}user/index">Liste</a>
    <a href="{{path}}user/create/{{user.id}}">Ajouter</a>
</div>

{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}
<form action="{{path}}user/update" method="post">
<input type="hidden" name="id" value="{{user.id}}">
        <label>Nom
            <input type="text" name="name" value="{{user.name}}">
        </label>
        <label>Username
            <input type="email" name="username" value="{{user.username}}">
        </label>
        <label>Password
            <input type="password" name="password" value="{{user.password}}">
        </label>
    
        <label>
        <select name="privilege_id">
            {% for privilege in privileges %}
            <option value="{{privilege.id}}" {% if  privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
            {% endfor%}
        </select>
    </label>
        <input type="submit" value="Save">
    </form>
    <form action="{{path}}user/destroy" method="post">
    <input type="hidden" name="id" value="{{user.id}}">
    <input type="submit" value="Effacer">
</form>
</body>
</html>