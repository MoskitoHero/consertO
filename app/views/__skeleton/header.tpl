<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{current_page}} | {{website_title}}</title>
{% for source in css %}
<link type="text/css" rel="stylesheet" media="screen" href="{{source}}"></link>
{% endfor %}
{% for source in js %}
<script type="text/javascript" charset="utf-8" src="{{source}}"></script>
{% endfor %}
</head>
<body>
<div id="wrapper">
<header>
	<div id="header_img">
		<a href="{{website_url}}">
			<img src="http://localhost/~ced/Skin-Bones/assets/images/skin-bones-header-logo.png"/>
		</a>
	</div>
	<div id="menu">
		{% for m in menu %}
		<a href="{{website_url}}{{m.link}}">{{m.name}}</a>
		{% endfor %}
	</div>
	<div id="loginout">
	{% if logout == "true" %}
	<a href="{{logout_link}}">logout</a>
	{% endif %}
	{% if login == "true" %}
	<a href="{{login_link}}">login</a>
	{% endif %}
	</div>
	<hr/>
</header>