<?php

class WOP_Simple_Page extends WP_Options_Page {

	private static $instance = null;

	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	public function __construct () {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init () {
		$this->id = 'wop_simple';
		$this->menu_title = 'Simple Fields';
		$this->menu_position = 9997;
		parent::init();
	}

	public function get_fields () {
		return [
			[
				'id' => 'simple_text',
				'title' => 'Text Field',
				'type' => 'text',
				'description' => 'Simple text field with type="text"'
			],
			[
				'id' => 'simple_text_number',
				'title' => 'Text Field (number)',
				'type' => 'text',
				'attributes' => [
					'type' => 'number',
					'min' => 0,
					'step' => function () {
						// random float number between 0.00 and 1.00
						return number_format( mt_rand() / mt_getrandmax(), 2, '.', '' );
					},
					'required' => true
				],
				'description' => 'Simple text field with type="number"'
			],
			[
				'id' => 'simple_text_date',
				'title' => 'Text Field (date)',
				'type' => 'text',
				'attributes' => [
					'type' => 'date',
				],
				'description' => 'Simple text field with type="date"'
			],
			[
				'id' => 'simple_textarea',
				'title' => 'Textarea Field',
				'type' => 'textarea',
				'description' => 'Simple textarea field'
			],
			[
				'id' => 'simple_select',
				'title' => 'Select Field',
				'type' => 'select',
				'options' => [
					'' => 'Select an option',
					'man' => 'Man',
					'woman' => 'Woman',
				],
				'description' => 'Simple select field'
			],
			[
				'id' => 'simple_checkbox',
				'title' => 'Single Checkbox Field',
				'type' => 'checkbox',
				'description' => 'Simple checkbox field'
			],
			[
				'id' => 'simple_checkboxes',
				'title' => 'Checkbox Group Field',
				'type' => 'checkboxes',
				'options' => [
					'tomato' => 'Tomato',
					'carrot' => 'Carrot',
					'potato' => 'Potato'
				],
				'description' => 'Simple checkbox group fields'
			],
			[
				'id' => 'simple_radio',
				'title' => 'Radio Group Field',
				'type' => 'radio',
				'options' => [
					'red' => 'Red',
					'blue' => 'Blue',
					'green' => 'Green'
				],
				'description' => 'Simple radio group fields'
			],
		];
	}
}

// start your class
WOP_Simple_Page::instance();
