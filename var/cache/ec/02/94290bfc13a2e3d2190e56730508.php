<?php

/* admin/blog/view.twig */
class __TwigTemplate_ec0294290bfc13a2e3d2190e56730508 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>";
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_article_, "title"), "html", null, true);
        echo "</h1>
<info>
\tBy <em>";
        // line 3
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_article_, "author"), "html", null, true);
        echo "</em>, on <em>";
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_article_, "date"), "html", null, true);
        echo "</em> <br/>
\t<a href=\"";
        // line 4
        if (isset($context["edit_url"])) { $_edit_url_ = $context["edit_url"]; } else { $_edit_url_ = null; }
        echo twig_escape_filter($this->env, $_edit_url_, "html", null, true);
        echo "\">Edit</a> - <a href=\"";
        if (isset($context["delete_url"])) { $_delete_url_ = $context["delete_url"]; } else { $_delete_url_ = null; }
        echo twig_escape_filter($this->env, $_delete_url_, "html", null, true);
        echo "\" onclick=\"return confirm('Are you sure you want to delete \\’";
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_article_, "title"), "html", null, true);
        echo "\\'?')\">Delete</a> - <a href=\"";
        if (isset($context["add_url"])) { $_add_url_ = $context["add_url"]; } else { $_add_url_ = null; }
        echo twig_escape_filter($this->env, $_add_url_, "html", null, true);
        echo "\">Add New</a>
</info>
<article>";
        // line 6
        if (isset($context["article"])) { $_article_ = $context["article"]; } else { $_article_ = null; }
        echo $this->getAttribute($_article_, "content");
        echo "</article>";
    }

    public function getTemplateName()
    {
        return "admin/blog/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
