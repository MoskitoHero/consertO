{% for b in blogs %}
<h1>{{b.title}}</h1>
<info>
	By <em>{{b.author}}</em>, on <em>{{b.date}}</em> <br/>
	<a href="{{b.edit_url}}">Edit</a> - <a href="{{b.delete_url}}">Delete</a> - <a href="{{add_url}}">Add New</a>
</info>
<article>{{b.article}}</article>
{% endfor %}