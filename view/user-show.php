{{ include('header.php', {title: 'User'})}}
<a href="{{path}}user/edit/{{user.id}}">Modifier user</a>

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
        <td>{{ user.privilege_id }}</td>
    </tr>

</table>
</body>

</html>