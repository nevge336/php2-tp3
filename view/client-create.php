{{ include('header.php', {title: 'Ajouter un client'})}}
{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}
<div class="sous-menu">
    <a href="{{path}}client/index">Liste</a>
</div>
<form action="{{path}}client/store" method="post">
        <label>Nom
            <input type="text" name="name" value="{{data.name}}">
        </label>
        <label>Contact
            <input type="text" name="contact" value="{{data.contact}}">
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
        <label>Téléphone
            <input type="text" name="phone" value="{{data.phone}}">
        </label>
        <label>
        {#   City
            <input type="text" name="city"> #}

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