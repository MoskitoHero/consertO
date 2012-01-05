<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{module}} | {{website_title}}</title>
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
	<div>
	<img src="http://localhost/~ced/Skin-Bones/assets/images/skin-bones-header-logo.png"/>
	</div>
	<div id="menu">
		{% if logout == "true" %}
		<a href="{{logout_link}}">logout</a>
		{% endif %}
		{% if login == "true" %}
		<a href="{{login_link}}">login</a>
		{% endif %}
	</div>
</header>
<div id="main">