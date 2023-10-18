{{ include('header.php', {title: 'Ajouter un produit'})}}
<a href="{{path}}product/index">Liste Produit</a>

{% if errors is defined %}
<span class="error">{{ errors|raw }}</span>
{% endif %}

<form action="{{path}}product/store" method="post">
    <label>Nom
        <input type="text" name="name" value="{{data.name}}">
    </label>
    <label>Description
        <textarea name="description" rows="5" cols="50" value="{{data.description}}"></textarea>


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