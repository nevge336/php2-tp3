{{ include('header.php', {title: 'User'})}}
<div class="sous-menu">
    <a href="{{path}}user/index">Liste</a>
    <a href="{{path}}user/create/{{user.id}}">Ajouter</a>
    <a href="{{path}}user/edit/{{user.id}}">Modifier</a>
</div>

<table>
    <tr>
        <th>Nom: </th>
        <td>{{ user.name }}</td>
    </tr>
    <tr>
        <th>Username: </th>
        <td>{{ user.username }}</td>
    </tr>
    <tr>
        <th>Privilege: </th>
        <td>{{ privilege }}</td>
    </tr>

</table>
</body>

</html>