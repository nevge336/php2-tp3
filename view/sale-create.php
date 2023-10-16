{{ include('header.php', {title: 'Vente'})}}


{% if errors is defined %}
<span class="error">{{ errors|raw }}</span>
{% endif %}

<form action="{{path}}sale/store" method="post">
    <label>Nom
        <input type="text" name="name" value="{{data.name}}">
    </label>
    <label>Adresse
        <input type="text" name="address" value="{{data.address}}">
    </label>
    <label>Code Postal
        <input type="text" name="postal_code" value="{{data.postal_code}}">
    </label>
    <label>Courriel
        <input type="email" name="email" value="{{data.email}}">
    </label>
    <label>Phone
        <input type="text" name="phone" value="{{data.phone}}">
    </label>
    <label>
        City
        <input type="text" name="city">

        <select name="city_id">
            {% for city in cities %}
            <option value="{{city.id}}" {% if  city.id == data.city_id %} selected {% endif %}>{{ city.city}}</option>
            {% endfor%}
        </select>

    </label>
    <input type="submit" value="Save">
</form>
</body>

</html>