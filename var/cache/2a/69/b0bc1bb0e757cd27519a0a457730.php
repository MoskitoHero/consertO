<?php

/* root/blog/rss.twig.rss */
class __TwigTemplate_2a69b0bc1bb0e757cd27519a0a457730 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
<rss version=\"2.0\">
    <channel>
        <title>My RSS feed</title>
        <link>http://www.mywebsite.com/</link>
        <description>This is an example RSS feed</description>
        <language>en-us</language>
        <copyright>Copyright (C) 2009 mywebsite.com</copyright>
        <item>
            <title>My News Story 3</title>
            <description>This is example news item</description>
            <link>http://www.mywebsite.com/news3.html</link>
            <pubDate>Mon, 23 Feb 2009 09:27:16 +0000</pubDate>
        </item>
        <item>
            <title>My News Story 2</title>
            <description>This is example news item</description>
            <link>http://www.mywebsite.com/news2.html</link>
            <pubDate>Wed, 14 Jan 2009 12:00:00 +0000</pubDate>
        </item>
        <item>
            <title>My News Story 1</title>
            <description>This is example news item</description>
            <link>http://www.mywebsite.com/news1.html</link>
            <pubDate>Wed, 05 Jan 2009 15:57:20 +0000</pubDate>
        </item>
    </channel>
</rss>";
    }

    public function getTemplateName()
    {
        return "root/blog/rss.twig.rss";
    }

    public function isTraitable()
    {
        return true;
    }
}
