{{ include('header.php', {title: 'Client'})}}
<div class="sous-menu">
    <a href="{{path}}client/index">Liste</a>
    <a href="{{path}}client/create/{{client.id}}">Ajouter</a>
    <a href="{{path}}client/edit/{{client.id}}">Modifier</a>
</div>

<table>
    <tr>
        <th>Nom: </th>
        <td>{{ client.name }}</td>
    </tr>
    <tr>
        <th>Contact: </th>
        <td>{{ client.address }}</td>
    </tr>
    <tr>
        <th>Adresse: </th>
        <td>{{ client.email }}</td>
    </tr>
    <tr>
        <th>Code Postal: </th>
        <td>{{ client.postal_code }}</td>
    </tr>
    <tr>
        <th>Courriel: </th>
        <td>{{ client.email }}</td>
    </tr>
    <tr>
        <th>Téléphone: </th>
        <td>{{ client.phone }}</td>
    </tr>
    <tr>
        <th>Ville: </th>
        <td>{{ city }}</td>
    </tr>
</table>




</body>

</html>