{% for b in blogs %}
<h1>{{b.title}}</h1>
<metadata>By <em>{{b.author}}</em>, on <em>{{b.date}}</em> </metadata>
<article>{{b.article}}</article>
{% endfor %}