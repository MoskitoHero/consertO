<?php

/* root/default/index.twig */
class __TwigTemplate_70f841384c62126bc75de1a2eb53134e extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Welcome to the consertO Framework !</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h1>Disclaimer: This is personal stuff</h1>
<p>This is a personal attempt at creating a PHP MVC Framework for my personal use, on small websites and blogs for clients.</p>
<p>It is also an attempt at understanding better how this whole stuff works, by creating my own.</p>
<p>Don't use this in production. Or do. But you're warned. Feel feel to fork on <a href=\"https://github.com/jmjlouis/consertO\">GitHub</a>, and all !</p>
<p>&nbsp;</p>
<h1>Documentation</h1>
<p>When this framework gets stable and secure enough, I'll write something down as a quick documentation, if anyone's interested.</p>
<p>I'm using Redbean to get rid of the hassle of the database modelling. If I want more control over my models, I'll switch to a proper mainstream PHP framework.</p>
<p>&nbsp;</p>
<h1>Uses</h1>
<p>This tiny PHP MVC Framework uses <a href=\"http://redbeanphp.com/\" target=\"_blank\">RedBeanPHP</a>, <a href=\"http://twig.sensiolabs.org/\" target=\"_blank\">Twig</a> and <a href=\"http://symfony.com/\" target=\"_blank\">some Symfony2 code</a> as libraries.</p>";
    }

    public function getTemplateName()
    {
        return "root/default/index.twig";
    }

    public function isTraitable()
    {
        return true;
    }
}
