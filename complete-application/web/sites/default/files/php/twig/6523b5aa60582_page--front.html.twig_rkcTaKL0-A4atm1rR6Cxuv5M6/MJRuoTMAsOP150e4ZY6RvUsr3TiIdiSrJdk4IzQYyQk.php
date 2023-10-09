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

/* themes/custom/subtheme/templates/page--front.html.twig */
class __TwigTemplate_f84772249b8ccb7ac0cbba2f3ab06821 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@bootstrap_barrio/layout/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 72
        $context["sidebar_first_exists"] =  !twig_test_empty(twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 72), 72, $this->source)), "<img><video><audio><drupal-render-placeholder>")));
        // line 73
        $context["sidebar_second_exists"] =  !twig_test_empty(twig_trim_filter(twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 73), 73, $this->source)), "<img><video><audio><drupal-render-placeholder>")));
        // line 1
        $this->parent = $this->loadTemplate("@bootstrap_barrio/layout/page.html.twig", "themes/custom/subtheme/templates/page--front.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 75
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 76
        echo "        ";
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 76) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 76)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 76))) {
            // line 77
            echo "          <nav";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_top_attributes"] ?? null), 77, $this->source), "html", null, true);
            echo ">
          ";
            // line 78
            if (($context["container_navbar"] ?? null)) {
                // line 79
                echo "          <div class=\"container\">
          ";
            }
            // line 81
            echo "              ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            echo "
              ";
            // line 82
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
            echo "
              ";
            // line 83
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 83)) {
                // line 84
                echo "                <div class=\"form-inline navbar-form float-right\">
                  ";
                // line 85
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                echo "
                </div>
              ";
            }
            // line 88
            echo "          ";
            if (($context["container_navbar"] ?? null)) {
                // line 89
                echo "          </div>
          ";
            }
            // line 91
            echo "          </nav>
        ";
        }
        // line 93
        echo "        <nav";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_attributes"] ?? null), 93, $this->source), "html", null, true);
        echo ">
          ";
        // line 94
        if (($context["container_navbar"] ?? null)) {
            // line 95
            echo "          <div class=\"container\">
          ";
        }
        // line 97
        echo "            ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
        echo "
            ";
        // line 98
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 98) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 98))) {
            // line 99
            echo "              <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingNavbar\" aria-controls=\"CollapsingNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
              <div class=\"collapse navbar-collapse\" id=\"CollapsingNavbar\">
                ";
            // line 101
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
            echo "
                ";
            // line 102
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 102)) {
                // line 103
                echo "                  <div class=\"form-inline navbar-form float-right\">
                    ";
                // line 104
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 104), 104, $this->source), "html", null, true);
                echo "
                  </div>
                ";
            }
            // line 107
            echo "\t          </div>
            ";
        }
        // line 109
        echo "            ";
        if (($context["sidebar_collapse"] ?? null)) {
            // line 110
            echo "              <button class=\"navbar-toggler navbar-toggler-left collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingLeft\" aria-controls=\"CollapsingLeft\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"></button>
            ";
        }
        // line 112
        echo "          ";
        if (($context["container_navbar"] ?? null)) {
            // line 113
            echo "          </div>
          ";
        }
        // line 115
        echo "        </nav>
";
    }

    // line 118
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 119
        echo "        <div id=\"main\" class=\"container-fluid\">
          ";
        // line 120
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
        echo "
          <div class=\"row row-offcanvas row-offcanvas-left clearfix\">
              <main";
        // line 122
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 122, $this->source), "html", null, true);
        echo ">
                <section class=\"section\">
                  <a href=\"#main-content\" id=\"main-content\" tabindex=\"-1\"></a>
                  <div class=\"row\">
                    <div class=\"col col-sm-3 welcome\">
                      <div class=\"sidebar\" style=\"text-align: center;\">
                        <h1 style=\"color: #096324; font-weight: 700;\">Welcome to Changebank</h1>
                        <p><strong>To get started, <a href=\"/user/login\" style=\"color: #096324;\">log in</a> or<br/> <a href=\"/user/login\" style=\"color: #096324;\">create a new account</a>.</strong></p>
                      </div>
                    </div>
                    <div class=\"col col-sm-9\" style=\"height: calc(100vh - 204px); overflow: hidden;\">
                      <img src=\"/sites/default/files/money-new.jpg\" alt=\"Image\" width=\"100%\" height=\"auto\">
                    </div>
                  </div>
                  ";
        // line 137
        echo "                </section>
              </main>
            ";
        // line 139
        if (($context["sidebar_first_exists"] ?? null)) {
            // line 140
            echo "              <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_attributes"] ?? null), 140, $this->source), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 142
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 142), 142, $this->source), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 146
        echo "            ";
        if (($context["sidebar_second_exists"] ?? null)) {
            // line 147
            echo "              <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_attributes"] ?? null), 147, $this->source), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 149
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 149), 149, $this->source), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 153
        echo "          </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 153,  220 => 149,  214 => 147,  211 => 146,  204 => 142,  198 => 140,  196 => 139,  192 => 137,  175 => 122,  170 => 120,  167 => 119,  163 => 118,  158 => 115,  154 => 113,  151 => 112,  147 => 110,  144 => 109,  140 => 107,  134 => 104,  131 => 103,  129 => 102,  125 => 101,  121 => 99,  119 => 98,  114 => 97,  110 => 95,  108 => 94,  103 => 93,  99 => 91,  95 => 89,  92 => 88,  86 => 85,  83 => 84,  81 => 83,  77 => 82,  72 => 81,  68 => 79,  66 => 78,  61 => 77,  58 => 76,  54 => 75,  49 => 1,  47 => 73,  45 => 72,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/subtheme/templates/page--front.html.twig", "C:\\wamp64\\www\\fusion-test\\web\\themes\\custom\\subtheme\\templates\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 72, "if" => 76);
        static $filters = array("trim" => 72, "striptags" => 72, "render" => 72, "escape" => 77);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['trim', 'striptags', 'render', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
