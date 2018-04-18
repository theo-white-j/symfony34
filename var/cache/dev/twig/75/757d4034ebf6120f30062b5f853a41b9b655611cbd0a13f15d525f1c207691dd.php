<?php

/* WTGalerieBundle:Galerie:view.html.twig */
class __TwigTemplate_90ff0094fade98aebf8bcb6b0cabad3e63379b7583aaf43a46fc8d87f63751b4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("WTGalerieBundle::layout.html.twig", "WTGalerieBundle:Galerie:view.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'wtgalerie_body' => array($this, 'block_wtgalerie_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WTGalerieBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WTGalerieBundle:Galerie:view.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WTGalerieBundle:Galerie:view.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "  Galerie: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 4, $this->source); })()), "name", array()), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_wtgalerie_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "wtgalerie_body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "wtgalerie_body"));

        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\DumpExtension']->dump($this->env, $context, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 8, $this->source); })()));
        echo "
  <h2>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 9, $this->source); })()), "name", array()), "html", null, true);
        echo "</h2>
  <i>
      crée le ";
        // line 11
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 11, $this->source); })()), "creationdate", array()), "d/m/Y"), "html", null, true);
        echo ",  par ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 11, $this->source); })()), "owner", array()), "username", array()), "html", null, true);
        echo "
      ";
        // line 12
        if ((twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 12, $this->source); })()), "creationdate", array()) != twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 12, $this->source); })()), "editiondate", array()))) {
            // line 13
            echo "        ,  édité le ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 13, $this->source); })()), "editiondate", array()), "d/m/Y"), "html", null, true);
            echo "
      ";
        }
        // line 15
        echo "  </i>

  <div class=\"well\">
";
        // line 19
        echo "    ";
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["galItems"]) || array_key_exists("galItems", $context) ? $context["galItems"] : (function () { throw new Twig_Error_Runtime('Variable "galItems" does not exist.', 19, $this->source); })()), "empty", array())) {
            // line 20
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["galItems"]) || array_key_exists("galItems", $context) ? $context["galItems"] : (function () { throw new Twig_Error_Runtime('Variable "galItems" does not exist.', 20, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["galItem"]) {
                // line 21
                echo $this->extensions['Symfony\Bridge\Twig\Extension\DumpExtension']->dump($this->env, $context, $context["galItem"]);
                echo "
        <div>
          <p>";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "name", array()), "html", null, true);
                echo "</p>
          <p>";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "info", array()), "html", null, true);
                echo "</p>
          <p>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "type", array()), "html", null, true);
                echo "</p>
          <p>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "url", array()), "html", null, true);
                echo "</p>
          <p>";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "path", array()), "html", null, true);
                echo "</p>
          <p>";
                // line 28
                if ((twig_get_attribute($this->env, $this->source, $context["galItem"], "creationdate", array()) == twig_get_attribute($this->env, $this->source, $context["galItem"], "editiondate", array()))) {
                    // line 29
                    echo "              crée le ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "creationdate", array()), "d/m/Y"), "html", null, true);
                    echo "
            ";
                } else {
                    // line 31
                    echo "              édité le ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["galItem"], "editiondate", array()), "d/m/Y"), "html", null, true);
                    echo "
            ";
                }
                // line 33
                echo "          </p>
          ";
                // line 35
                echo "        </div>


          
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['galItem'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "    ";
        }
        // line 41
        echo "    
  </div>



  <p>
    <a href=\"";
        // line 47
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wt_galerie_home");
        echo "\" class=\"btn btn-default\">
      <i class=\"glyphicon glyphicon-chevron-left\"></i>
      Retour à la liste
    </a>
    <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wt_galerie_edit", array("id" => twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 51, $this->source); })()), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-default\">
      <i class=\"glyphicon glyphicon-edit\"></i>
      Modifier la galerie
    </a>
    <a href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wt_galerie_delete", array("id" => twig_get_attribute($this->env, $this->source, (isset($context["galerie"]) || array_key_exists("galerie", $context) ? $context["galerie"] : (function () { throw new Twig_Error_Runtime('Variable "galerie" does not exist.', 55, $this->source); })()), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-danger\">
      <i class=\"glyphicon glyphicon-trash\"></i>
      Supprimer la galerie
    </a>
  </p>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "WTGalerieBundle:Galerie:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 55,  184 => 51,  177 => 47,  169 => 41,  166 => 40,  156 => 35,  153 => 33,  147 => 31,  141 => 29,  139 => 28,  135 => 27,  131 => 26,  127 => 25,  123 => 24,  119 => 23,  114 => 21,  109 => 20,  106 => 19,  101 => 15,  95 => 13,  93 => 12,  87 => 11,  82 => 9,  78 => 8,  69 => 7,  54 => 4,  45 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"WTGalerieBundle::layout.html.twig\" %}

{% block title %}
  Galerie: {{galerie.name}} - {{ parent() }}
{% endblock %}

{% block wtgalerie_body %}
{{ dump(galerie) }}
  <h2>{{ galerie.name }}</h2>
  <i>
      crée le {{ galerie.creationdate|date('d/m/Y') }},  par {{ galerie.owner.username }}
      {% if galerie.creationdate != galerie.editiondate %}
        ,  édité le {{ galerie.editiondate|date('d/m/Y') }}
      {% endif %}
  </i>

  <div class=\"well\">
{# {{ dump(galerie.getGalerieitems().first ) }} #}
    {% if not galItems.empty %}
      {% for galItem in galItems %}
{{ dump(galItem) }}
        <div>
          <p>{{galItem.name}}</p>
          <p>{{galItem.info}}</p>
          <p>{{galItem.type}}</p>
          <p>{{galItem.url}}</p>
          <p>{{galItem.path}}</p>
          <p>{% if  galItem.creationdate ==  galItem.editiondate %}
              crée le {{ galItem.creationdate|date('d/m/Y') }}
            {% else %}
              édité le {{ galItem.editiondate|date('d/m/Y') }}
            {% endif %}
          </p>
          {# {% if not loop.last %}, {% endif %} #}
        </div>


          
      {% endfor %}
    {% endif %}
    
  </div>



  <p>
    <a href=\"{{ path('wt_galerie_home') }}\" class=\"btn btn-default\">
      <i class=\"glyphicon glyphicon-chevron-left\"></i>
      Retour à la liste
    </a>
    <a href=\"{{ path('wt_galerie_edit', {'id': galerie.id}) }}\" class=\"btn btn-default\">
      <i class=\"glyphicon glyphicon-edit\"></i>
      Modifier la galerie
    </a>
    <a href=\"{{ path('wt_galerie_delete', {'id': galerie.id}) }}\" class=\"btn btn-danger\">
      <i class=\"glyphicon glyphicon-trash\"></i>
      Supprimer la galerie
    </a>
  </p>

{% endblock %}", "WTGalerieBundle:Galerie:view.html.twig", "/var/www/html/whitetheo/src/WT/GalerieBundle/Resources/views/Galerie/view.html.twig");
    }
}
