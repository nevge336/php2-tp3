{{ include('header.php', {title: 'Inscription'})}}

<section class="flex-column">
    <div>
        {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
        {% endif %}
        <form action="{{path}}user/store" method="post">
            <label>Nom
                <input type="text" name="name" value="{{data.name}}">
            </label>
            <label>Username
                <input type="email" name="username" value="{{data.username}}">
            </label>
            <label>Password
                <input type="password" name="password" value="{{data.password}}">
            </label>

            <label>

                Privilege
                <select name="privilege_id">
                    {% for privilege in privileges %}
                    <option value="{{privilege.id}}" {% if  privilege.id == data.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
                    {% endfor%}
                </select>

            </label>
            <input type="submit" value="Save">
        </form>



    </div>





</section>

{{ include('footer.php') }}