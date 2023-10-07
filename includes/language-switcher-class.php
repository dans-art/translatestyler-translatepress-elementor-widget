<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class Transtyler_Language_Switcher extends TRP_Language_Switcher
{
	/**
	 * Displays the language switcher. Original code from the Translatepress plugin.
	 * Modifications made at the end after DA-Edits
	 *
	 * @param array $atts
	 * @param [type] $template_file
	 * @param Transstyle_Widget $transstyle 
	 * @return void
	 */
	public function get_language_switcher($atts = [], $template_file, $transstyle)
	{
		ob_start();

		global $TRP_LANGUAGE;

		$shortcode_attributes = shortcode_atts(array(
			'display' => 0,
			'is_editor' => 0,
		), $atts);

		if (!$this->trp_languages) {
			$trp = TRP_Translate_Press::get_trp_instance();
			$this->trp_languages = $trp->get_component('languages');
		}
		if (current_user_can(apply_filters('trp_translating_capability', 'manage_options'))) {
			$languages_to_display = $this->settings['translation-languages'];
		} else {
			$languages_to_display = $this->settings['publish-languages'];
		}
		$published_languages = $this->trp_languages->get_language_names($languages_to_display);

		$current_language = array();
		$other_languages = array();

		foreach ($published_languages as $code => $name) {
			if ($code == $TRP_LANGUAGE) {
				$current_language['code'] = $code;
				$current_language['name'] = $name;
			} else {
				$other_languages[$code] = $name;
			}
		}
		$current_language = apply_filters('trp_ls_shortcode_current_language', $current_language, $published_languages, $TRP_LANGUAGE, $this->settings);
		$other_languages = apply_filters('trp_ls_shortcode_other_languages', $other_languages, $published_languages, $TRP_LANGUAGE, $this->settings);

		if (!$this->trp_settings_object) {
			$trp = TRP_Translate_Press::get_trp_instance();
			$this->trp_settings_object = $trp->get_component('settings');
		}
		$ls_options = $this->trp_settings_object->get_language_switcher_options();
		if (isset($shortcode_attributes['display']) && isset($ls_options[$shortcode_attributes['display']])) {
			$shortcode_settings = $ls_options[$shortcode_attributes['display']];
		} else {
			$shortcode_settings = $ls_options[$this->settings['shortcode-options']];
		}

		$is_editor = isset($shortcode_attributes['is_editor']) && $shortcode_attributes['is_editor'] === 'true';

		/** DA-EDITS */
		$shortcode_settings['full_names'] = boolval($transstyle ->get_settings_for_display('full_names'));
		$shortcode_settings['short_names'] = boolval($transstyle ->get_settings_for_display('short_names'));
		$shortcode_settings['flags'] = boolval($transstyle ->get_settings_for_display('flags'));
		$shortcode_settings['no_html'] = boolval($transstyle ->get_settings_for_display('no_html'));
		$show_current_language = boolval($transstyle ->get_settings_for_display('show_current'));

		$filename = (!empty($template_file)) ? '/' . $template_file : '/language-switcher-shortcode.php';
		require TRANSSTYLE_ROOT_PATH .'/template'.$filename;

		return ob_get_clean();
	}
}
