{{ include('header.php', {title: 'Ajouter un produit'})}}
<a href="{{path}}product/index">Liste</a>

{% if errors is defined %}
<span class="error">{{ errors|raw }}</span>
{% endif %}

<form action="{{path}}product/store" method="post" enctype="multipart/form-data">
    <label>Nom
        <input type="text" name="name" value="{{data.name}}">
    </label>
    <label>Description
        <textarea name="description" rows="5" cols="50" >{{data.description}}</textarea>
    </label>
    <label>Coûts
        <input type="text" name="cost" value="{{data.cost}}">
    </label>
    <label>Prix
        <input type="text" name="price" value="{{data.price}}">
    </label>
    <label>Image
        <input type="file" name="image_path">
    </label>
    <input type="submit" value="Enregistrer">
</form>
</body>

</html>