{{ include('header.php', {title: 'Mettre à jour le client'})}}

<a href="{{path}}client">Liste clients</a>
<form action="{{path}}client/update" method="post">
    <input type="hidden" name="id" value="{{client.id}}">
    <label>Nom
        <input type="text" name="name" value="{{client.name}}">
    </label>
    <label>Contact
        <input type="text" name="contact" value="{{client.contact}}">
    </label>
    <label>Adresse
        <input type="text" name="address" value="{{client.address}}">
    </label>
    <label>Code Postal
        <input type="text" name="postal_code" value="{{client.postal_code}}">
    </label>
    <label>Courriel
        <input type="email" name="email" value="{{client.email}}">
    </label>
    <label>Phone
        <input type="text" name="phone" value="{{client.phone}}">
    </label>

    <label>
        <select name="city_id">
            {% for city in cities %}
            <option value="{{city.id}}" {% if  city.id == client.city_id %} selected {% endif %}>{{ city.city}}</option>
            {% endfor%}
        </select>
    </label>
    <input type="submit" value="Modifier">
</form>
<form action="{{path}}client/destroy" method="post">
    <input type="hidden" name="id" value="{{client.id}}">
    <input type="submit" value="Effacer">
</form>
</body>

</html>