<?php
/*
Plugin Name: Web USB Test Bench
*/

class WP_Web_USB_Test_Bench {
	private static $instance;

	public static function getInstance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

	private function __clone() {
	}

	private function __wakeup() {
	}

	protected function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	public function admin_menu() {
		add_submenu_page(
			'tools.php',
			__( 'Web USB Test Bench', 'wutb' ),
			__( 'Web USB Test Bench', 'wutb' ),
			'manage_options',
			'wp-web-usb-test-bench-page',
			array( $this, 'page' )
		);
	}

	public function admin_enqueue_scripts() {
		wp_enqueue_script( 'wutb_js', plugins_url( 'js/script.js', __FILE__ ), array( 'jquery' ) );
	}

	public function page() {
		global $title;

		?>
			<h2>
				<?php echo esc_html( $title ); ?>
			</h2>
			<button id="wutb_go">
				<?php esc_html_e( 'Go', 'wutb' ); ?>
			</button>
			<div id="wutb_results">
			</div>
		<?php
	}

}

WP_Web_USB_Test_Bench::getInstance();

