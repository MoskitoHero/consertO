<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{website_title}}</title>
{% for item in css %}
<link type="text/css" rel="stylesheet" media="screen" href="{{item}}"></link>
{% endfor %}
{% for item in js %}
<script type="text/javascript" charset="utf-8" src="{{item}}"></script>
{% endfor %}
</head>
<body>
<header>Header of {{website_title}}</header>