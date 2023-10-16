{{ include('header.php', {title: 'Ajouter un produit'})}}


{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}

<form action="{{path}}product/store" method="post">
        <label>Nom
            <input type="text" name="name" value="{{data.name}}">
        </label>
        <label>Description
            <input type="text" name="description" value="{{data.description}}">
        </label>
        <label>Coûts
            <input type="text" name="cost" value="{{data.cost}}">
        </label>
        <label>Prix
            <input type="text" name="price" value="{{data.price}}">
        </label>

        <input type="submit" value="Save">
    </form>
</body>
</html>