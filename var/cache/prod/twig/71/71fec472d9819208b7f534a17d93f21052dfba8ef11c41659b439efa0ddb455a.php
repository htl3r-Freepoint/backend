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

/* user/failed.html.twig */
class __TwigTemplate_eddc4abdd7911014440a24ed456db20ec2d6809fa3bb8ec5a9b4c8e6e31ed6ea extends Template
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
        echo twig_escape_filter($this->env, ($context["mail"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "user/failed.html.twig";
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
        return new Source("", "user/failed.html.twig", "C:\\xampp\\htdocs\\backend\\templates\\user\\failed.html.twig");
    }
}
