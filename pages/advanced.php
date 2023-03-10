<?php

class WOP_Advanced_Page extends WP_Options_Page {

	private static $instance = null;

	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	public function __construct () {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init () {
		$this->id = 'wop_advanced';
		$this->menu_title = 'Advanced Fields';
		$this->menu_position = 9998;

		// declare the custom features
		$this->supports[] = 'rich_text_field';

		parent::init();
	}

	public function get_fields () {
		return [
			[
				'type' => 'rich_text',
				'id' => 'message',
				'title' => 'Your Message',
				'default' => '<strong>Hello World!!!</strong>',
				'description' => 'Put some nice description here.'
			],
		];
	}
}

// start your class
WOP_Advanced_Page::instance();
