{{ include('header.php', {title: 'Produit'})}}
<div class="sous-menu">
    <a href="{{path}}product/index">Liste</a>
    <a href="{{path}}product/create/{{product.id}}">Ajouter</a>
    <a href="{{path}}product/edit/{{product.id}}">Modifier</a>
</div>
<section class="deux-colonnes">
    <table>
        <tr>
            <th>Nom: </th>
            <td>{{ product.name }}</td>
        </tr>
        <tr>
            <th>Description: </th>
            <td>{{ product.description }}</td>
        </tr>
        <tr>
            <th>Coût: </th>
            <td>{{ product.cost }} $</td>
        </tr>
        <tr>
            <th>Prix: </th>
            <td>{{ product.price }} $</td>
        </tr>

    </table>
    <div class="trois-cent">
        <img  src="../../assets/img/uploads/{{product.image_path}}" alt="">
    </div>


</section>




</body>

</html>