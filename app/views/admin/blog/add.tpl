{% import "__helpers/form.helper.html" as form %}

<div id="composer" class="rounded-corners-10">
<form action="{{form_url}}" method="POST">
<dl>
    <dt>Title</dt>
    <dd>{{ form.input('title') }}</dd>
    <dt>By</dt>
    <dd>{{ form.input('author') }}</dd>
    <dt>Date</dt>
    <dd>{{ form.input('date') }}</dd>
    <dt>Content</dt>
    <dd>{{ form.textarea('content') }}</dd>
    <dd>{{ form.input('submit', 'save', 'submit') }} {{ form.input('save_exit', 'save & exit', 'submit') }}</dd>
</dl>
</form>
</div>