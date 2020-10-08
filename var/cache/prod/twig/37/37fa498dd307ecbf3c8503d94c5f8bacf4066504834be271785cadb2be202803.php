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

/* qrcode/success.html.twig */
class __TwigTemplate_ed502f2065c33e4ced8aad178f45161ce08ea5add9409a3b9bd0b08307fc466d extends Template
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
        echo "<style>
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
</style>
<table>
    <tr>
        <th> PK_ID</th>
        <th> FK_User_ID</th>
        <th> Date</th>
        <th> TEXT</th>
    </tr>
    <br>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 19
            echo "        <tr>
            <td> ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getID", [], "any", false, false, false, 20), "html", null, true);
            echo " </td>
            <td> ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getFKUserID", [], "any", false, false, false, 21), "html", null, true);
            echo " </td>
            <td> ";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["menu"], "getScannDatum", [], "method", false, false, false, 22), "format", [0 => "d-M-Y"], "method", false, false, false, 22), "html", null, true);
            echo " </td>
            <td> ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "Klartext", [], "any", false, false, false, 23), "html", null, true);
            echo " </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "qrcode/success.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 26,  75 => 23,  71 => 22,  67 => 21,  63 => 20,  60 => 19,  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "qrcode/success.html.twig", "C:\\xampp\\htdocs\\backend\\templates\\qrcode\\success.html.twig");
    }
}
