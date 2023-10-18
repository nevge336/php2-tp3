{{ include('header.php', {title: 'Liste de client'})}}

<a href="{{path}}client/create">Ajouter Client</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Contact</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Tel.</th>
            <th>Courriel</th>
            <th>Ville</th>
        </tr>
      
        {% for client in clients %}
                <tr>
                    <td><a href='{{path}}client/show/{{client.id}}'>{{ client.name }}</a></td>
                    <td>{{ client.contact }}</td>
                    <td>{{ client.address }}</td>
                    <td>{{ client.postal_code }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.city_id }}</td>
                    
                </tr>

        {% endfor %}

    </table>
</body>
</html>