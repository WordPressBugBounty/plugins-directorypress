<?php 

/**
 * @package    DirectoryPress
 * @subpackage DirectoryPress/public/single-listing
 * @author     Designinvento <developers@designinvento.net>
*/
global $DIRECTORYPRESS_ADIMN_SETTINGS; ?>
<form method="POST" action="<?php the_permalink($listing->post->ID); ?>#report-tab" id="directorypress_report_form">
	<input type="hidden" name="listing_id" id="report_listing_id" value="<?php echo esc_attr($listing->post->ID); ?>" />
	<input type="hidden" name="report_nonce" id="report_nonce" value="<?php print esc_attr(wp_create_nonce('directorypress_report_nonce')); ?>" />
	<h5 id="report_warning" style="display: none; color: red;"></h5>
	<div class="directorypress-report-form">
		<?php if (is_user_logged_in()): ?>
			<input type="hidden" name="report_name" id="report_name" />
			<input type="hidden" name="report_email" id="report_email" />
		<?php else: ?>
		<p>
			<label for="report_name"><?php esc_html_e('Contact Name', 'DIRECTORYPRESS'); ?><span class="red-asterisk">*</span></label>
			<input type="text" name="report_name" id="report_name" class="form-control" value="<?php echo esc_attr(directorypress_get_input_value($_POST, 'report_name')); ?>" size="35" />
		</p>
		<p>
			<label for="report_email"><?php esc_html_e("Contact Email", "DIRECTORYPRESS"); ?><span class="red-asterisk">*</span></label>
			<input type="text" name="report_email" id="report_email" class="form-control" value="<?php echo esc_attr(directorypress_get_input_value($_POST, 'report_email')); ?>" size="35" />
		</p>
		<?php endif; ?>
		<p>
			<label for="report_message"><?php esc_html_e("Your message", "DIRECTORYPRESS"); ?><span class="red-asterisk">*</span></label>
			<textarea name="report_message" id="report_message" class="form-control" rows="15"><?php echo esc_textarea(directorypress_get_input_value($_POST, 'report_message')); ?></textarea>
		</p>
		
		<?php echo wp_kses_post(directorypress_has_recaptcha()); ?>
		
		<input type="submit" name="submit" class="directorypress-send-message-button btn btn-primary" value="<?php esc_attr_e('Send message', 'DIRECTORYPRESS'); ?>" />
	</div>
</form>