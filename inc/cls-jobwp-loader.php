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

	function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->jobwp_actions = $this->add(
			$this->jobwp_actions,
			$hook,
			$component,
			$callback,
			$priority,
			$accepted_args
		);
	}

	function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->jobwp_filters = $this->add(
			$this->jobwp_filters,
			$hook,
			$component,
			$callback,
			$priority,
			$accepted_args
		);
	}

	private function add( $hooks, $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		);

		return $hooks;
	}

	public function jobwp_run() {

		foreach ( $this->jobwp_filters as $hook ) {
			add_filter(
				$hook['hook'],
				array( $hook['component'], $hook['callback'] ),
				$hook['priority'],
				$hook['accepted_args']
			);
		}

		foreach ( $this->jobwp_actions as $hook ) {
			add_action(
				$hook['hook'],
				array( $hook['component'], $hook['callback'] ),
				$hook['priority'],
				$hook['accepted_args']
			);
		}
	}
}
?>