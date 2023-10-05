<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if(!is_plugin_active('translatepress-multilingual/index.php')){
    echo __('This Widget requires TranslatePress to be installed','transtyle');
    return;
}

$classes = $this->get_classes_from_settings();

require_once(TRANSSTYLE_ROOT_PATH . '/includes/language-switcher-class.php');
$translatepress = TRP_Translate_Press::get_trp_instance();
$translatepress_settings = new TRP_Settings();
$styler = new Transtyler_Language_Switcher($translatepress_settings->get_settings(), $translatepress);


$template_file = '';
if ($this->get_settings_for_display('show_as') === 'list') {
    $template_file = 'language-switcher-shortcode-list.php';
}

?>

<div class="translatestyler-container <?php echo implode(' ', $classes) ?>">
    <?php //echo do_shortcode('[language-switcher]'); 
    ?>
    <?php echo $styler->get_language_switcher([], $template_file, $this); ?>
</div>