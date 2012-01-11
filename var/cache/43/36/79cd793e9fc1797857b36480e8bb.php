<?php

/* __skeleton/sidebar.twig */
class __TwigTemplate_433679cd793e9fc1797857b36480e8bb extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (isset($context["display_sidebar"])) { $_display_sidebar_ = $context["display_sidebar"]; } else { $_display_sidebar_ = null; }
        if ($_display_sidebar_) {
            // line 2
            echo "<div id=\"sidebar\">
<div style=\"text-align:center\"><img src=\"http://localhost/~ced/Skin-Bones/assets/images/cidebar.png\"/></div>
";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('project')->showSidebar(), "html", null, true);
            echo "
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "__skeleton/sidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
