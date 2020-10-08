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

/* qrcode/newForm.html.twig */
class __TwigTemplate_d467e314e239c811efeb2099a666750fb41bf0a97d44be63d8b9bfb1bf3a6def extends Template
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
        // line 2
        echo "
";
        // line 4
        echo "
";
        // line 6
        echo "
";
        // line 8
        echo "
";
        // line 10
        echo "
";
        // line 11
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form');
    }

    public function getTemplateName()
    {
        return "qrcode/newForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  49 => 10,  46 => 8,  43 => 6,  40 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "qrcode/newForm.html.twig", "C:\\xampp\\htdocs\\backend\\templates\\qrcode\\newForm.html.twig");
    }
}
