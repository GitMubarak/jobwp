<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * General action, hooks loader
*/
class JobWp_Loader {

	protected $jobwp_actions;
	protected $jobwp_filters;

	/**
	 * Class Constructor
	*/
	function __construct() {

		$this->jobwp_actions = array();
		$this->jobwp_filters = array();
	}

	function add_action( $hook, $component, $callback ) {

		$this->jobwp_actions = $this->add( $this->jobwp_actions, $hook, $component, $callback );
	}

	function add_filter( $hook, $component, $callback ) {

		$this->jobwp_filters = $this->add( $this->jobwp_filters, $hook, $component, $callback );
	}

	private function add( $hooks, $hook, $component, $callback ) {

		$hooks[] = array( 'hook' => $hook, 'component' => $component, 'callback' => $callback );
		return $hooks;
	}

	public function jobwp_run() {

		foreach( $this->jobwp_filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}

		foreach( $this->jobwp_actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
	}
}
?>