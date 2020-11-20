<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Improve/Design/Cms/Blocks/form.html.twig */
class __TwigTemplate_cf0741bfc71b07fb7cf048d7b252e08e2ce803d82dc2f773e1046ff5b0559ac8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'cms_tool_serp' => [$this, 'block_cms_tool_serp'],
            'cms_page_form_rest' => [$this, 'block_cms_page_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Cms/Blocks/form.html.twig", 26);
        // line 27
        echo "
";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["cmsPageForm"] ?? null), 'form_start');
        echo "
  <div class=\"card\">
    <div class=\"card-header\">
      ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Page", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
    </div>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["cmsPageForm"] ?? null), 'errors');
        echo "

        ";
        // line 37
        $context["invalidCharsHint"] = ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>={}");
        // line 38
        echo "
        ";
        // line 39
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "page_category_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Page category", [], "Admin.Design.Feature")]);
        // line 41
        echo "

        ";
        // line 43
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "title", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Title", [], "Admin.Global"), "help" => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Used in the h1 page tag, and as the default title tag value.", [], "Admin.Design.Help") . " ") .         // line 46
($context["invalidCharsHint"] ?? null))]);
        // line 47
        echo "

        ";
        // line 49
        $this->displayBlock('cms_tool_serp', $context, $blocks);
        // line 62
        echo "
        ";
        // line 63
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "meta_title", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta title", [], "Admin.Global"), "help" => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Used to override the title tag value. If left blank, the default title value is used.", [], "Admin.Design.Help") . " ") .         // line 66
($context["invalidCharsHint"] ?? null))]);
        // line 67
        echo "

        ";
        // line 69
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "meta_description", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta description", [], "Admin.Global"), "help" =>         // line 71
($context["invalidCharsHint"] ?? null)]);
        // line 72
        echo "

        ";
        // line 74
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "meta_keyword", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta keywords", [], "Admin.Global"), "help" => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To add tags, click in the field, write something, and then press the \"Enter\" key.", [], "Admin.Shopparameters.Help") . " ") .         // line 77
($context["invalidCharsHint"] ?? null))]);
        // line 78
        echo "

        ";
        // line 80
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "friendly_url", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Friendly URL", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only letters and the hyphen (-) character are allowed.", [], "Admin.Design.Feature")]);
        // line 83
        echo "

        ";
        // line 85
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "content", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Page content", [], "Admin.Design.Feature")]);
        // line 87
        echo "

        ";
        // line 89
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "is_indexed_for_search", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Indexation by search engines", [], "Admin.Design.Feature")]);
        // line 91
        echo "

        ";
        // line 93
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "is_displayed", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Displayed", [], "Admin.Global")]);
        // line 95
        echo "

        ";
        // line 97
        if ($this->getAttribute(($context["cmsPageForm"] ?? null), "shop_association", [], "any", true, true)) {
            // line 98
            echo "          ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["cmsPageForm"] ?? null), "shop_association", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop association", [], "Admin.Global")]);
            // line 100
            echo "
        ";
        }
        // line 102
        echo "
        ";
        // line 103
        $this->displayBlock('cms_page_form_rest', $context, $blocks);
        // line 106
        echo "      </div>
    </div>

    <div class=\"card-footer\">
      <div class=\"d-inline-flex\">
        <a href=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_cms_pages_index", ["id_cms_category" => ($context["cmsCategoryParentId"] ?? null)]), "html", null, true);
        echo "\" class=\"btn btn-outline-secondary\">
          ";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
      </div>

      <div class=\"d-inline-flex float-right\">
        <button type=\"submit\" class=\"btn btn-primary\" name=\"save-and-preview\">
        ";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save and preview", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>

      <button type=\"submit\" class=\"btn btn-primary ml-3\">";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
    </div>
  </div>

</div>
";
        // line 126
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["cmsPageForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 49
    public function block_cms_tool_serp($context, array $blocks = [])
    {
        // line 50
        echo "          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SEO preview", [], "Admin.Global"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              <div id=\"serp-app\" data-cms-url=\"";
        // line 55
        echo twig_escape_filter($this->env, ($context["cmsUrl"] ?? null), "html", null, true);
        echo "\"></div>
              <small class=\"form-text\">
                ";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Here is a preview of how your page will appear in search engine results.", [], "Admin.Global"), "html", null, true);
        echo "
              </small>
            </div>
          </div>
        ";
    }

    // line 103
    public function block_cms_page_form_rest($context, array $blocks = [])
    {
        // line 104
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["cmsPageForm"] ?? null), 'rest');
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Cms/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 104,  207 => 103,  198 => 57,  193 => 55,  187 => 52,  183 => 50,  180 => 49,  174 => 126,  166 => 121,  160 => 118,  151 => 112,  147 => 111,  140 => 106,  138 => 103,  135 => 102,  131 => 100,  128 => 98,  126 => 97,  122 => 95,  120 => 93,  116 => 91,  114 => 89,  110 => 87,  108 => 85,  104 => 83,  102 => 80,  98 => 78,  96 => 77,  95 => 74,  91 => 72,  89 => 71,  88 => 69,  84 => 67,  82 => 66,  81 => 63,  78 => 62,  76 => 49,  72 => 47,  70 => 46,  69 => 43,  65 => 41,  63 => 39,  60 => 38,  58 => 37,  53 => 35,  46 => 31,  40 => 28,  37 => 27,  35 => 26,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Cms/Blocks/form.html.twig", "/var/www/html/prestashop/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Cms/Blocks/form.html.twig");
    }
}
