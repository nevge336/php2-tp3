{{ include('header.php', {title: 'Liste des users'})}}
<div class="sous-menu">
    <a href="{{path}}user/create/{{user.id}}">Ajouter</a>
</div>
    <table>
        <tr>
            <th>Nom</th>
            <th>Username</th>
            <th>Privilege</th>
        </tr>
      
        {% for user in users %}
                <tr>
                    <td><a href='{{path}}user/show/{{user.id}}'>{{ user.name }}</a></td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.privilege_id }}</td>                  
                </tr>

        {% endfor %}

    </table>
</body>
</html>