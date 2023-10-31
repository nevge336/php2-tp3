{{ include('header.php', {title: 'Liste de produits'})}}

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
            <td class="pic-img cent"><img src="../assets/img/uploads/{{ product.image_path }}" alt=""></td>
        </tr>
    {% endfor %}

</table>




{{ include('footer.php')}}