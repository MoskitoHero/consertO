<?php

/* admin/blog/index.twig */
class __TwigTemplate_d3fde8d5014d3b1db26593a117a9ed3e extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"blog_index\">
";
        // line 2
        if (isset($context["blogs"])) { $_blogs_ = $context["blogs"]; } else { $_blogs_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_blogs_);
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 3
            echo "<div class=\"blog_article\">
<h1><a href=\"";
            // line 4
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "view_url"), "html", null, true);
            echo "\">";
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "title"), "html", null, true);
            echo "</a></h1>
<info>
\tBy <em>";
            // line 6
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "author"), "html", null, true);
            echo "</em>, on <em>";
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "date"), "html", null, true);
            echo "</em> <br/>
\t<a href=\"";
            // line 7
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "edit_url"), "html", null, true);
            echo "\">Edit</a> - <a href=\"";
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "delete_url"), "html", null, true);
            echo "\" onclick=\"return confirm('Are you sure you want to delete \\'";
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_b_, "title"), "html", null, true);
            echo "\\'?')\">Delete</a> - <a href=\"";
            if (isset($context["add_url"])) { $_add_url_ = $context["add_url"]; } else { $_add_url_ = null; }
            echo twig_escape_filter($this->env, $_add_url_, "html", null, true);
            echo "\">Add New</a>
</info>
<article>";
            // line 9
            if (isset($context["b"])) { $_b_ = $context["b"]; } else { $_b_ = null; }
            echo $this->getAttribute($_b_, "content");
            echo "</article>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "</div>
";
        // line 13
        if (isset($context["pagination"])) { $_pagination_ = $context["pagination"]; } else { $_pagination_ = null; }
        echo $_pagination_;
    }

    public function getTemplateName()
    {
        return "admin/blog/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
