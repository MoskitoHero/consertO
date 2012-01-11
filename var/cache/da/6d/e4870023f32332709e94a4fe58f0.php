<?php

/* root/login/index.twig */
class __TwigTemplate_da6de4870023f32332709e94a4fe58f0 extends Twig_Template
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
<div id=\"login\" class=\"rounded-corners-10\"><form action=\"";
        // line 3
        if (isset($context["form_url"])) { $_form_url_ = $context["form_url"]; } else { $_form_url_ = null; }
        echo twig_escape_filter($this->env, $_form_url_, "html", null, true);
        echo "\" method=\"POST\">
<dl>
    <dt>Username</dt>
    <dd>";
        // line 6
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("username", ), "method"), "html", null, true);
        echo "</dd>
    <dt>Password</dt>
    <dd>";
        // line 8
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("pass", null, "password", ), "method"), "html", null, true);
        echo "</dd>
    <dd>";
        // line 9
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("submit", "login", "submit", ), "method"), "html", null, true);
        echo "</dd>
</dl>
</form>
<div>No account? ";
        // line 12
        if (isset($context["register_link"])) { $_register_link_ = $context["register_link"]; } else { $_register_link_ = null; }
        echo $_register_link_;
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "root/login/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
