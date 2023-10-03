<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$classes = $this->get_classes_from_settings();

/** Include a custom version of the language switcher */
require_once(TRANSSTYLE_ROOT_PATH . '/language-switcher.php');
$translatepress = new TRP_Translate_Press();
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
    <?php echo $styler->get_language_switcher([], $template_file); ?>
</div>