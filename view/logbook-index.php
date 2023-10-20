{{ include('header.php', {title: 'Logbook'})}}



{% for logbook in logbooks %}
<ul>
    <li>Username : {{ logbook.username }}</li>
    <li>Date : {{ logbook.date }}</li>
    <li>Adresse IP : {{ logbook.ip_address }}</li>
    <li>Pages visitées : {{ logbook.visited_url }}</li>
</ul>
<hr>

{% endfor %}

</table>
</body>

</html>