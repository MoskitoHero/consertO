<?php

/* root/login/register.twig */
class __TwigTemplate_cc00d5018690845d1627c148c97619ed extends Twig_Template
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
<h1>Register Today</h1>
<div id=\"login\" class=\"rounded-corners-10\"><form action=\"";
        // line 4
        if (isset($context["form_url"])) { $_form_url_ = $context["form_url"]; } else { $_form_url_ = null; }
        echo twig_escape_filter($this->env, $_form_url_, "html", null, true);
        echo "\" method=\"POST\">
<dl>
    <dt>Username</dt>
    <dd>";
        // line 7
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("username", ), "method"), "html", null, true);
        echo "</dd>
    <dt>Password</dt>
    <dd>";
        // line 9
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("pass", null, "password", ), "method"), "html", null, true);
        echo "</dd>
\t<dt>Please confirm your password</dt>
\t<dd>";
        // line 11
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("pass_confirm", null, "password", ), "method"), "html", null, true);
        echo "</dd>
\t<dt>Email</dt>
    <dd>";
        // line 13
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("email", ), "method"), "html", null, true);
        echo "</dd>
\t<dd>";
        // line 14
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("lvl", 1, "hidden", ), "method"), "html", null, true);
        echo "</dd>
    <dd>";
        // line 15
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "input", array("submit", "register", "submit", ), "method"), "html", null, true);
        echo "</dd>
</dl>
</form>
</div>";
    }

    public function getTemplateName()
    {
        return "root/login/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
