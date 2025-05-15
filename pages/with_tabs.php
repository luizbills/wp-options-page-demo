<?php

class WOP_Page_With_Tabs extends WP_Options_Page {

	private static $instance = null;

	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	public function __construct () {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init () {
		$this->id = 'wop_with_tabs';
		$this->menu_title = 'With Tabs';
		$this->menu_position = 9999;

		// declare the "page_tabs" feature
		$this->supports['page_tabs'] = [
			// declare my tabs
			'general' => 'General',
			'license' => 'License'
		];

		parent::init();
	}

	public function get_fields () {
		return [
			[
				'title' => 'A title for the 1st tab',
				'description' => 'Lorem ipsum...',
				'type' => 'title',
				'tab' => 'general', // set the field tab
			],
			[
				'id' => 'text_1',
				'title' => 'E-mail',
				'type' => 'text',
				'tab' => 'general', // set the field tab
			],
			[
				'title' => 'A title for the 2nd tab',
				'type' => 'title',
				'tab' => 'license', // set the field tab
			],
			[
				'id' => 'text_2',
				'title' => 'License Key',
				'type' => 'text',
				'tab' => 'license', // set the field tab
			],
		];
	}
}

// start your class
WOP_Page_With_Tabs::instance();
