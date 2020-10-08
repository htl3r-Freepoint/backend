<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* qrcode/failed.html.twig */
class __TwigTemplate_c1876115a04b278559bdb855831e29b275ada101aa1f814e5aab6b62090e4966 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "Failed to insert QR-Code: ";
        echo twig_escape_filter($this->env, ($context["code"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "qrcode/failed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "qrcode/failed.html.twig", "C:\\xampp\\htdocs\\backend\\templates\\qrcode\\failed.html.twig");
    }
}
