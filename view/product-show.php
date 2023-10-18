{{ include('header.php', {title: 'Produit'})}}
<a href="{{path}}product/edit/{{product.id}}">Modifier product</a>

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




</table>


</body>

</html>