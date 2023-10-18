{{ include('header.php', {title: 'Liste de produits'})}}
<a href="{{path}}product/create">Ajouter</a>

    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Coût</th>
            <th>Prix</th>
            <th>Image</th>
        </tr>
      
        {% for product in products %}
                <tr>
                    <td><a href='{{path}}product/show/{{product.id}}'>{{ product.name }}</a></td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.cost }} $</td>
                    <td>{{ product.price }} $</td>
                    <td><img src="{{path}}{{product.image_path}}" alt=""></td>
                </tr>

        {% endfor %}

    </table>

    

</body>
</html>