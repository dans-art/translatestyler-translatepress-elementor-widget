<?php
$current_language_preference = $this->add_shortcode_preferences($shortcode_settings, $current_language['code'], $current_language['name']);

?>
<div class="ts-language-list-shortcode">
<div class="ts-language-container" data-no-translation>
    <div class="ts-trp-ls-shortcode-language">
    <a href="#" title="<?php echo esc_attr( $current_language['name'] ); ?>" onclick="event.preventDefault()">
			<?php echo $current_language_preference; /* phpcs:ignore */ /* escaped inside the function that generates the output */ ?>
		</a>
    <?php foreach ( $other_languages as $code => $name ){
        $language_preference = $this->add_shortcode_preferences($shortcode_settings, $code, $name);
        ?>
        <a href="<?php echo (isset($is_editor) && $is_editor) ? '#' : esc_url( $this->url_converter->get_url_for_language($code, false) ); /* phpcs:ignore */ /* $is_editor is not outputted */ ?>" title="<?php echo esc_attr( $name ); ?>">
            <?php echo $language_preference; /* phpcs:ignore */ /* escaped inside the function that generates the output */ ?>
        </a>

    <?php } ?>
    </div>
</div>
</div>