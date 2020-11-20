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

/* __string_template__f4bfe53ce08fa6eb45e9303a7c477019b72402252eb31591827f939bae46866d */
class __TwigTemplate_57a1ae35b0aedc413efe3226b86d8105caef2c1575fe195d268341961998d01c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/prestashop/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/prestashop/img/app_icon.png\" />

<title>Strony • Kwiaciarnia</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminCmsContent';
    var iso_user = 'pl';
    var lang_is_rtl = '0';
    var full_language_code = 'pl';
    var full_cldr_language_code = 'pl-PL';
    var country_iso_code = 'PL';
    var _PS_VERSION_ = '1.7.6.8';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Złożono nowe zamówienie w Twoim sklepie.';
    var order_number_msg = 'Numer zamówienia: ';
    var total_msg = 'Razem: ';
    var from_msg = 'Od: ';
    var see_order_msg = 'Zobacz to zamówienie';
    var new_customer_msg = 'Nowy klient zarejestrował się w Twoim sklepie.';
    var customer_name_msg = 'Nazwa klienta: ';
    var new_msg = 'Nowa wiadomość pojawiła się w Twoim sklepie.';
    var see_msg = 'Przeczytaj tą wiadomość';
    var token = '8600147b9e574b42d906de44cc1a0c55';
    var token_admin_orders = '5b7ea13eb964e9b44d2d60a48ec7a4fc';
    var token_admin_customers = 'a78ef64887bba57818d34d4f6cbe510f';
    var token_admin_customer_threads = '552ba67749778691d5090759a955543b';
    var currentIndex = 'index.php?controller=AdminCmsContent';
    var employee_token = '6fc9d5376cc05e81611c9d914d5aed89';
    var choose_language_translate = 'Wybierz język';
    var default_language = '1';
    var admin_modules_link = '/prestashop/admin469238ppajfni3942814/index.php/improve/modules/catalog/recommended?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI';
    var admin_notification_get_link = '/prestashop/admin469238ppajfni3942814/index.php/common/notifications?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI';
    var admin_notification_push_link = '/prestashop/admin469238ppajfni3942814/index.php/common/notifications/ack?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI';
    var tab_modules_list = 'wic_pushproductcms,protectedshops,trustedshops,trustedshopsintegration,ebadgeletitbuy,etranslation,bablic';
    var update_success_msg = 'Aktualizacja powiodła się';
    var errorLogin = 'PrestaShop nie mógł zalogować się do Dodatków, sprawdź swoje uprawnienia i połączenie internetowe.';
    var search_product_msg = 'Szukaj produktu';
  </script>

      <link href=\"/prestashop/modules/emarketing/views/css/menuTabIcon.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/admin469238ppajfni3942814/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/admin469238ppajfni3942814/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/ps_mbo/views/css/recommended-modules.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/prestashop\\/admin469238ppajfni3942814\\/\";
var baseDir = \"\\/prestashop\\/\";
var changeFormLanguageUrl = \"\\/prestashop\\/admin469238ppajfni3942814\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\";
var currency = {\"iso_code\":\"PLN\",\"sign\":\"z\\u0142\",\"name\":\"Z\\u0142oty polski\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"PLN\",\"currencySymbol\":\"z\\u0142\",\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var number_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin469238ppajfni3942814/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/admin.js?v=1.7.6.8\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin469238ppajfni3942814/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/tools.js?v=1.7.6.8\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin469238ppajfni3942814/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin469238ppajfni3942814/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_mbo/views/js/recommended-modules.js?v=2.0.1\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin469238ppajfni3942814/themes/default/js/bundle/module/module_card.js?v=1.7.6.8\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/prestashop/admin469238ppajfni3942814/index.php/common/notifications?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script>
            var admin_gamification_ajax_url = \"https:\\/\\/localhost\\/prestashop\\/admin469238ppajfni3942814\\/index.php?controller=AdminGamification&token=3f9556d40df4ab4a11e2448701ab4bed\";
            var current_id_tab = 57;
        </script>

";
        // line 103
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>

<body class=\"lang-pl admincmscontent\">

  <header id=\"header\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminDashboard&amp;token=e0a0ee91f8d30458b896ddb1876f5a1e\"></a>
      <span id=\"shop_version\">1.7.6.8</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Szybki dostęp
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/categories/new?token=bc55353245ff6df3dc70df0104b96763\"
                 data-item=\"Nowa kategoria\"
      >Nowa kategoria</a>
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=be761dd36958560119d7eb1fc68ab6b9\"
                 data-item=\"Nowy kupon\"
      >Nowy kupon</a>
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/products/new?token=bc55353245ff6df3dc70df0104b96763\"
                 data-item=\"Nowy produkt\"
      >Nowy produkt</a>
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=e4b55783f17b2b91332d4df10112e6ea\"
                 data-item=\"Ocena katalogu\"
      >Ocena katalogu</a>
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php/improve/modules/manage?token=bc55353245ff6df3dc70df0104b96763\"
                 data-item=\"Zainstalowane moduły\"
      >Zainstalowane moduły</a>
          <a class=\"dropdown-item\"
         href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminOrders&amp;token=5b7ea13eb964e9b44d2d60a48ec7a4fc\"
                 data-item=\"Zamówienia\"
      >Zamówienia</a>
        <div class=\"dropdown-divider\"></div>
          <a
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"18\"
        data-icon=\"icon-AdminParentThemes\"
        data-method=\"add\"
        data-url=\"index.php/improve/design/cms-pages/2/edit?-MOWKyxsQ3NHcxbYWxsEkpI\"
        data-post-link=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminQuickAccesses&token=22783677e2360bcbf7c9dfed33e260d5\"
        data-prompt-text=\"Proszę podać nazwę tego skrótu:\"
        data-link=\"Strony - Lista\"
      >
        <i class=\"material-icons\">add_circle</i>
        Dodaj bieżącą stronę do zakładki
      </a>
        <a class=\"dropdown-item\" href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminQuickAccesses&token=22783677e2360bcbf7c9dfed33e260d5\">
      <i class=\"material-icons\">settings</i>
      Zarządzaj szybkim dostępem
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/prestashop/admin469238ppajfni3942814/index.php?controller=AdminSearch&amp;token=939ecf4b3e872239728d3730eee0bd75\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Szukaj (np.: indeks produktu, nazwa klienta...)\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Wszędzie
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Wszędzie\" href=\"#\" data-value=\"0\" data-placeholder=\"Czego szukasz?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Wszędzie</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Katalog\" href=\"#\" data-value=\"1\" data-placeholder=\"Nazwa produktu, SKU, odniesienie...\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Katalog</a>
        <a class=\"dropdown-item\" data-item=\"Klienci Wg nazwy\" href=\"#\" data-value=\"2\" data-placeholder=\"E-mail, nazwisko...\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Klienci Wg nazwy</a>
        <a class=\"dropdown-item\" data-item=\"Klienci wg adresu IP\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Klienci wg adresu IP</a>
        <a class=\"dropdown-item\" data-item=\"Zamówienia\" href=\"#\" data-value=\"3\" data-placeholder=\"ID zamówienia\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Zamówienia</a>
        <a class=\"dropdown-item\" data-item=\"Faktury\" href=\"#\" data-value=\"4\" data-placeholder=\"Numer faktury\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Faktury</a>
        <a class=\"dropdown-item\" data-item=\"Koszyki\" href=\"#\" data-value=\"5\" data-placeholder=\"ID Koszyka\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Koszyki</a>
        <a class=\"dropdown-item\" data-item=\"Moduły\" href=\"#\" data-value=\"7\" data-placeholder=\"Nazwa modułu\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Moduły</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">WYSZUKIWANIE</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

      
      
      <div class=\"component\" id=\"header-shop-list-container\">
          <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://localhost/prestashop/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      Zobacz sklep
    </a>
  </div>
      </div>

              <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Zamówienia<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Klienci<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Wiadomości<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Obecnie brak nowych zamówień :(<br>
              Czy sprawdziłeś <strong><a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCarts&action=filterOnlyAbandonedCarts&token=0b209e88ad23544143910fd873d5e3b0\">porzucone koszyki</a></strong>?<br>Może znajdziesz tam swoje następne zamówienie!
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Obecnie brak nowych klientów :(<br>
              Czy bierzesz pod uwagę sprzedaż na platformach handlowych?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Obecnie brak nowych wiadomości.<br>
              Brak wiadomości to dobra wiadomość, prawda?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      od <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - zarejestrowany <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      
      <span class=\"employee_avatar\"><img class=\"avatar rounded-circle\" src=\"https://profile.prestashop.com/rafal.wolniak.920%40gmail.com.jpg\" /></span>
      <span class=\"employee_profile\">Witaj ponownie Asia</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/employees/1/edit?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\">
      <i class=\"material-icons\">settings</i>
      Twój profil
    </a>
    </div>
    
    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/pl/zasoby/dokumentacja\" target=\"_blank\"><i class=\"material-icons\">book</i> Materiały</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">school</i> Trening</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/pl/eksperci\" target=\"_blank\"><i class=\"material-icons\">person_pin_circle</i> Znajdź eksperta</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com/pl/?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">extension</i> PrestaShop Marketplace</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">help</i> Centrum pomocy</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminLogin&amp;logout=1&amp;token=498df5c5e405ea76f829dca58cf56139\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Wyloguj się</span>
    </a>
  </div>
</div>
      </div>
    </nav>

      </header>

  <nav class=\"nav-bar d-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/employees/toggle-navigation?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\" id=\"tab-AdminDashboard\">
            <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminDashboard&amp;token=e0a0ee91f8d30458b896ddb1876f5a1e\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Pulpit</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"2\" id=\"tab-SELL\">
              <span class=\"title\">Sprzedaż</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminOrders&amp;token=5b7ea13eb964e9b44d2d60a48ec7a4fc\" class=\"link\">
                    <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                    <span>
                    Zamówienia
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminOrders&amp;token=5b7ea13eb964e9b44d2d60a48ec7a4fc\" class=\"link\"> Zamówienia
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/orders/invoices/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Faktury
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminSlip&amp;token=6a9aed40446d120b26aa6dafef498494\" class=\"link\"> Druki kredytowe
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/orders/delivery-slips/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Druk wysyłki
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCarts&amp;token=0b209e88ad23544143910fd873d5e3b0\" class=\"link\"> Koszyki zakupowe
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/products?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-store\">store</i>
                    <span>
                    Katalog
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/products?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Produkty
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/categories?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Kategorie
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminTracking&amp;token=4254c8bf98f98a1254e245128d8c1c98\" class=\"link\"> Monitorowanie
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminAttributesGroups&amp;token=63de512f88a7aaf02ea9479fa242d0aa\" class=\"link\"> Atrybuty &amp; Cechy
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/catalog/brands/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Marki &amp; Dostawcy
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminAttachments&amp;token=200b6ac94a8b44ca75dc39a6d52e5083\" class=\"link\"> Pliki
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCartRules&amp;token=be761dd36958560119d7eb1fc68ab6b9\" class=\"link\"> Rabaty
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/stocks/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/customers/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-account_circle\">account_circle</i>
                    <span>
                    Klienci
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/sell/customers/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Klienci
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminAddresses&amp;token=c3ea91acfde97018b69022c4d02f3265\" class=\"link\"> Adresy
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCustomerThreads&amp;token=552ba67749778691d5090759a955543b\" class=\"link\">
                    <i class=\"material-icons mi-chat\">chat</i>
                    <span>
                    Obsługa klienta
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCustomerThreads&amp;token=552ba67749778691d5090759a955543b\" class=\"link\"> Obsługa klienta
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminOrderMessage&amp;token=cb0a8fa4b1f3abf726b49ebccdfb231d\" class=\"link\"> Wiadomości zamówienia
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminReturn&amp;token=86934815954a93e3ae3c8f7b2b6625f9\" class=\"link\"> Zwroty produktów
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminStats&amp;token=e4b55783f17b2b91332d4df10112e6ea\" class=\"link\">
                    <i class=\"material-icons mi-assessment\">assessment</i>
                    <span>
                    Statystyki
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title -active\" data-submenu=\"42\" id=\"tab-IMPROVE\">
              <span class=\"title\">Ulepszenia</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/modules/manage?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Moduły
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/modules/manage?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Module Manager
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/modules/addons/modules/catalog?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Katalog
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                                                    
                <li class=\"link-levelone has_submenu -active open ul-open\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/themes/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                    <span>
                    Wygląd
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_up
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"126\" id=\"subtab-AdminThemesParent\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/themes/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Szablony
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"137\" id=\"subtab-AdminPsMboTheme\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/modules/addons/themes/catalog?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Katalog
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\" id=\"subtab-AdminParentMailTheme\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/mail_theme/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Szablon maila
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/cms-pages/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Strony
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/modules/positions/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Pozycje
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"59\" id=\"subtab-AdminImages\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminImages&amp;token=70d63d3ec14ae5a64162e9b1667458dc\" class=\"link\"> Zdjęcia
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\" id=\"subtab-AdminLinkWidget\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/modules/link-widget/list?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCarriers&amp;token=09160920785f9707a2e8362e037952e3\" class=\"link\">
                    <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                    <span>
                    Wysyłka
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminCarriers&amp;token=09160920785f9707a2e8362e037952e3\" class=\"link\"> Przewoźnicy
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/shipping/preferences?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Preferencje
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/payment/payment_methods?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-payment\">payment</i>
                    <span>
                    Płatność
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/payment/payment_methods?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Płatności
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\" id=\"subtab-AdminPaymentPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/payment/preferences?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Preferencje
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/international/localization/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-language\">language</i>
                    <span>
                    Międzynarodowy
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/international/localization/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Lokalizacja
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminZones&amp;token=45df1725b1dbe9dc93b105a778f70b98\" class=\"link\"> Położenie
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/international/taxes/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Podatki
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/international/translations/settings?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Tłumaczenia
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"131\" id=\"subtab-AdminEmarketing\">
                  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminEmarketing&amp;token=ec56da8407ba8476df75330c43bd427c\" class=\"link\">
                    <i class=\"material-icons mi-track_changes\">track_changes</i>
                    <span>
                    Advertising
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"80\" id=\"tab-CONFIGURE\">
              <span class=\"title\">Konfiguruj</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/preferences/preferences?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-settings\">settings</i>
                    <span>
                    Preferencje
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/preferences/preferences?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Ogólny
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/order-preferences/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Zamówienia
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/product-preferences/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Produkty
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/customer-preferences/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Klienci
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/contacts/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Kontakt
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/shop/seo-urls/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Ruch
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminSearchConf&amp;token=44d11abc2c2ae4257da3ac84be50cf93\" class=\"link\"> Szukaj
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\" id=\"subtab-AdminGamification\">
                              <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminGamification&amp;token=3f9556d40df4ab4a11e2448701ab4bed\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                  <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/system-information/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\">
                    <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                    <span>
                    Zaawansowane
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/system-information/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Informacja
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/performance/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Wydajność
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/administration/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Administracja
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/emails/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Adres e-mail
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"108\" id=\"subtab-AdminImport\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/import/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Importuj
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/employees/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Zespół
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/sql-requests/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Baza danych
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/logs/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> Logi
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/configure/advanced/webservice-keys/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" class=\"link\"> API
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                          
        
            </ul>
  
</nav>

<div id=\"main-div\">
          
<div class=\"header-toolbar\">
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Wygląd</li>
          
                      <li class=\"breadcrumb-item active\">
              <a href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/design/cms-pages/?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\" aria-current=\"page\">Strony</a>
            </li>
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Strony          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                                              <a
                class=\"btn btn-outline-secondary \"
                id=\"page-header-desc-configuration-modules-list\"
                href=\"/prestashop/admin469238ppajfni3942814/index.php/improve/modules/catalog?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\"                title=\"Rekomendowane moduły\"
                              >
                Rekomendowane moduły
              </a>
            
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Pomoc\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/prestashop/admin469238ppajfni3942814/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Fpl%252Fdoc%252FAdminCmsContent%253Fversion%253D1.7.6.8%2526country%253Dpl/Pomoc?_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI\"
                   id=\"product_form_open_help\"
                >
                  Pomoc
                </a>
                                    </div>
        </div>
      
    </div>
  </div>

  
    <script>
  if (undefined !== mbo) {
    mbo.initialize({
      translations: {
        'Recommended Modules and Services': 'Zalecane moduły i usługi',
        'Close': 'Zamknij',
      },
      recommendedModulesUrl: '/prestashop/admin469238ppajfni3942814/index.php/modules/addons/modules/recommended?tabClassName=AdminCmsContent&_token=RrcuoRqX6wLtArK65BJA-MOWKyxsQ3NHcxbYWxsEkpI',
      shouldAttachRecommendedModulesAfterContent: 0,
      shouldAttachRecommendedModulesButton: 1,
      shouldUseLegacyTheme: 0,
    });
  }
</script>

</div>
      
      <div class=\"content-div  \">

        

                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  ";
        // line 1115
        $this->displayBlock('content_header', $context, $blocks);
        // line 1116
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1117
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1118
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1119
        echo "
            
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>O nie!</h1>
  <p class=\"mt-3\">
    Wersja mobilna tej strony nie jest jeszcze dostępna.
  </p>
  <p class=\"mt-2\">
    Prosimy korzystać z komputera stacjonarnego, aby uzyskać dostęp do tej strony, dopóki nie zostanie zoptymalizowana pod kątem urządzeń mobilnych.
  </p>
  <p class=\"mt-2\">
    Dziękujemy.
  </p>
  <a href=\"https://localhost/prestashop/admin469238ppajfni3942814/index.php?controller=AdminDashboard&amp;token=e0a0ee91f8d30458b896ddb1876f5a1e\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Wstecz
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-PL&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/pl/login?email=rafal.wolniak.920%40gmail.com&amp;firstname=Asia&amp;lastname=Was&amp;website=http%3A%2F%2Flocalhost%2Fprestashop%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-PL&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/prestashop/admin469238ppajfni3942814/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Połącz swój sklep z rynkiem PrestaShop, żeby automatycznie importować wszystkie zakupione dodatki.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Nie masz konta ?</h4>
\t\t\t\t\t\t<p class='text-justify'>Odkryj siłę PrestaShop Addons! Przeglądaj Oficjalny Rynek PrestaShop i znajdź ponad 3500 innowacyjnych modułów i szablonów, które optymalizują stopnie konwersji, zwiększają ruch, budują lojalność klientów i zwiększają Twoją produktywność</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Połącz się z PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/pl/forgot-your-password\">Zapomniałem hasła</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/pl/login?email=rafal.wolniak.920%40gmail.com&amp;firstname=Asia&amp;lastname=Was&amp;website=http%3A%2F%2Flocalhost%2Fprestashop%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-PL&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tUtwórz konto
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Zaloguj się
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
";
        // line 1226
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 103
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
    }

    // line 1115
    public function block_content_header($context, array $blocks = [])
    {
    }

    // line 1116
    public function block_content($context, array $blocks = [])
    {
    }

    // line 1117
    public function block_content_footer($context, array $blocks = [])
    {
    }

    // line 1118
    public function block_sidebar_right($context, array $blocks = [])
    {
    }

    // line 1226
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "__string_template__f4bfe53ce08fa6eb45e9303a7c477019b72402252eb31591827f939bae46866d";
    }

    public function getDebugInfo()
    {
        return array (  1316 => 1226,  1311 => 1118,  1306 => 1117,  1301 => 1116,  1296 => 1115,  1287 => 103,  1279 => 1226,  1170 => 1119,  1167 => 1118,  1164 => 1117,  1161 => 1116,  1159 => 1115,  143 => 103,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__f4bfe53ce08fa6eb45e9303a7c477019b72402252eb31591827f939bae46866d", "");
    }
}
