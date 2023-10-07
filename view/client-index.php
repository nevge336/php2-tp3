{{ include('header.php', {title: 'Liste de client'})}}
    <h1>Client</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Phone</th>
            <th>Courriel</th>
        </tr>
      
        {% for client in clients %}

                <tr>
                    <td><a href='{{path}}client/show/{{client.id}}'>{{ client.nom }}</a></td>
                    <td>{{ client.adresse }}</td>
                    <td>{{ client.postal_code }}</td>
                    <td>{{ client.courriel }}</td>
                </tr>

        {% endfor %}

    </table>
</body>
</html>