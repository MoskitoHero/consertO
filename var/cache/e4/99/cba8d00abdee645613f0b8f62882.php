<?php

/* __skeleton/menu.twig */
class __TwigTemplate_e499cba8d00abdee645613f0b8f62882 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul class=\"menu_main\">
";
        // line 2
        if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
        if ($this->getAttribute($_menu_, "default")) {
            // line 3
            echo "\t";
            if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_menu_, "default"));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 4
                echo "\t\t<li><a href=\"";
                if (isset($context["website_url"])) { $_website_url_ = $context["website_url"]; } else { $_website_url_ = null; }
                echo twig_escape_filter($this->env, $_website_url_, "html", null, true);
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "link"), "html", null, true);
                echo "\" class=\"";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "class"), "html", null, true);
                echo "\">";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "name"), "html", null, true);
                echo "</a></li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 7
        if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
        if ($this->getAttribute($_menu_, "root")) {
            // line 8
            echo "\t";
            if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_menu_, "root"));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 9
                echo "\t\t<li><a href=\"";
                if (isset($context["website_url"])) { $_website_url_ = $context["website_url"]; } else { $_website_url_ = null; }
                echo twig_escape_filter($this->env, $_website_url_, "html", null, true);
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "link"), "html", null, true);
                echo "\" class=\"";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "class"), "html", null, true);
                echo "\">";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "name"), "html", null, true);
                echo "</a></li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 12
        echo "</ul>
<ul class=\"menu_vip\">
";
        // line 14
        if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
        if ($this->getAttribute($_menu_, "vip")) {
            // line 15
            echo "\t";
            if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_menu_, "vip"));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 16
                echo "\t\t<li><a href=\"";
                if (isset($context["website_url"])) { $_website_url_ = $context["website_url"]; } else { $_website_url_ = null; }
                echo twig_escape_filter($this->env, $_website_url_, "html", null, true);
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "link"), "html", null, true);
                echo "\" class=\"";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "class"), "html", null, true);
                echo "\">";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "name"), "html", null, true);
                echo "</a></li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 19
        echo "</ul>
<ul class=\"menu_admin\">
";
        // line 21
        if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
        if ($this->getAttribute($_menu_, "admin")) {
            // line 22
            echo "\t";
            if (isset($context["menu"])) { $_menu_ = $context["menu"]; } else { $_menu_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_menu_, "admin"));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 23
                echo "\t\t<li><a href=\"";
                if (isset($context["website_url"])) { $_website_url_ = $context["website_url"]; } else { $_website_url_ = null; }
                echo twig_escape_filter($this->env, $_website_url_, "html", null, true);
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "link"), "html", null, true);
                echo "\" class=\"";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "class"), "html", null, true);
                echo "\">";
                if (isset($context["m"])) { $_m_ = $context["m"]; } else { $_m_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_m_, "name"), "html", null, true);
                echo "</a></li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        }
        // line 26
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "__skeleton/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
