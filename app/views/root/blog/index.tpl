<div class="blog_index">
{% for b in blogs %}
<div class="blog_article">
<h1><a href="{{b.lnk}}">{{b.title}}</a></h1>
<metadata>By <em>{{b.author}}</em>, on <em>{{b.date}}</em> </metadata>
<article>{{b.content|raw}}</article>
</div>
{% endfor %}
</div>
{{ pagination|raw }}