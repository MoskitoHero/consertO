<h1>{{article.title}}</h1>
<info>
	By <em>{{article.author}}</em>, on <em>{{article.date}}</em> <br/>
	<a href="{{edit_url}}">Edit</a> - <a href="{{delete_url}}" onclick="return confirm('Are you sure you want to delete \’{{article.title}}\'?')">Delete</a> - <a href="{{add_url}}">Add New</a>
</info>
<article>{{article.content|raw}}</article>