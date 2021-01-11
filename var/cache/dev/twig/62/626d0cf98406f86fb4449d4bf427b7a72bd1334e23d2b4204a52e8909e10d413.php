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

/* user/Userprofile.html.twig */
class __TwigTemplate_2fcea686e7b06ed18f27b2e7730037ea7df7052d48cedfbd65b41b98c342db9f extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/Userprofile.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/Userprofile.html.twig"));

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
        <th> Id</th>
        <th> Username</th>
        <th> Email</th>
        <th> Vorname</th>
        <th> Nachname</th>
        <th> Passwort</th>
    </tr>
    <br>
    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 21
            echo "        <tr>
            <td> ";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getID", [], "any", false, false, false, 22), "html", null, true);
            echo " </td>
            <td> ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getUsername", [], "any", false, false, false, 23), "html", null, true);
            echo " </td>
            <td> ";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getEmail", [], "any", false, false, false, 24), "html", null, true);
            echo " </td>
            <td> ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getVorname", [], "any", false, false, false, 25), "html", null, true);
            echo " </td>
            <td> ";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "getNachname", [], "any", false, false, false, 26), "html", null, true);
            echo " </td>
            <td>NONONONONONONO</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</table>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "user/Userprofile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 30,  87 => 26,  83 => 25,  79 => 24,  75 => 23,  71 => 22,  68 => 21,  64 => 20,  43 => 1,);
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
        <th> Id</th>
        <th> Username</th>
        <th> Email</th>
        <th> Vorname</th>
        <th> Nachname</th>
        <th> Passwort</th>
    </tr>
    <br>
    {% for menu in menus %}
        <tr>
            <td> {{ menu.getID }} </td>
            <td> {{ menu.getUsername }} </td>
            <td> {{ menu.getEmail }} </td>
            <td> {{ menu.getVorname }} </td>
            <td> {{ menu.getNachname }} </td>
            <td>NONONONONONONO</td>
        </tr>
    {% endfor %}
</table>", "user/Userprofile.html.twig", "C:\\Users\\chris\\Freepoint\\backend\\templates\\user\\Userprofile.html.twig");
    }
}
