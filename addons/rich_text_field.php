<?php

class WOP_Addon_Rich_Text_Field {

	const FEATURE = 'rich_text_field';
	const FIELD_TYPE = 'rich_text';
	private static $instance = null;

	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	public function __construct () {
		add_action( 'wp_options_page_init', [ $this, 'setup' ] );
	}

	/**
	 * @param \WP_Options_Page $page
	 * @return void
	 */
	public function setup ( $page ) {
		if ( ! $page->supports( self::FEATURE ) ) return;

		// hooks
		$page->add_action( 'render_field_' . self::FIELD_TYPE, [ $this, 'render_field' ], 10, 2 );
		$page->add_action( 'prepare_field_' . self::FIELD_TYPE, [ $this, 'prepare_field' ], 10, 2 );
	}

	/**
	 * @param array $field
	 * @param \WP_Options_Page $page
	 * @return void
	 */
	public function render_field ( $field, $page ) {
		$value = $page->get_field_value( $field );
		$name = $field['name'];
		$desc = $field['description'];
		$args = $field['editor_settings'] ?? [];

		$args['textarea_rows'] = $args['textarea_rows'] ?? 5;
		$args['wpautop'] = $args['wpautop'] ?? true;

		\wp_editor( $value, $name, $args );

		$page->do_action( 'after_field_input', $field, $this );

		if ( $desc ) : ?>
		<p class="description"><?php echo $desc ?></p>
		<?php endif;
	}

	public function prepare_field ( $field, $page ) {
		$field['@sanitize'] = null;
		return $field;
	}
}

WOP_Addon_Rich_Text_Field::instance();
