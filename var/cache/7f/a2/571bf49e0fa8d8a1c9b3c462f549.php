<?php

/* __skeleton/footer.twig */
class __TwigTemplate_7fa2571bf49e0fa8d8a1c9b3c462f549 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "</div>
";
        // line 2
        $this->env->loadTemplate("__skeleton/sidebar.twig")->display($context);
        // line 3
        echo "\t\t<hr/>
        <footer>
                <p>Copyright ";
        // line 5
        if (isset($context["date"])) { $_date_ = $context["date"]; } else { $_date_ = null; }
        echo twig_escape_filter($this->env, $_date_, "html", null, true);
        echo " <a href=\"";
        if (isset($context["copyright_holder_url"])) { $_copyright_holder_url_ = $context["copyright_holder_url"]; } else { $_copyright_holder_url_ = null; }
        echo twig_escape_filter($this->env, $_copyright_holder_url_, "html", null, true);
        echo "\">";
        if (isset($context["copyright_holder"])) { $_copyright_holder_ = $context["copyright_holder"]; } else { $_copyright_holder_ = null; }
        echo twig_escape_filter($this->env, $_copyright_holder_, "html", null, true);
        echo "</a></p>
        </footer>
</div id=\"wrapper\">
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "__skeleton/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
