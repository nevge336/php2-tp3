{{ include('header.php', {title: 'Client'})}}

    <p><strong>Nom : </strong>{{ client.nom }}</p>
    <p><strong>Adresse : </strong>{{ client.adresse }}</p>
    <p><strong>Courriel : </strong>{{ client.courriel }}</p>
    <p><strong>Phone : </strong>{{ client.phone }}</p>
    <p><strong>Ville : </strong>{{ ville }}</p>
    <a href="{{path}}client/edit/{{client.id}}">Mise à jour</a>
</body>
</html>