<?php 
	/**
	 * Author Widget Template
	 * @package    DirectoryPress
	 * @subpackage DirectoryPress/public/partials/widgets/author
	 * @author     Designinvento <developers@designinvento.net>
	*/
	
	global $DIRECTORYPRESS_ADIMN_SETTINGS, $post, $authordata;
	
	$show_phone_number = isset( $instance['show_phone_number'] ) ? $instance['show_phone_number'] : 1;
	$show_whatsapp_number = isset( $instance['show_whatsapp_number'] ) ? $instance['show_whatsapp_number'] : 1;
	$show_email = isset( $instance['show_email'] ) ? $instance['show_email'] : '1';
	$show_social_links = isset( $instance['show_social_links'] ) ? $instance['show_social_links'] : 1;
	$show_contact = isset( $instance['show_contact'] ) ? $instance['show_contact'] : '1';
	$show_offer_button = isset( $instance['show_offer_button'] ) ? $instance['show_offer_button'] : 1;
	$hide_from_anonymous = isset( $instance['hide_from_anonymous'] ) ? $instance['hide_from_anonymous'] : 0;
		
	if(has_shortcode($post->post_content, 'directorypress-listing')){ 
		$authorID = $GLOBALS['authorID2'];
		$listing = $GLOBALS['listing_id'];
		$listing_url = get_the_permalink($listing->post->ID);
	}else{
		$listing = '';
		$authorID = '';
		$listing_url = '';
	}
		
	$avatar_id = get_user_meta( $authorID, 'avatar_id', true );
		
	$author_name = get_the_author_meta('display_name', $authorID);
	$author_nicename = get_the_author_meta('nicename', $authorID);
	$author_login = get_the_author_meta('login', $authorID);
	$phone_number = get_the_author_meta('user_phone', $authorID);
	$whatsapp_number = get_the_author_meta('user_whatsapp_number', $authorID);
	$email_id = get_the_author_meta('user_email', $authorID);
	$registered = date_i18n( "M d, Y", strtotime( get_the_author_meta( 'user_registered', $authorID ) ) );
		
	$author_fb = get_the_author_meta('author_fb', $authorID);
	$author_tw = get_the_author_meta('author_tw', $authorID);
	$author_ytube = get_the_author_meta('author_ytube', $authorID);
	$author_vimeo = get_the_author_meta('author_vimeo', $authorID);
	$author_flickr = get_the_author_meta('author_flickr', $authorID);
	$author_linkedin = get_the_author_meta('author_linkedin', $authorID);
	$author_gplus = get_the_author_meta('author_gplus', $authorID);
	$author_instagram = get_the_author_meta('author_instagram', $authorID);
	$author_behance = get_the_author_meta('author_behance', $authorID);
	$author_dribbble = get_the_author_meta('author_dribbble', $authorID);	
	$contact_button_class = ($DIRECTORYPRESS_ADIMN_SETTINGS['directorypress_listing_contact'] && $DIRECTORYPRESS_ADIMN_SETTINGS['directorypress_listing_bidding'] && $show_contact && $show_offer_button)? 'normal' : 'btn-block';
	
	echo '<div class="directorypress-author style2 clearfix">';
		if ( directorypress_is_user_online($authorID) ){
			echo '<div class="author-status">'. esc_html__('online', 'DIRECTORYPRESS') .'</div>';
		}else{
			echo '<div class="author-status offline">'. esc_html__('offline', 'DIRECTORYPRESS') .'</div>';
		}
		echo '<div class="author-img">';
			if(!empty($avatar_id) && is_numeric($avatar_id)) {
				$author_avatar_url = wp_get_attachment_image_src( $avatar_id, 'full' ); 
				$image_src_array = $author_avatar_url[0];
				$params = array( 'width' => 110, 'height' => 110, 'crop' => true );
				echo '<img src="' . esc_url(bfi_thumb( $image_src_array, $params )).'" alt="'. esc_attr($author_name).'" />';
			} else { 
				$avatar_url = get_avatar_url($authorID, ['size' => '110']);
				echo'<img src="'. esc_url($avatar_url) .'" alt="author" />';
			}
		echo'</div>';
		echo '<div class="author-content">';
			echo '<p class="author-name">'. esc_html($author_name) .'</p>';
			echo'<p class="author-reg-date">'.esc_html__('Member since', 'DIRECTORYPRESS').' '. esc_html($registered) .'</p>';
			if($DIRECTORYPRESS_ADIMN_SETTINGS['author_profile_view']){
				echo '<div class="author-link"><a href="'. esc_url(directorypress_author_page_url($authorID)) .'" class="">'. esc_html__('view all ads', 'DIRECTORYPRESS').'</a></div>';
			}
			if($hide_from_anonymous && !is_user_logged_in()){
				// nothing to show
			}else{
				if($show_social_links){
					if($author_fb || $author_tw || $author_linkedin || $author_gplus || $author_ytube || $author_vimeo || $author_behance || $author_dribbble || $author_instagram || $author_flickr){
						echo'<div class="author-social-follow">';
							echo'<ul class="author-social-follow-ul">';
								if(!empty($author_fb)){
									echo'<li><a class="facebook" href="'. esc_url($author_fb) .'" target_blank><i class="fab fa-facebook-f"></i></a></li>';
								}
								if(!empty($author_tw)){
									echo'<li><a class="twitter" href="'. esc_url($author_tw) .'" target_blank><i class="fab fa-twitter"></i></a></li>';
								}
								if(!empty($author_linkedin)){
									echo'<li><a class="linkedin" href="'. esc_url($author_linkedin) .'" target_blank><i class="fab fa-linkedin-in"></i></a></li>';
								}
								if(!empty($author_ytube)){
									echo'<li><a class="youtube" href="'. esc_url($author_ytube) .'" target_blank><i class="fab fa-youtube"></i></a></li>';
								}
								if(!empty($author_vimeo)){
									echo'<li><a class="vimeo" href="'. esc_url($author_vimeo) .'" target_blank><i class="fab fa-vimeo-v"></i></a></li>';
								}
								if(!empty($author_instagram)){
									echo'<li><a class="instagram" href="'. esc_url($author_instagram) .'" target_blank><i class="fab fa-instagram"></i></a></li>';
								}
								if(!empty($author_flickr)){
									echo'<li><a class="flikr" href="'. esc_url($author_flickr) .'" target_blank><i class="fab fa-flickr"></i></a></li>';
								}
								if(!empty($author_behance)){
									echo'<li><a class="behance" href="'. esc_url($author_behance) .'" target_blank><i class="fab fa-behance"></i></a></li>';
								}
								if(!empty($author_dribbble)){
									echo'<li><a class="dribbble" href="'. esc_url($author_dribbble) .'" target_blank><i class="fab fa-dribbble"></i></a></li>';
								}
							echo '</ul>';
						echo '</div>';
					}
				}
			}
		echo '</div>';
	echo '</div>';
	if($hide_from_anonymous && !is_user_logged_in()){
		echo '<p class="alert alert-info">'. esc_html__('Please login to access contact information', 'DIRECTORYPRESS') .'</p>';		
	}else{
		if($DIRECTORYPRESS_ADIMN_SETTINGS['directorypress_listing_contact'] && ($show_contact || $show_offer_button)){
			echo '<div class="author-btns style2">';
				if($show_contact){
					echo '<div class="author-btn-holder '. esc_attr($contact_button_class) .'"><a class="author-contact-btn" data-popup-open="single_contact_form" href="#">'.esc_html__('Send message', 'DIRECTORYPRESS').'</a></div>'; 
				}
				if($show_offer_button){
					echo '<div class="author-btn-holder '. esc_attr($contact_button_class) .'"><a class="author-offer-btn" data-popup-open="single_contact_form_bid" href="#" class="">'. esc_html__('Send Offer', 'DIRECTORYPRESS').'</a></div>'; 
				}
			echo '</div>';
		}
		
		if(!empty($phone_number) && $show_phone_number){
			echo '<div class="author-phone style2">';
				$prephone_number = substr($phone_number, 0, 5);
				$numer_pre = '<span>'.esc_html__('Click To Show Number', 'DIRECTORYPRESS').'</span>'. $prephone_number . esc_html__('xxxxxx', 'DIRECTORYPRESS');
				echo '<a id="number" data-pre="'. wp_kses_post($numer_pre) .'" data-last="'. esc_attr($phone_number) .'" class="" href="tel:'.esc_attr($phone_number) .'"><i class="dicode-material-icons dicode-material-icons-phone"></i>';
					echo '<span class="number-main pre">'. wp_kses_post($numer_pre) .'</span>';
					echo '<span class="number-main post" style="display:none;">'. esc_html($phone_number) .'</span>';
				echo '</a>';
			echo '</div>';
		}
		if(!empty($whatsapp_number) && $show_whatsapp_number){			
			echo '<div class="author-phone whatsapp style2">';
				$pre_whatsapp_number = substr($whatsapp_number, 0, 5);
				$whatsapp_numer_pre = '<span>'.esc_html__('Click To Show Number', 'DIRECTORYPRESS').'</span>'.$pre_whatsapp_number.esc_html__('xxxxxx', 'DIRECTORYPRESS');
				echo '<a id="whatsapp-number" data-pre="'. wp_kses_post($whatsapp_numer_pre).'" data-last="'. esc_attr($whatsapp_number).'" class="" href="https://wa.me/'. esc_attr($whatsapp_number) .'?text='.sprintf(esc_html__('Sent From %s', 'DIRECTORYPRESS'), esc_url($listing_url)).'"><i class="fab fa-whatsapp"></i>';
					echo '<span class="number-main pre">'. wp_kses_post($whatsapp_numer_pre).'</span>';
					echo '<span class="number-main post" style="display:none;">'. esc_html($whatsapp_number) .'</span>';
				echo '</a>';
			echo '</div>';			
		}
		if(!empty($email_id) && $show_email){
			echo '<div class="author-email-id style2">';
				echo '<i class="fas fa-envelope-open-text"></i>';
				echo '<p class="email-id">';
					echo '<a href="mailto:'. esc_attr($email_id) .'">'. esc_html__('Send Email', 'DIRECTORYPRESS') .'</a>';
				echo '</p>';
			echo '</div>';
		}
	}