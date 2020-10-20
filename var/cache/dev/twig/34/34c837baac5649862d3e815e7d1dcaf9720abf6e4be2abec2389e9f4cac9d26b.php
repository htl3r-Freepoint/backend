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
class __TwigTemplate_a272ffadc0a1cf12c3828421ebb164f97ca8ea30f50f174e60f9342c736ca884 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "qrcode/success.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "qrcode/success.html.twig"));

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
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 18, $this->source); })()));
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
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

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
        return array (  90 => 26,  81 => 23,  77 => 22,  73 => 21,  69 => 20,  66 => 19,  62 => 18,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
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
    {% for menu in menus %}
        <tr>
            <td> {{ menu.getID }} </td>
            <td> {{ menu.getFKUserID }} </td>
            <td> {{ menu.getScannDatum().format(\"d-M-Y\") }} </td>
            <td> {{ menu.Klartext }} </td>
        </tr>
    {% endfor %}
</table>", "qrcode/success.html.twig", "C:\\xampp\\htdocs\\backend\\templates\\qrcode\\success.html.twig");
    }
}
