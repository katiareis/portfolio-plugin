<?php 

/**
 *  * Plugin Name:    KR Portfolio Plugin
 * Plugin URI:        https://desenvolvimento.katiareis.com.br/
 * Description:       Portfolio Plugin with Custom Post Type Directory, image gallery feature and banner caroussel for portfolio or projects websites.
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      8.2
 * Author:            Katia Reis
 * Author URI:        https://www.katiareis.com 
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://katiareis.com/krportfolio
 * Text Domain:       kr-portfolio
 * Domain Path:       /languages
 * 
 *  @package KRPortfolioPlugin
 */

/*
KR Portfolio Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

K Reis Portfolio Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with KR Portfolio. If not, see {URI to Plugin License}.
*/

if ( ! defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

// Creates the main class "KR_Portfolio".
if (!class_exists('KR_Portfolio')) {
  class KR_Portfolio {
    function __construct() {
      $this->define_constants();

      require_once(KR_PORTFOLIO_PATH . 'post-types/class.kr-projects-post-type.php');
      $KR_Projects_Post_Type = new KR_Projects_Post_Type();
    }
    
	
	// Creates and defines main constants
    public function define_constants() {
      define( 'KR_PORTFOLIO_PATH' , plugin_dir_path(__FILE__) );
      define( 'KR_PORTFOLIO_URL' , plugin_dir_url(__FILE__) );
      define( 'KR_PORTFOLIO_VERSION' , '1.0.0'); 
    }
	
	public static function activate() {
      update_option('rewrite_rules', ''); 
    }
	
	public static function deactivate() {
      flush_rewrite_rules();

    }

    public static function uninstall() {
      // Deletes CPT Directory and all plugin data from DB
    }
  }
}

if ( class_exists( 'KR_Portfolio' )) {
  register_activation_hook(__FILE__, array('KR_Portfolio', 'activate'));
  register_deactivation_hook(__FILE__, array('KR_Portfolio', 'deactivate'));
  register_uninstall_hook(__FILE__, array('KR_Portfolio', 'uninstall'));

  $kr_portfolio = new KR_Portfolio();
}
