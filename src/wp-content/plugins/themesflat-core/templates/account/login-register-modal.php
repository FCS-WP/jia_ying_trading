<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="modal modal-login fade" id="tfre_login_register_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			<?php
			$enable_register_tab = 'y';
			if ( $enable_register_tab == 'n' ):
				// echo do_shortcode( '[custom_login_form redirect="current_page"]' );
				ob_start();
					tf_get_template_widget("account/login");
				$output = ob_get_clean();
				echo $output;
			else:?>
				<ul class="nav nav-tabs">
					<li class="active">
						<a id="tfre_login_modal_tab" href="#login"
						   data-toggle="tab"></a>
					</li>
					<li><a id="tfre_register_modal_tab" href="#register"
					       data-toggle="tab"></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tfre_login_tab">
						<?php 
							// echo do_shortcode( '[custom_login_form]' );
							ob_start();
							tf_get_template_widget("account/login");
							$output = ob_get_clean();
							echo $output;
						?>
					</div>
					<div class="tab-pane" id="tfre_register_tab">
						<?php 
							// echo do_shortcode( '[custom_register_form]' ); 
							ob_start();
								tf_get_template_widget("account/register");
							$output = ob_get_clean();
							echo $output;	
						?>
					</div>
				</div>
			<?php endif; ?>

			<div id="tfre-reset-password-wrap" style="display: none">
				<?php 
					// echo tfre_get_template_with_arguments( 'account/reset-password.php' );
					ob_start();
						tf_get_template_widget("account/reset-password");
					$output = ob_get_clean();
					echo $output;	
					// echo tf_get_template_widget( 'account/reset-password' );
				?>
				<a href="javascript:void(0)" class="tfre_login_redirect" ><?php esc_html_e( 'Back to Login', 'themesflat-core' ) ?></a>
			</div>
		</div>
	</div>
</div>
