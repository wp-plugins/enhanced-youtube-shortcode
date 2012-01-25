<?php
/*
Plugin Name: Enhanced YouTube Shortcode
Plugin URI: http://pixel-solitaire.com/telechargements/enhanced-youtube-shortcode/
Description: A simple <em>YouTube</em> shortcode with basic options & general improvement over the default coming with <em>Wordpress</em>. Activate then click "<strong>Settings=>Enhanced YouTube</strong>" in order to edit the player options & more infos. <strong>Usage sample:</strong> [youtube_video id="abxjy-emFvs"]
Version: 1.9.1
Author: le Pixel Solitaire
Author URI: http://pixel-solitaire.com/
License: GNU General Public License (v3)
*/

if(!class_exists('pxsol_youtube_plugin')) { class pxsol_youtube_plugin { function pxsol_youtube($atts) {extract(shortcode_atts(array( 'id' =>'',), $atts));	$pxsol_youtube_autoplay = get_option('pxsol_youtube_autoplay');	$pxsol_youtube_hd = get_option('pxsol_youtube_hd');	$pxsol_youtube_width = get_option('pxsol_youtube_width'); $pxsol_youtube_height = get_option('pxsol_youtube_height'); $pxsol_youtube_fullScreen = get_option('pxsol_youtube_fullScreen'); $pxsol_youtube_controls = get_option('pxsol_youtube_controls'); $pxsol_youtube_autohide = get_option('pxsol_youtube_autohide'); $pxsol_youtube_modestbranding = get_option('pxsol_youtube_modestbranding'); $pxsol_youtube_theme = get_option('pxsol_youtube_theme'); $pxsol_youtube_showinfo = get_option('pxsol_youtube_showinfo'); $pxsol_switch_autoplay = ''; if ($pxsol_youtube_autoplay == 'true'){ $pxsol_switch_autoplay = '&autoplay=1';}; $pxsol_switch_hd = ''; if ($pxsol_youtube_hd == 'true'){	$pxsol_switch_hd = '&hd=1';}; $pxsol_switch_fullScreen = ''; if ($pxsol_youtube_fullScreen == 'true'){ $pxsol_switch_fullScreen = '&fs=1'; } else { $pxsol_switch_fullScreen = '&fs=0';}; $pxsol_switch_controls = ''; if ($pxsol_youtube_controls == 'false'){	$pxsol_switch_controls = '&controls=0';}; $pxsol_switch_autohide = ''; if ($pxsol_youtube_autohide == 'true'){ $pxsol_switch_autohide = '&autohide=1';} else { $pxsol_switch_autohide = '&autohide=0';}; $pxsol_switch_modestbranding = '';	if ($pxsol_youtube_modestbranding == 'true'){ $pxsol_switch_modestbranding = '&modestbranding=1';};	$pxsol_switch_theme = ''; if ($pxsol_youtube_theme == 'light'){	$pxsol_switch_theme = '&theme=light';};	$pxsol_switch_showinfo = ''; if ($pxsol_youtube_showinfo == 'false'){ $pxsol_switch_showinfo = '&showinfo=0';};	$pxsol_youtube_switch = $pxsol_switch_fullScreen.$pxsol_switch_hd.$pxsol_switch_autoplay.$pxsol_switch_controls.$pxsol_switch_autohide.$pxsol_switch_modestbranding.$pxsol_switch_theme.$pxsol_switch_showinfo;
	$generated_output = '<object style="height: '.$pxsol_youtube_height.'px; width: '.$pxsol_youtube_width.'px">
		<param name="movie" value="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'"></param>
		<param name="allowFullScreen" value="'.$pxsol_youtube_fullScreen.'"></param>
		<param name="allowScriptAccess" value="always"></param>
		<embed src="http://www.youtube.com/v/'.$id.'?version=3'.$pxsol_youtube_switch.'" type="application/x-shockwave-flash"	allowfullscreen="'.$pxsol_youtube_fullScreen.'" 
		allowScriptAccess="always" width="'.$pxsol_youtube_width.'" height="'.$pxsol_youtube_height.'"></embed>
		</object>';
		if (empty($id)) { 
			$generated_output = '<span class="error-pxsol_youtube">You must set the ID of the YouTube video.</span>';	
		}; 
		return $generated_output;
	}
	function pxsol_youtube_set_options() { add_option('pxsol_youtube_width','425','The width of the YouTube player.'); add_option('pxsol_youtube_height','355','The height of the YouTube player.'); add_option('pxsol_youtube_fullScreen','true','Offer or not the full screen option.'); add_option('pxsol_youtube_controls','true','Display or not the control buttons.'); add_option('pxsol_youtube_autoplay','false','Start the video on page load?');	add_option('pxsol_youtube_hd','false','Force the HD streaming version? (if available)'); add_option('pxsol_youtube_autohide','true','Hide or not the controls after video start.');	add_option('pxsol_youtube_modestbranding','true','Hide or not the YouTube logo.');	add_option('pxsol_youtube_theme','dark','Choose a dark or light buttons style.'); add_option('pxsol_youtube_showinfo','true','Display infos before the video starts playing');}
	function pxsol_youtube_unset_options() { delete_option('pxsol_youtube_width'); delete_option('pxsol_youtube_height'); delete_option('pxsol_youtube_autoplay'); delete_option('pxsol_youtube_hd'); delete_option('pxsol_youtube_fullScreen'); delete_option('pxsol_youtube_controls'); delete_option('pxsol_youtube_autohide'); delete_option('pxsol_youtube_modestbranding'); delete_option('pxsol_youtube_theme');	delete_option('pxsol_youtube_showinfo');}
	function pxsol_youtube_settings_page() { ?>
		<div id="pxsol_youtube" class="wrap">
			<h2 title="Enhanced YouTube Shortcode for WordPress">Enhanced YouTube Shortcode</h2>
			<strong id="version">Version 1.9.1</strong>
			<div class="pxsol_options pxsol_top"><div class="pxsol_bottom">
				<?php _e("<h3>Settings</h3>", 'enhanced-youtube-shortcode');
				if ($_REQUEST['submit']) {
					$pxsol_check = false;
					if ($_REQUEST['pxsol_youtube_width']) {	
						update_option('pxsol_youtube_width',$_REQUEST['pxsol_youtube_width']);
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_height']) { 
						update_option('pxsol_youtube_height',$_REQUEST['pxsol_youtube_height']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_fullScreen']) { 
						update_option('pxsol_youtube_fullScreen',$_REQUEST['pxsol_youtube_fullScreen']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_autoplay']) { 
						update_option('pxsol_youtube_autoplay',$_REQUEST['pxsol_youtube_autoplay']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_hd']) { 
						update_option('pxsol_youtube_hd',$_REQUEST['pxsol_youtube_hd']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_controls']) { 
						update_option('pxsol_youtube_controls',$_REQUEST['pxsol_youtube_controls']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_autohide']) { 
						update_option('pxsol_youtube_autohide',$_REQUEST['pxsol_youtube_autohide']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_modestbranding']) { 
						update_option('pxsol_youtube_modestbranding',$_REQUEST['pxsol_youtube_modestbranding']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_theme']) { 
						update_option('pxsol_youtube_theme',$_REQUEST['pxsol_youtube_theme']); 
						$pxsol_check = true;
					}
					if ($_REQUEST['pxsol_youtube_showinfo']) { 
						update_option('pxsol_youtube_showinfo',$_REQUEST['pxsol_youtube_showinfo']); 
						$pxsol_check = true;
					}
					if ($pxsol_check) { ?>
						<div id="message" class="updated fade">
							<p><?php _e("Settings saved!", 'enhanced-youtube-shortcode');?> <strong>=)</strong></p>
						</div>
					<?php } else { ?>
						<div id="message" class="error fade">
							<p><?php _e("Houston, we got a problem...", 'enhanced-youtube-shortcode');?> <strong>:-(</strong></p>
						</div>
					<?php }	} $default_youtube_width = get_option('pxsol_youtube_width');	$default_youtube_height = get_option('pxsol_youtube_height'); $default_youtube_fullscreen = get_option('pxsol_youtube_fullscreen');	$default_youtube_autoplay = get_option('pxsol_youtube_autoplay'); $default_youtube_hd = get_option('pxsol_youtube_hd');	$default_youtube_controls = get_option('pxsol_youtube_controls'); $default_youtube_autohide = get_option('pxsol_youtube_autohide');	$default_youtube_modestbranding = get_option('pxsol_youtube_modestbranding'); $default_youtube_theme = get_option('pxsol_youtube_theme'); $default_youtube_showinfo = get_option('pxsol_youtube_showinfo'); ?>
				<form method="post">
					<ul>
						<li class="dimension"><label for="pxsol_youtube_width"><strong class="turquoise"><?php _e("Player width:", 'enhanced-youtube-shortcode');?></strong>: <input class="text" type="text" name="pxsol_youtube_width" value="<?=$default_youtube_width?>" /> pixels.</label></li>
						<li class="dimension dernier"><label for="pxsol_youtube_height"><strong class="turquoise"><?php _e("Player height:", 'enhanced-youtube-shortcode');?></strong>:	<input class="text" type="text" name="pxsol_youtube_height" value="<?=$default_youtube_height?>" /> pixels.</label></li>
						<div class="clear">&nbsp;</div>
						<li><label for="pxsol_youtube_fullscreen"><strong class="turquoise"><?php _e("Offer the full screen feature?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_fullscreen == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullscreen" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_fullScreen" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li><label for="pxsol_youtube_autoplay"><strong class="turquoise"><?php _e("Start the video on page load?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_autoplay == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autoplay" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li class="dernier"><label for="pxsol_youtube_hd"><strong class="turquoise"><?php _e("Force the HD streaming version?", 'enhanced-youtube-shortcode');?></strong>
							<?php if ($default_youtube_hd == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_hd" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<div class="clear">&nbsp;</div>
						<li><label for="pxsol_youtube_controls"><strong class="turquoise"><?php _e("Display the control buttons?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_controls == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_controls" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li><label for="pxsol_youtube_autohide"><strong class="turquoise"><?php _e("Hide the controls after video started?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_autohide == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_autohide" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li class="dernier"><label for="pxsol_youtube_modestbranding"><strong class="turquoise"><?php _e("Hide <i>YouTube</i> logo on the bottom bar?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_modestbranding == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_modestbranding" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<div class="clear">&nbsp;</div>
						<li><label for="pxsol_youtube_theme"><strong class="turquoise"><?php _e("Use the <i>dark</i> or <i>light</i> player's theme?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_theme == 'dark') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="dark" checked /> <strong><?php _e("Dark", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="light" /> <?php _e("Light", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="dark" /> <?php _e("Dark", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_theme" value="light" checked /> <strong><?php _e("Light", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
						<li class="dernier"><label for="pxsol_youtube_showinfo"><strong class="turquoise"><?php _e("Display infos before the video starts?", 'enhanced-youtube-shortcode');?></strong><br />
							<?php if ($default_youtube_showinfo == 'true') { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="true" checked /> <strong><?php _e("Yes", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="false" /> <?php _e("No", 'enhanced-youtube-shortcode');?></div>
							<?php } else { ?>
							<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="true" /> <?php _e("Yes", 'enhanced-youtube-shortcode');?></div>
							<div><input class="radio" type="radio" name="pxsol_youtube_showinfo" value="false" checked /> <strong><?php _e("No", 'enhanced-youtube-shortcode');?></strong> (<i><?php _e("saved", 'enhanced-youtube-shortcode');?></i>)</div>
							<?php }; ?>
						</label><div class="clear">&nbsp;</div></li>
					<input type="submit" name="submit" id="submit" title="<?php _e("Submit new settings values", 'enhanced-youtube-shortcode');?>" value="<?php _e("Save Options", 'enhanced-youtube-shortcode');?>" />
					<div class="clear">&nbsp;</div>
					</ul>
				</form>
			</div></div>
			<div class="pxsol_usage pxsol_top"><div class="pxsol_bottom">
				<h3><?php _e("How to use", 'enhanced-youtube-shortcode');?></h3>
				<p><?php _e("Simply add this shortcode in your post to display a YouTube player.", 'enhanced-youtube-shortcode');?><br />
				<i>(...<?php _e("don't forget to replace the ID of the video with your choice!", 'enhanced-youtube-shortcode');?>)</i></p>
				<blockquote class="dernier">[youtube_video id="uAOLzRhKF9c"]</blockquote>
			</div></div>
			<div class="pxsol_versions pxsol_top"><div class="pxsol_bottom">
				<h3>Changelog</h3>
				<p class="dernier"><?php _e('<strong>v1.9.1</strong> Minor HTML errors fixed / Translation preparation / Visual update.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.9</strong> New "infos before playing" setting / Visual & core files dissociation.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.8</strong> New "theme" setting / Code generation refinement / v2.0 groundwork.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.7</strong> Autoplay & HD settings / Logic tweaks.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.6</strong> Bugs repair / Hide YouTube logo / performance improvements.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.5</strong> Initial public release.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.4</strong> Bugs repair / Visual styles.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.3</strong> Possibility to modify the options.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.2</strong> Addition of a page to display the usage & settings.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.1</strong> Translation of the code in a plugin form.', 'enhanced-youtube-shortcode');?><br />
				<?php _e('<strong>v1.0</strong> The core is released as an inclusion for the <i>functions.php</i> file', 'enhanced-youtube-shortcode');?></p>
			</div></div>
			<div class="pxsol_infos pxsol_top"><div class="pxsol_bottom">
				<h3><?php _e('Additionnal informations', 'enhanced-youtube-shortcode');?></h3>
				<p><?php _e('Created & tested on a <i>Wordpress 3.3.1</i> installation.', 'enhanced-youtube-shortcode');?></p>
				<p><?php _e('Many other features will be added very soon so keep in touch for updates!!!', 'enhanced-youtube-shortcode');?></p>
				<br />
				<div class="dernier">
					<form style="float:left;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="<?php _e('PayPal - The safer, easier way to pay online!');?>" title="<?php _e('PayPal - The safer, easier way to pay online!');?>">
						<img alt="" border="0" src="https://www.paypalobjects.com/fr_CA/i/scr/pixel.gif" width="1" height="1">
					</form>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://pxsol.info/nbX83y" title="<?php _e('Protected under the the GNU General Public License.', 'enhanced-youtube-shortcode');?>" class="gnu-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/gplv3-88x31.png" alt="GNU GPL3" title="<?php _e('Protected under the the GNU General Public License.', 'enhanced-youtube-shortcode');?>" width="88" height="31" /></a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://pxsol.info/nrqCdW" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" class="git-link"><img src="<?php echo WP_PLUGIN_URL ?>/enhanced-youtube-shortcode/images/github.png" alt="GitHub" title="Pixel-Solitaire/Enhanced-YouTube-Shortcode - GitHub" width="84" height="32" /></a>
				</div>
			</div></div>
		</div>
		<br />
		<?php }
	function pxsol_youtube_init() {	$pxsol_youtube_css_file = WP_PLUGIN_DIR . '/enhanced-youtube-shortcode/css/pxsol_youtube.css'; $pxsol_youtube_css_link = WP_PLUGIN_URL . '/enhanced-youtube-shortcode/css/pxsol_youtube.css'; if ( file_exists($pxsol_youtube_css_file) ) { wp_register_style('pxsol-youtube', $pxsol_youtube_css_link, false, '1.5', 'all'); wp_enqueue_style('pxsol-youtube');};}
	function pxsol_youtube_menu() {	add_options_page( 'Enhanced YouTube Shortcode', 'Enhanced YouTube', 'manage_options', __FILE__, array($this,'pxsol_youtube_settings_page'));}
	function pxsol_youtube_desc_links($links, $file) { static $this_is_pxsol_youtube; if (!$this_is_pxsol_youtube) $this_is_pxsol_youtube = plugin_basename(__FILE__); if ($file == $this_is_pxsol_youtube){ $pxsol_settings_link = '<a href="/wp-admin/options-general.php?page=enhanced-youtube-shortcode/enhanced-youtube-shortcode.php">'.__("Configuration", "pxsol-youtube").'</a>'; array_push($links, $pxsol_settings_link);};return $links;} } };
	if(class_exists("pxsol_youtube_plugin")) {
		$enhanced_youtube_shortcode = new pxsol_youtube_plugin;
	}
	add_shortcode('youtube_video', array($enhanced_youtube_shortcode,'pxsol_youtube'),1);
	register_activation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_set_options'));
	register_deactivation_hook(__FILE__, array($enhanced_youtube_shortcode,'pxsol_youtube_unset_options'));
	if (is_admin()) {
		add_action( 'admin_init', array($enhanced_youtube_shortcode,'pxsol_youtube_init'),1);
		add_action('admin_menu', array($enhanced_youtube_shortcode,'pxsol_youtube_menu'),1);
		add_filter('plugin_action_links', array($enhanced_youtube_shortcode,'pxsol_youtube_desc_links'), 10, 2 );
	}
?>