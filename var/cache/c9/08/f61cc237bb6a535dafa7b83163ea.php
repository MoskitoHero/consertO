<?php

/* admin/blog/edit.twig */
class __TwigTemplate_c908f61cc237bb6a535dafa7b83163ea extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["form"] = $this->env->loadTemplate("__helpers/form.helper.html");
        // line 2
        echo "
<div id=\"composer\" class=\"rounded-corners-10\">
<form action=\"";
        // line 4
        if (isset($context["form_url"])) { $_form_url_ = $context["form_url"]; } else { $_form_url_ = null; }
        echo twig_escape_filter($this->env, $_form_url_, "html", null, true);
        echo "\" method=\"POST\">
<dl>
    <dt>Title</dt>
    <dd>";
        // line 7
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("title", $this->getAttribute($_article_, "title"), ), "method"), "html", null, true);
        echo "</dd>
    <dt>By</dt>
    <dd>";
        // line 9
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("author", $this->getAttribute($_article_, "author"), ), "method"), "html", null, true);
        echo "</dd>
    <dt>Date</dt>
    <dd>";
        // line 11
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("date", $this->getAttribute($_article_, "date"), ), "method"), "html", null, true);
        echo "</dd>
    <dt>Content</dt>
    <dd>";
        // line 13
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "textarea", array("content", $this->getAttribute($_article_, "content"), null, "editor", ), "method"), "html", null, true);
        echo "</dd>
    <dd>";
        // line 14
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("submit", "save", "submit", ), "method"), "html", null, true);
        echo " ";
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("save_exit", "save & exit", "submit", ), "method"), "html", null, true);
        echo "</dd>
</dl>
";
        // line 16
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("id", $this->getAttribute($_article_, "id"), "hidden", ), "method"), "html", null, true);
        echo "
</form>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/blog/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
