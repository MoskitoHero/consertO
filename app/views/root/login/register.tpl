{% import "__helpers/form.helper.html" as form %}

<h1>Register Today</h1>
<div id="register" class="rounded-corners-10"><form action="{{form_url}}" method="POST">
<dl>
    <dt>Username</dt>
    <dd>{{ form.input('username') }}</dd>
    <dt>Password</dt>
    <dd>{{ form.input('pass', null, 'password') }}</dd>
	<dd>{{ form.input('pass_confirm', null, 'password') }}</dd>
	<dd>{{ form.input('lvl', 1, 'hidden') }}</dd>
    <dd>{{ form.input('submit', 'login', 'submit') }}</dd>
</dl>
</form>
</div>