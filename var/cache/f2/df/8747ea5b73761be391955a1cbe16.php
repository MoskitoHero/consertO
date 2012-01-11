<?php

/* __skeleton/notice.twig */
class __TwigTemplate_f2df8747ea5b73761be391955a1cbe16 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (isset($context["notice"])) { $_notice_ = $context["notice"]; } else { $_notice_ = null; }
        if ($_notice_) {
            // line 2
            echo "<div id=\"notice\" class=\"rounded-corners-5\">";
            if (isset($context["notice"])) { $_notice_ = $context["notice"]; } else { $_notice_ = null; }
            echo $_notice_;
            echo "</div>
";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->eraseNotice(), "html", null, true);
            echo "
";
        }
        // line 5
        echo "<div id=\"main\">";
    }

    public function getTemplateName()
    {
        return "__skeleton/notice.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
