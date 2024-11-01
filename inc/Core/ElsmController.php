<?php 
/**
 * @package  Shape Master
 */
namespace Inc\Core;

class ElsmController
{
	public $plugin_path;

	public $plugin_url;

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __DIR__) ); 
		$this->plugin_url = plugin_dir_url( dirname( __DIR__) );
	}


}