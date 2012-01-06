{% import "__helpers/form.helper.html" as form %}

<div id="login" class="rounded-corners-10"><form action="{{form_url}}" method="POST">
<dl>
    <dt>Username</dt>
    <dd>{{ form.input('username') }}</dd>
    <dt>Password</dt>
    <dd>{{ form.input('pass', null, 'password') }}</dd>
    <dd>{{ form.input('submit', 'login', 'submit') }}</dd>
</dl>
</form>
<div>No account? {{register_link|raw}}</div>
</div>