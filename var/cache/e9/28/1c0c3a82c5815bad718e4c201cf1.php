<?php

/* __skeleton/header.twig */
class __TwigTemplate_e9281c0c3a82c5815bad718e4c201cf1 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <title>";
        // line 5
        if (isset($context["current_page"])) { $_current_page_ = $context["current_page"]; } else { $_current_page_ = null; }
        echo twig_escape_filter($this->env, $_current_page_, "html", null, true);
        echo " | ";
        if (isset($context["website_title"])) { $_website_title_ = $context["website_title"]; } else { $_website_title_ = null; }
        echo twig_escape_filter($this->env, $_website_title_, "html", null, true);
        echo "</title>
";
        // line 6
        if (isset($context["css"])) { $_css_ = $context["css"]; } else { $_css_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_css_);
        foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
            // line 7
            echo "<link type=\"text/css\" rel=\"stylesheet\" media=\"screen\" href=\"";
            if (isset($context["source"])) { $_source_ = $context["source"]; } else { $_source_ = null; }
            echo twig_escape_filter($this->env, $_source_, "html", null, true);
            echo "\"></link>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 9
        if (isset($context["js"])) { $_js_ = $context["js"]; } else { $_js_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_js_);
        foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
            // line 10
            echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
            if (isset($context["source"])) { $_source_ = $context["source"]; } else { $_source_ = null; }
            echo twig_escape_filter($this->env, $_source_, "html", null, true);
            echo "\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "</head>
<body>
<div id=\"wrapper\">
<header>
\t<div id=\"header_img\">
\t\t<a href=\"";
        // line 17
        if (isset($context["website_url"])) { $_website_url_ = $context["website_url"]; } else { $_website_url_ = null; }
        echo twig_escape_filter($this->env, $_website_url_, "html", null, true);
        echo "\">
\t\t\t<img src=\"http://localhost/~ced/Skin-Bones/assets/images/logo.png\"/>
\t\t</a>
\t</div>
\t<div id=\"top_menu\">
\t\t\t";
        // line 22
        $this->env->loadTemplate("__skeleton/menu.twig")->display($context);
        // line 23
        echo "\t</div>
\t<div id=\"loginout\">
\t";
        // line 25
        if (isset($context["logout"])) { $_logout_ = $context["logout"]; } else { $_logout_ = null; }
        if (($_logout_ == "true")) {
            // line 26
            echo "\t<a href=\"";
            if (isset($context["logout_link"])) { $_logout_link_ = $context["logout_link"]; } else { $_logout_link_ = null; }
            echo twig_escape_filter($this->env, $_logout_link_, "html", null, true);
            echo "\">logout</a>
\t";
        }
        // line 28
        echo "\t";
        if (isset($context["login"])) { $_login_ = $context["login"]; } else { $_login_ = null; }
        if (($_login_ == "true")) {
            // line 29
            echo "\t<a href=\"";
            if (isset($context["login_link"])) { $_login_link_ = $context["login_link"]; } else { $_login_link_ = null; }
            echo twig_escape_filter($this->env, $_login_link_, "html", null, true);
            echo "\">login</a>
\t";
        }
        // line 31
        echo "\t</div>
\t<hr/>
</header>";
    }

    public function getTemplateName()
    {
        return "__skeleton/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
