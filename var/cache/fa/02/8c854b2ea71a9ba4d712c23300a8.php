<?php

/* __helpers/form.helper.html */
class __TwigTemplate_fa028c854b2ea71a9ba4d712c23300a8 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
    }

    // line 1
    public function getinput($name = null, $value = null, $type = null, $size = null)
    {
        $context = array_merge($this->env->getGlobals(), array(
            "name" => $name,
            "value" => $value,
            "type" => $type,
            "size" => $size,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <input type=\"";
            if (isset($context["type"])) { $_type_ = $context["type"]; } else { $_type_ = null; }
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter($_type_, "text")) : ("text")), "html", null, true);
            echo "\" name=\"";
            if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
            echo twig_escape_filter($this->env, $_name_, "html", null, true);
            echo "\" value=\"";
            if (isset($context["value"])) { $_value_ = $context["value"]; } else { $_value_ = null; }
            echo twig_escape_filter($this->env, $_value_);
            echo "\" size=\"";
            if (isset($context["size"])) { $_size_ = $context["size"]; } else { $_size_ = null; }
            echo twig_escape_filter($this->env, ((array_key_exists("size", $context)) ? (_twig_default_filter($_size_, 20)) : (20)), "html", null, true);
            echo "\" class=\"input_";
            if (isset($context["type"])) { $_type_ = $context["type"]; } else { $_type_ = null; }
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter($_type_, "text")) : ("text")), "html", null, true);
            echo "\"/>
";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    // line 4
    public function gettextarea($name = null, $value = null, $col = null)
    {
        $context = array_merge($this->env->getGlobals(), array(
            "name" => $name,
            "value" => $value,
            "col" => $col,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 5
            echo "    <textarea name=\"";
            if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
            echo twig_escape_filter($this->env, $_name_, "html", null, true);
            echo "\" cols=\"";
            if (isset($context["size"])) { $_size_ = $context["size"]; } else { $_size_ = null; }
            echo twig_escape_filter($this->env, ((array_key_exists("size", $context)) ? (_twig_default_filter($_size_, 100)) : (100)), "html", null, true);
            echo "\" class=\"textarea\">";
            if (isset($context["value"])) { $_value_ = $context["value"]; } else { $_value_ = null; }
            echo twig_escape_filter($this->env, $_value_);
            echo "</textarea>
";
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "__helpers/form.helper.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
