{{ include('header.php', {title: 'Liste de produits'})}}
<a href="{{path}}product/create">Ajouter Produit</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Coût</th>
            <th>Prix</th>
        </tr>
      
        {% for product in products %}
                <tr>
                    <td><a href='{{path}}product/show/{{product.id}}'>{{ product.name }}</a></td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.cost }}</td>
                    <td>{{ product.price }}</td>
                    
                </tr>

        {% endfor %}

    </table>
</body>
</html>