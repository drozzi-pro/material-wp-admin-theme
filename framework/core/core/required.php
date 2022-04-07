<?php

	if ( !defined ( 'ABSPATH' ) ) {
		exit;
	}

	if (!class_exists('redukCoreRequired')){
		class redukCoreRequired {
			public $parent      = null;

			public function __construct ($parent) {
				$this->parent = $parent;
				Reduk_Functions::$_parent = $parent;


				/**
				 * action 'reduk/page/{opt_name}/'
				 */
				do_action( "reduk/page/{$parent->args['opt_name']}/" );

			}


		}
	}