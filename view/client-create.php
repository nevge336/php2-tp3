{{ include('header.php', {title: 'Ajouter un client'})}}


{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}
<form action="{{path}}client/store" method="post">
        <label>Nom
            <input type="text" name="nom" value="{{data.nom}}">
        </label>
        <label>Adresse
            <input type="text" name="adresse" value="{{data.adresse}}">
        </label>
        <label>Code Postal
            <input type="text" name="postal_code" value="{{data.postal_code}}">
        </label>
        <label>Courriel
            <input type="email" name="courriel" value="{{data.courriel}}">
        </label>
        <label>Phone
            <input type="text" name="phone" value="{{data.phone}}">
        </label>
        <label>Date de naissance
            <input type="date" name="naissance" value="{{data.naissance}}">
        </label>
        <label>
        {# Ville
            <input type="text" name="ville"> #}

            <select name="ville_id">
                {% for ville in villes %}
                <option value="{{ville.id}}" {% if  ville.id == data.ville_id %} selected {% endif %}>{{ ville.ville}}</option>
                {% endfor%}
            </select>
           
        </label>    
        <input type="submit" value="Save">
    </form>
</body>
</html>