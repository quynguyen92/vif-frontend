<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_Sidebar_Generator' ) ) {

	class RDTheme_Sidebar_Generator {

		public $prefix = RDTHEME_PREFIX;
		public $option_name = null;

		public function __construct() {
			$this->option_name = $this->prefix . '_custom_sidebars';

			add_action( 'sidebar_admin_page', array( $this, 'sidebar_form' ) );
			add_action( 'init' , array( $this, 'register_sidebars' ) );
			
			add_action( 'wp_ajax_rdtheme_add_sidebar' , array( $this, 'ajax_add_sidebar' ) );
			add_action( 'wp_ajax_rdtheme_remove_sidebar', array( $this, 'ajax_remove_sidebar' ) );
		}

		public function sidebar_form() {
			?>
			<div class="widgets-holder-wrap">
				<div id="rdtheme-new-sidebar" class="widgets-sortables">
					<div class="sidebar-name">
						<div class="sidebar-name-arrow"></div>
						<h2><?php esc_html_e( 'Add New Sidebar', 'financepro' ); ?><span class="spinner"></span></h2>
					</div>
					<div class="sidebar-description">
						<form style="padding:0 7px;" method="POST" action="<?php echo esc_url( admin_url( 'admin-ajax.php?action=rdtheme_add_sidebar' ) );?>">
							<?php wp_nonce_field( 'rdtheme_add_sidebar' ); ?>
							<table class="form-table">
								<tr>
									<th scope="row"><?php esc_html_e( 'Name', 'financepro' ) ?></th>
									<td><input type="text" class="text" name="name" value=""></td>
									<td><input type="submit" class="button-primary" value="<?php esc_html_e( 'Add', 'financepro' ) ?>"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<?php
			$this->sidebar_scripts();
		}

		public function register_sidebars() {
			$sidebars = get_option( $this->option_name, array() );

			if ( !$sidebars ) return;

			foreach ( $sidebars as $sidebar ) {
				register_sidebar( $sidebar );
			}
		}

		public function ajax_add_sidebar() {
			$name  = isset( $_REQUEST['name'] ) ? sanitize_text_field( $_REQUEST['name'] ) : null;
			$nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( $_REQUEST['_wpnonce'] ) : null;

			if ( empty( $name ) ) {
				wp_send_json_error( esc_html__( "Sidebar name can't be empty", 'financepro' ) );
			}
			if ( empty( $nonce ) ) {
				wp_send_json_error( esc_html__( 'Empty nonce', 'financepro' ) );
			}
			if ( ! wp_verify_nonce( $nonce, 'rdtheme_add_sidebar' ) ) {
				wp_send_json_error( esc_html__( 'Invalid nonce', 'financepro' ) );
			}

			$id = 'rdtheme-sidebar-' . sanitize_title( $name );
			$sidebars = get_option( $this->option_name, array() );

			if ( array_key_exists( $id, $sidebars ) ) {
				wp_send_json_error( esc_html__( 'Sidebar with the same name already exists. Please choose a different name', 'financepro' ) );
			}

			$sidebars[$id] = array(
				'id'             => $id,
				'name'           => $name,
				'class'          => 'rdtheme-custom',
				'description'    => '',
				'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'   => '</aside>',
				'before_title'   => '<h2 class="widgettitle widget-title-bar title-sidebar title-bar">',
				'after_title'    => '</h2>',
			);

			update_option( $this->option_name, $sidebars );

			if ( ! function_exists( 'wp_list_widget_controls' ) ) {
				include_once ABSPATH . 'wp-admin/includes/widgets.php';
			}

			ob_start();
			?>
			<div class="widgets-holder-wrap sidebar-rdtheme-custom closed">
				<?php wp_list_widget_controls( $id, $name ); ?>
			</div>
			<?php
			wp_send_json_success( ob_get_clean() );
		}

		public function ajax_remove_sidebar() {
			$id    = isset( $_REQUEST['id'] ) ? sanitize_text_field( $_REQUEST['id'] ) : null;
			$nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( $_REQUEST['_wpnonce'] ) : null;

			if ( empty( $id ) ) {
				wp_send_json_error( esc_html__( 'Sidebar ID not found', 'financepro' ) );
			}
			if ( empty( $nonce ) ) {
				wp_send_json_error( esc_html__( 'Empty nonce', 'financepro' ) );
			}
			if ( ! wp_verify_nonce( $nonce, 'rdtheme_remove_sidebar' ) ) {
				wp_send_json_error( esc_html__( 'Invalid nonce', 'financepro' ) );
			}

			$sidebars = get_option( $this->option_name, array() );

			unset( $sidebars[ $id ] );

			update_option( $this->option_name, $sidebars );

			wp_send_json_success();
		}

		public function sidebar_scripts() {
			?>
			<script type="text/javascript">
				(function($){
					// Custom functions
					function add_close_btn(){
						$('#widgets-right .sidebar-rdtheme-custom .sidebar-name h2').children('.spinner').each(function() {
							if ( ! $(this).prev('.sidebar-rdtheme-custom-closebtn').length) {
								$(this).before('<a class="sidebar-rdtheme-custom-closebtn" style="vertical-align: text-top;" href="#">x</a>');
							}
						});	
					}

					// Initialize
					$(document).ready(function() {
						$('#rdtheme-new-sidebar').parent().prependTo($('#widgets-right .sidebars-column-1'));
						add_close_btn();
					});

					// Add Form submission
					$(document).on('submit','#rdtheme-new-sidebar form',function(event){
						event.preventDefault();

						$(this).find('input[type="submit"]').attr('disabled', 'disabled');
						$(this).closest('#rdtheme-new-sidebar').find('.spinner').addClass('is-active');

						$.ajax({
							context: this,
							url: $(this).attr('action'),
							type: $(this).attr('method'),
							dataType: 'json',
							data: $(this).serializeArray(),
							complete: function(response) {
								$(this).closest('#rdtheme-new-sidebar').find('.spinner').removeClass('is-active');
								$(this).find('input[type="submit"]').removeAttr('disabled');

								if ( ! response || ! response.responseJSON || ! response.responseJSON.success) {
									if (response && response.responseJSON && response.responseJSON.data) {
										alert(response.responseJSON.data);
									}
									else {
										alert('<?php esc_html_e( 'Operation failed', 'financepro' ); ?>');
									}
								}
								else {
									var html = $('#wpbody-content > .wrap').clone();
									html.find('#widgets-right .sidebars-column-2').append(response.responseJSON.data);
									$(document.body).unbind('click.widgets-toggle');
									$('#wpbody-content > .wrap').replaceWith(html.clone());
									setTimeout(function() {
										wpWidgets.init();
										add_close_btn();
									}, 200);
								}
							},
						});
					});

					// Remove button action
					$(document).on('click','#widgets-right .sidebar-rdtheme-custom .sidebar-name h2 .sidebar-rdtheme-custom-closebtn',function(event){
						event.preventDefault();
						event.stopPropagation();

						if (confirm('<?php esc_html_e( 'Are you sure you want to remove this custom sidebar', 'financepro' ); ?>')) {
							$(this).addClass('hidden').next('.spinner').addClass('is-active');

							$.ajax({
								context: this,
								url: '<?php echo esc_url( admin_url( 'admin-ajax.php?action=rdtheme_remove_sidebar' ) ); ?>',
								dataType: 'json',
								data: {
									id: $(this).closest('.widgets-sortables').attr('id'),
									_wpnonce: '<?php echo wp_create_nonce( 'rdtheme_remove_sidebar' ); ?>',
								},
								complete: function(response) {
									if ( ! response || ! response.responseJSON || ! response.responseJSON.success) {
										if (response && response.responseJSON && response.responseJSON.data) {
											alert(response.responseJSON.data);
										}
										else {
											alert('<?php esc_html_e( 'Operation failed', 'financepro' ); ?>');
										}

										$(this).removeClass('hidden').next('.spinner').removeClass('is-active');
									}
									else {
										$(this).closest('.sidebar-rdtheme-custom').remove();
									}
								},
							});
						}
					});
				})(jQuery);
			</script>
			<?php
		}
	}
}

new RDTheme_Sidebar_Generator;