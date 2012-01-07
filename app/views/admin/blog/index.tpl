<div class="blog_index">
{% for b in blogs %}
<div class="blog_article">
<h1><a href="{{b.view_url}}">{{b.title}}</a></h1>
<info>
	By <em>{{b.author}}</em>, on <em>{{b.date}}</em> <br/>
	<a href="{{b.edit_url}}">Edit</a> - <a href="{{b.delete_url}}" onclick="return confirm('Are you sure you want to delete \'{{b.title}}\'?')">Delete</a> - <a href="{{add_url}}">Add New</a>
</info>
<article>{{b.content|raw}}</article>
</div>
{% endfor %}
</div>
{{ pagination|raw }}