<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{website_title}}</title>
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
	<img src="http://localhost/~ced/Skin-Bones/assets/images/skin-bones-header-logo.png"/>
</header>
<div id="main">