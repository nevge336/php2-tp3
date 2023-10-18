{{ include('header.php', {title: 'Modifier produit'})}}

<a href="{{path}}product">Liste produits</a>
<form action="{{path}}product/update" method="post">
    <input type="hidden" name="id" value="{{product.id}}">
    <label>Nom
        <input type="text" name="name" value="{{product.name}}">
    </label>
    <label>Description

        <textarea name="description" rows="5" cols="50" >{{product.description}}</textarea>
    </label>
    <label>Coût
        <input type="text" name="cost" value="{{product.cost}}">
    </label>
    <label>Prix
        <input type="text" name="price" value="{{product.price}}">
    </label>


 
    <input type="submit" value="Modifier">
</form>
<form action="{{path}}product/destroy" method="post">
    <input type="hidden" name="id" value="{{product.id}}">
    <input type="submit" value="Effacer">
</form>
</body>

</html>