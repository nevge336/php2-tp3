{{ include('header.php', {title: 'Login'})}}


{% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
{% endif %}
<form action="{{path}}login/auth" method="post">
      
        <label>Username
            <input type="email" name="username" value="{{data.username}}">
        </label>
        <label>Password
            <input type="password" name="password" >
        </label>
        <input type="submit" value="Save">
    </form>

    <img src="{{path}}/../css/img/PXL_20220804_194048489.jpg" alt="">
</body>
</html>