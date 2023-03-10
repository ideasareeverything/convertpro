<?php
/**
 * Defined popup types and settings.
 *
 * @package convertpro
 */

/**
 * Class CP_Modal_Popup.
 */
class CP_Modal_Popup extends cp_Framework {



	/**
	 * Options
	 *
	 * @var options
	 */
	public static $options = array();

	/**
	 * Slug
	 *
	 * @var slug
	 */
	public static $slug = 'modal_popup';

	/**
	 * Settings
	 *
	 * @var settings
	 */
	public static $settings = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		self::$settings = array(
			'title'       => __( 'Modal Popup', 'convertpro' ),
			'description' => __( 'A Light-box overlay that can be launched on any web page with a dedicated call to action.', 'convertpro' ),
		);
		add_filter( 'cp_configuration_option', array( $this, 'cp_remove_scrolling_option_in_modal' ), 10, 1 );
		parent::cp_add_popup_type( self::$slug, self::$settings );
	}

	/**
	 * Function Name: cp_remove_scrolling_option_in_modal.
	 * Function Description: Remove the scroll within range section in Modal popup.
	 *
	 * @param array $configure array parameter.
	 * @return array $configure modified.
	 * @since 1.3.8
	 */
	public function cp_remove_scrolling_option_in_modal( $configure ) {

		$options_to_remove = array(
			'autoload_on_scroll',
			'load_after_scroll',
		);
		foreach ( $configure as $option_key => $option ) {
			if ( in_array( $option['name'], $options_to_remove, true ) ) {
				$configure[ $option_key ]['category'] = __( 'After Scroll', 'convertpro' );
			}
		}
		return $configure;
	}

	/**
	 * Function Name: get_options.
	 * Function Description: get options.
	 */
	public function get_options() {
		$options = parent::$options;

		// This will remove Display Inline & Shortcode options.
		$options = parent::cp_remove_configuration_options(
			array(
				'enable_display_inline',
				'inline_position',
				'inline_shortcode',
				'show_after_within_scroll_info',
				'close_after_scroll',
				'select_inline_location',
				'number_of_layout',
				'number_of_layout_heading',
			),
			$options
		);

		$design_options = $this->get_design_options();

		$design_options = apply_filters( 'cp_after_design_fields', $design_options, self::$slug );

		$options['options'] = array_merge( $design_options, $options['options'] );

		$options = parent::cp_remove_field_options(
			array(
				'cp_text',
				'cp_number',
				'cp_dropdown',
				'cp_email',
				'cp_textarea',
				'cp_close_link',
				'cp_custom_html',
				'cp_video',
			),
			array(
				'field_action',
				'btn_url',
				'btn_url_target',
				'btn_url_follow',
				'submit_message_text_color',
				'submit_message_bg_color',
				'submit_message_layout',
				'count_as_conversion',
				'btn_step',
				'submit_message',
				'label_box_shadow',
				'submit_message_font_size',
			),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_heading',
				'cp_sub_heading',
				'cp_paragraph',
			),
			array( 'back_color', 'back_color_hover', 'title', 'text_hover_color', 'field_box_shadow', 'failed_message', 'submit_message_text_color', 'submit_message_bg_color', 'submit_message_layout', 'btn_url', 'btn_url_target', 'btn_url_follow', 'btn_step', 'field_action', 'submit_message', 'label_box_shadow', 'submit_message_font_size', 'label_border', 'border_style', 'border_width', 'border_color', 'border_hover_color', 'border_radius', 'field_padding', 'count_as_conversion', 'get_parameter' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_countdown',
			),
			array( 'back_color', 'back_color_hover', 'title', 'label_layout_clink', 'btn_text_align', 'text_hover_color', 'failed_message', 'submit_message_text_color', 'submit_message_bg_color', 'submit_message_layout', 'line_height', 'btn_url', 'btn_url_target', 'btn_url_follow', 'btn_step', 'field_action', 'submit_message', 'label_box_shadow', 'submit_message_font_size', 'count_as_conversion', 'get_parameter', 'field_padding', 'border_radius', 'border_hover_color', 'border_width', 'border_color', 'border_style', 'label_border', 'text_color', 'font_size' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_shape',
				'cp_dual_color_shape',
			),
			array( 'title', 'font_family', 'font_size', 'text_color', 'text_hover_color', 'back_color', 'back_color_hover', 'letter_spacing', 'btn_text_align', 'line_height', 'label_border', 'border_style', 'border_radius', 'border_color', 'border_hover_color', 'border_width', 'field_padding' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_image',
			),
			array( 'title', 'font_family', 'font_size', 'text_color', 'text_hover_color', 'back_color', 'back_color_hover', 'letter_spacing', 'btn_text_align', 'line_height', 'field_padding' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_text',
				'cp_number',
				'cp_dropdown',
				'cp_email',
				'cp_textarea',
			),
			array( 'title', 'font_family', 'font_size', 'text_color', 'text_hover_color', 'input_text_padding', 'border_style', 'border_color', 'border_width', 'border_radius', 'field_box_shadow', 'field_padding' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_gradient_button',
			),
			array( 'back_color', 'back_color_hover', 'font_family', 'font_size', 'text_color', 'text_hover_color', 'btn_text_align', 'letter_spacing', 'line_height', 'label_position', 'respective_to', 'is_outside_hide' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_custom_html',
				'cp_video',
			),
			array( 'text_hover_color', 'back_color', 'back_color_hover', 'title', 'label_action', 'text_hover_color', 'failed_message', 'submit_message_text_color', 'submit_message_bg_color', 'submit_message_layout', 'btn_url', 'btn_url_target', 'btn_url_follow', 'btn_step', 'field_action', 'submit_message', 'submit_message_font_size', 'field_padding', 'get_parameter' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_video',
			),
			array( 'font_family', 'font_size', 'line_height', 'letter_spacing', 'btn_text_align', 'text_color', 'rotate_field', 'respective_to', 'is_outside_hide', 'non_clickable', 'label_position', 'behaviour' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_close_text',
				'cp_close_image',
			),
			array( 'back_color', 'back_color_hover', 'title', 'font_family', 'font_size', 'text_color', 'text_hover_color', 'label_layout_clink', 'btn_text_align', 'letter_spacing', 'line_height', 'failed_message', 'submit_message_text_color', 'submit_message_bg_color', 'submit_message_layout', 'btn_url', 'btn_url_target', 'btn_url_follow', 'btn_step', 'field_action', 'submit_message', 'label_box_shadow', 'submit_message_font_size', 'field_padding', 'get_parameter', 'count_as_conversion' ),
			$options
		);

		$options = parent::cp_remove_field_options(
			array(
				'cp_button',
			),
			array( 'line_height', 'text_color', 'text_hover_color', 'back_color', 'back_color_hover', 'label_position', 'respective_to', 'is_outside_hide' ),
			$options
		);

		$options = apply_filters( 'cp_after_options', $options );

		return $options;
	}
	/**
	 * Function Name: get_design_options.
	 * Function Description: get design options.
	 */
	public function get_design_options() {

		$icons_array = parent::$icon_options;

		// check if affiliate link is active.
		$panel_design_options = array(
			array(
				'type'           => 'number',
				'class'          => '',
				'name'           => 'panel_width',
				'opts'           => array(
					'title'         => __( 'Width', 'convertpro' ),
					'value'         => array( 700, 320 ),
					'default_value' => array( 700, 320 ),
					'min'           => 100,
					'max'           => array( 800, 360 ),
					'step'          => 1,
					'suffix'        => 'px',
					'reset'         => 'true',
					'description'   => __( 'Width for Panel', 'convertpro' ),
					'tags'          => 'size,width',
					'map_style'     => array(
						'parameter' => 'width',
						'unit'      => 'px',
					),
					'global'        => false,
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Size',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'number',
				'class'          => '',
				'name'           => 'panel_height',
				'opts'           => array(
					'title'         => __( 'Height', 'convertpro' ),
					'value'         => array( 400, 480 ),
					'default_value' => array( 400, 480 ),
					'min'           => 100,
					'max'           => array( 800, 600 ),
					'step'          => 1,
					'suffix'        => 'px',
					'reset'         => 'true',
					'description'   => __( 'Height for Panel', 'convertpro' ),
					'tags'          => 'size,height',
					'map_style'     => array(
						'parameter' => 'height',
						'unit'      => 'px',
					),
					'global'        => false,
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Size',
				'show_on_mobile' => true,
			),
			array(
				'type'         => 'switch',
				'class'        => '',
				'name'         => 'inherit_bg_prop',
				'opts'         => array(
					'title'          => __( 'Background Properties', 'convertpro' ),
					'value'          => true,
					'on'             => __( 'Inherit', 'convertpro' ),
					'off'            => __( 'Custom', 'convertpro' ),
					'description'    => __( 'If enabled, background properties will get inherited from first step', 'convertpro' ),
					'tags'           => 'inherit',
					'global'         => false,
					'map_style'      => array(
						'parameter' => 'inherit_bg',
					),
					'show_on_mobile' => true,
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Background',
			),
			array(
				'type'           => 'dropdown',
				'class'          => '',
				'name'           => 'background_type',
				'opts'           => array(
					'title'       => __( 'Background Type', 'convertpro' ),
					'value'       => 'color',
					'description' => '',
					'options'     => array(
						'color'    => __( 'Color', 'convertpro' ),
						'gradient' => __( 'Gradient', 'convertpro' ),
						'image'    => __( 'Image', 'convertpro' ),
					),
					'map_style'   => array(
						'parameter' => 'background_type',
					),
					'tags'        => 'background type,background',
					'global'      => false,
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'colorpicker',
				'class'          => '',
				'name'           => 'panel_lighter_color',
				'opts'           => array(
					'title'       => __( 'First Color', 'convertpro' ),
					'value'       => '#fff',
					'description' => '',
					'tags'        => 'background,linear,radial,gradient,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'lighten_color',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'colorpicker',
				'class'          => '',
				'name'           => 'panel_darker_color',
				'opts'           => array(
					'title'       => __( 'Second Color', 'convertpro' ),
					'value'       => '#ddd',
					'description' => '',
					'tags'        => 'background,linear,radial,gradient,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'darken-color',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'slider',
				'class'          => '',
				'name'           => 'gradient_lighter_location',
				'opts'           => array(
					'title'       => __( 'Gradient Start Location', 'convertpro' ),
					'value'       => 0,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
					'suffix'      => '%',
					'description' => '',
					'tags'        => 'background,linear,radial,gradient,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'gradient_lighter_location',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'slider',
				'class'          => '',
				'name'           => 'gradient_darker_location',
				'opts'           => array(
					'title'       => __( 'Gradient End Location', 'convertpro' ),
					'value'       => 100,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
					'suffix'      => '%',
					'description' => '',
					'tags'        => 'background,linear,radial,gradient,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'gradient_darker_location',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'dropdown',
				'class'          => '',
				'name'           => 'panel_gradient_type',
				'opts'           => array(
					'title'     => __( 'Type', 'convertpro' ),
					'value'     => 'lineargradient',
					'options'   => array(
						'lineargradient' => __( 'Linear', 'convertpro' ),
						'radialgradient' => __( 'Radial', 'convertpro' ),
					),
					'tags'      => 'background,linear,radial,gradient,gradient type,linear gradient,radial gradient',
					'map_style' => array(
						'parameter' => 'panel_gradient_type',
					),
					'global'    => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'dropdown',
				'class'          => '',
				'name'           => 'radial_panel_gradient_direction',
				'opts'           => array(
					'title'       => __( 'Gradient Direction', 'convertpro' ),
					'value'       => 'center_center',
					'description' => '',
					'options'     => array(
						'center_center' => __( 'Center Center', 'convertpro' ),
						'center_left'   => __( 'Center Left', 'convertpro' ),
						'center_right'  => __( 'Center Right', 'convertpro' ),
						'top_center'    => __( 'Top Center', 'convertpro' ),
						'top_left'      => __( 'Top Left', 'convertpro' ),
						'top_right'     => __( 'Top Right', 'convertpro' ),
						'bottom_center' => __( 'Bottom Center', 'convertpro' ),
						'bottom_left'   => __( 'Bottom Left', 'convertpro' ),
						'bottom_right'  => __( 'Bottom Right', 'convertpro' ),
					),
					'tags'        => 'background,radial,gradient,gradient direction,radial gradient',
					'map_style'   => array(
						'parameter' => 'radial_gradient_direction',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'panel_gradient_type',
					'operator' => '==',
					'value'    => 'radialgradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'slider',
				'class'          => '',
				'name'           => 'gradient_angle',
				'opts'           => array(
					'title'       => __( 'Gradient Direction', 'convertpro' ),
					'value'       => 180,
					'min'         => 0,
					'max'         => 360,
					'step'        => 1,
					'suffix'      => 'deg',
					'description' => '',
					'tags'        => 'background,linear,gradient,angle,linear gradient',
					'map_style'   => array(
						'parameter' => 'gradient_angle',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'panel_gradient_type',
					'operator' => '==',
					'value'    => 'lineargradient',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'colorpicker',
				'class'          => '',
				'name'           => 'panel_background_color',
				'opts'           => array(
					'title'       => __( 'Background Color', 'convertpro' ),
					'value'       => '#fff',
					'description' => '',
					'tags'        => 'background,background color',
					'map_style'   => array(
						'parameter' => 'background-color',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'color',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'media',
				'class'          => '',
				'name'           => 'panel_bg_image',
				'opts'           => array(
					'title'       => __( 'Background Image', 'convertpro' ),
					'value'       => '0|modules/img/grey.png',
					'description' => __( "You can provide an image that would be appear behind the content in the modal box area. For this setting to work, the background color you've chosen must be transparent.", 'convertpro' ),
					'tags'        => 'background image,background',
					'map_style'   => array(
						'parameter' => 'background-image',
					),
					'global'      => false,
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'image',
				),
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'background',
				'class'          => '',
				'name'           => 'opt_bg',
				'opts'           => array(
					'title'     => '',
					'value'     => 'repeat|center|contain',
					'tags'      => 'background image,background,background repeat,background position,background size',
					'map_style' => array(
						'parameter' => 'background_opt',
					),
					'global'    => false,
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'image',
				),
				'category'       => 'Background',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'colorpicker',
				'class'          => '',
				'name'           => 'panel_img_overlay_color',
				'opts'           => array(
					'title'       => __( 'Background Overlay Color', 'convertpro' ),
					'value'       => 'rgba(0,0,0,0.12)',
					'description' => '',
					'tags'        => 'background,background overlay color',
					'map_style'   => array(
						'parameter' => 'panel_img_overlay_color',
					),
					'global'      => false,
				),
				'dependency'     => array(
					'name'     => 'background_type',
					'operator' => '==',
					'value'    => 'image',
				),
				'panel'          => 'Panel',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-panel',
				'category'       => 'Background',
				'show_on_mobile' => true,
				'global'         => false,
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'overlay_gradient_type',
				'opts'         => array(
					'title'     => __( 'Overlay Type', 'convertpro' ),
					'value'     => 'color',
					'options'   => array(
						'color'    => __( 'Color', 'convertpro' ),
						'gradient' => __( 'Gradient', 'convertpro' ),
					),
					'tags'      => 'overlay,type,overlay type',
					'map_style' => array(
						'parameter' => 'overlay-gradient-type',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'overlay_lighter_color',
				'opts'         => array(
					'title'       => __( 'Color 1', 'convertpro' ),
					'value'       => 'rgba(255,255,255,0.9)',
					'description' => '',
					'tags'        => 'overlay,linear,gradient,radial,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'overlay_lighter_color',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'slider',
				'class'        => '',
				'name'         => 'overlay_lighter_location',
				'opts'         => array(
					'title'       => __( 'Location 1', 'convertpro' ),
					'value'       => 0,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
					'suffix'      => '%',
					'description' => '',
					'tags'        => 'overlay,linear,gradient,radial,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'overlay_lighter_location',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'overlay_darker_color',
				'opts'         => array(
					'title'       => __( 'Color 2', 'convertpro' ),
					'value'       => 'rgba(221,221,221,0.9)',
					'description' => '',
					'tags'        => 'overlay,linear,gradient,radial,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'overlay-darker-color',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'slider',
				'class'        => '',
				'name'         => 'overlay_darker_location',
				'opts'         => array(
					'title'       => __( 'Location 2', 'convertpro' ),
					'value'       => 100,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
					'suffix'      => '%',
					'description' => '',
					'tags'        => 'overlay,linear,gradient,radial,linear gradient,radial gradient',
					'map_style'   => array(
						'parameter' => 'overlay_darker_location',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'overlay_panel_gradient_type',
				'opts'         => array(
					'title'     => __( 'Type', 'convertpro' ),
					'value'     => 'lineargradient',
					'options'   => array(
						'lineargradient' => __( 'Linear', 'convertpro' ),
						'radialgradient' => __( 'Radial', 'convertpro' ),
					),
					'tags'      => 'overlay,linear,gradient,gradient type,radial,linear gradient,radial gradient',
					'map_style' => array(
						'parameter' => 'overlay_panel_gradient_type',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'gradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'radial_overlay_gradient_direction',
				'opts'         => array(
					'title'       => __( 'Gradient Direction', 'convertpro' ),
					'value'       => 'center_center',
					'description' => '',
					'options'     => array(
						'center_center' => __( 'Center Center', 'convertpro' ),
						'center_left'   => __( 'Center Left', 'convertpro' ),
						'center_right'  => __( 'Center Right', 'convertpro' ),
						'top_center'    => __( 'Top Center', 'convertpro' ),
						'top_left'      => __( 'Top Left', 'convertpro' ),
						'top_right'     => __( 'Top Right', 'convertpro' ),
						'bottom_center' => __( 'Bottom Center', 'convertpro' ),
						'bottom_left'   => __( 'Bottom Left', 'convertpro' ),
						'bottom_right'  => __( 'Bottom Right', 'convertpro' ),
					),
					'tags'        => 'overrlay,linear,radial,gradient,radial gradient,gradient direction',
					'map_style'   => array(
						'parameter' => 'radial_overlay_gradient_direction',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_panel_gradient_type',
					'operator' => '==',
					'value'    => 'radialgradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'slider',
				'class'        => '',
				'name'         => 'overlay_gradient_angle',
				'opts'         => array(
					'title'       => __( 'Angle', 'convertpro' ),
					'value'       => 180,
					'min'         => 0,
					'max'         => 360,
					'step'        => 1,
					'suffix'      => 'deg',
					'description' => '',
					'tags'        => 'overlay,linear,gradient,angle,linear gradient',
					'map_style'   => array(
						'parameter' => 'overlay_gradient_angle',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_panel_gradient_type',
					'operator' => '==',
					'value'    => 'lineargradient',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'panel_overlay_color',
				'opts'         => array(
					'title'       => __( 'Overlay Color', 'convertpro' ),
					'value'       => 'rgba(0,0,0,0.8)',
					'default'     => 'rgba(0,0,0,0.8)',
					'description' => __( 'Select Overlay color.', 'convertpro' ),
					'tags'        => 'overlay,color,overlay color',
					'map_style'   => array(
						'parameter' => 'overlay-color',
					),
				),
				'dependency'   => array(
					'name'     => 'overlay_gradient_type',
					'operator' => '==',
					'value'    => 'color',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'switch',
				'class'        => '',
				'name'         => 'close_overlay_click',
				'opts'         => array(
					'title'       => __( 'Close on Overlay Click', 'convertpro' ),
					'value'       => true,
					'on'          => __( 'YES', 'convertpro' ),
					'off'         => __( 'NO', 'convertpro' ),
					'description' => __( 'If enabled, modal will close when user click on Overlay.', 'convertpro' ),
					'tags'        => 'close link,close,overlay,click,close on overlay click',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Overlay',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'panel_entry_animation',
				'opts'         => array(
					'title'       => __( 'Entry Animation Effect', 'convertpro' ),
					'value'       => 'cp-fadeIn',
					'description' => '',
					'options'     => apply_filters( 'cp_entry_animations', array() ),
					'tags'        => 'animation,entry animation effect,entry,effect',
					'map_style'   => array(
						'parameter' => 'entry_animation',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Animation',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'panel_border_style',
				'opts'         => array(
					'title'     => __( 'Border Style', 'convertpro' ),
					'value'     => 'none',
					'options'   => parent::$border_options,
					'tags'      => 'border,border style',
					'map_style' => array(
						'parameter' => 'border-style',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Border',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'panel_border_color',
				'opts'         => array(
					'title'       => __( 'Border Color', 'convertpro' ),
					'value'       => '#e1e1e1',
					'description' => '',
					'tags'        => 'border,border color',
					'map_style'   => array(
						'parameter' => 'border-color',
					),
				),
				'dependency'   => array(
					'name'     => 'panel_border_style',
					'operator' => '!=',
					'value'    => 'none',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Border',
			),
			array(
				'type'         => 'multiinput',
				'class'        => '',
				'name'         => 'panel_border_width',
				'opts'         => array(
					'title'     => __( 'Border Width', 'convertpro' ),
					'value'     => '1|1|1|1|px',
					'min'       => 0,
					'max'       => 50,
					'step'      => 1,
					'suffix'    => 'px',
					'tags'      => 'border,border width',
					'map_style' => array(
						'parameter' => 'border-width',
					),
				),
				'dependency'   => array(
					'name'     => 'panel_border_style',
					'operator' => '!=',
					'value'    => 'none',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Border',
			),
			array(
				'type'         => 'multiinput',
				'class'        => '',
				'name'         => 'panel_border_radius',
				'opts'         => array(
					'title'     => __( 'Rounded Corners', 'convertpro' ),
					'value'     => '3|3|3|3|px',
					'min'       => 0,
					'max'       => 250,
					'step'      => 1,
					'suffix'    => 'px',
					'tags'      => 'border,rounded corners',
					'map_style' => array(
						'parameter' => 'border-radius',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Border',
			),
			array(
				'type'         => 'box_shadow',
				'class'        => '',
				'name'         => 'panel_box_shadow',
				'opts'         => array(
					'title'     => '',
					'value'     => 'type:none|horizontal:0|vertical:0|blur:5|spread:0|color:rgba(86,86,131,0.6)',
					'tags'      => 'box shadow,shadow color,blur radius,spread radius,horizontal length,vertical length',
					'map_style' => array(
						'parameter' => 'box-shadow',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Shadow',
			),
			array(
				'type'         => 'slider',
				'class'        => '',
				'name'         => 'cp_mobile_br_point',
				'opts'         => array(
					'title'          => __( 'Mobile Breakpoint', 'convertpro' ),
					'value'          => 767,
					'min'            => 300,
					'max'            => 800,
					'step'           => 1,
					'suffix'         => 'px',
					'description'    => __( 'Responsive breakpoint for mobile.', 'convertpro' ),
					'tags'           => 'mobile,breakpoint',
					'show_on_mobile' => true,
					'map_style'      => array(
						'parameter' => 'mobile-breakpoint',
					),
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Mobile Breakpoint',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'credit_link_color',
				'opts'         => array(
					'title'       => __( 'Credit Link Color', 'convertpro' ),
					'value'       => '#fff',
					'description' => '',
					'tags'        => 'credit link,credit link color',
				),
				'panel'        => 'Panel',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-panel',
				'category'     => 'Credit Link',
			),

		);

		$credit_enable = esc_attr( get_option( 'cp_credit_option' ) );
		if ( '' !== $credit_enable && '0' === $credit_enable ) {
			foreach ( $panel_design_options as $key => $value ) {
				if ( 'credit_link_color' === $value['name'] ) {
					unset( $panel_design_options[ $key ] );
				}
			}
		}

		/*** Arr'y con'ains'Advance'design field options */
		$design_field_options = array(

			// Heading.
			parent::$cp_heading_opts,

			// Sub Heading.
			parent::$cp_subheading_opts,

			// Paragraph.
			parent::$cp_paragraph_opts,

			// Custom HTML.
			parent::$cp_custom_html_opts,

			// Image.
			parent::$cp_image_opts,

			// Video.
			parent::$cp_video_options,

			// Close Image.
			parent::$close_image_opts,

			// Close Link.
			parent::$close_link_opts,

			// Countdown Element.
			parent::$cp_countdown_opts,

			// Form - Email Field.
			parent::$cp_form_email_opts,

			// Form - Name Field.
			parent::$cp_form_name_opts,

			// Form - Phone Field.
			parent::$cp_form_phone_opts,

			// Form - Dropdown Field.
			parent::$cp_form_dropdown_opts,

			// Form - Textarea Field.
			parent::$cp_form_textarea_opts,

			// Form - Radio Button Field.
			parent::$cp_form_radio_opts,

			// Form - Checkbox Field.
			parent::$cp_form_checkbox_opts,

			// Form - Hidden Input Field.
			parent::$cp_form_hiddeninput_opts,

			// Form - Google Recaptcha Input Field.
			parent::$cp_form_google_recaptcha_opts,

			// Form - Date Field.
			parent::$cp_form_date_opts,

			// Form - Typography Accordion.
			array(
				'type'         => 'font',
				'class'        => '',
				'name'         => 'form_field_font',
				'opts'         => array(
					'title'       => __( 'Font Family', 'convertpro' ),
					'value'       => 'inherit:inherit',
					'description' => '',
					'tags'        => 'field font,font family, font weight',
					'map_style'   => array(
						'parameter' => 'font-family',
					),
					'global'      => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Typography',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'form_field_text_transform',
				'opts'         => array(
					'title'     => __( 'Text Transform', 'convertpro' ),
					'value'     => 'none',
					'options'   => cp_Framework::$text_transform_options,
					'tags'      => 'field font,font family, font weight',
					'map_style' => array(
						'parameter' => 'text-transform',
					),
					'global'    => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Typography',
			),
			array(
				'type'           => 'slider',
				'class'          => '',
				'name'           => 'form_field_font_size',
				'opts'           => array(
					'title'       => __( 'Font Size', 'convertpro' ),
					'value'       => 13,
					'min'         => 1,
					'max'         => 72,
					'step'        => 1,
					'suffix'      => 'px',
					'description' => '',
					'tags'        => 'field font,font,size,font size',
					'map_style'   => array(
						'parameter' => 'font-size',
						'unit'      => 'px',
					),
					'global'      => false,
				),
				'panel'          => 'Form',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-field',
				'has_params'     => false,
				'category'       => 'Typography',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'numberfield',
				'class'          => '',
				'name'           => 'form_field_letter_spacing',
				'opts'           => array(
					'title'     => __( 'Letter Spacing', 'convertpro' ),
					'value'     => '0',
					'suffix'    => 'px,em',
					'tags'      => 'letter,spacing,letter spacing,field font',
					'map_style' => array(
						'parameter' => 'letter-spacing',
					),
					'global'    => false,
				),
				'panel'          => 'Form',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-field',
				'has_params'     => false,
				'category'       => 'Typography',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'text-align',
				'class'          => '',
				'name'           => 'form_field_text_align',
				'opts'           => array(
					'title'     => __( 'Text Alignment', 'convertpro' ),
					'value'     => 'left',
					'suffix'    => 'px,em',
					'options'   => array(
						'center'  => __( 'center', 'convertpro' ),
						'left'    => __( 'left', 'convertpro' ),
						'right'   => __( 'right', 'convertpro' ),
						'justify' => __( 'justify', 'convertpro' ),
					),
					'tags'      => 'text,align,text alignment,field font',
					'map_style' => array(
						'parameter' => 'text-align',
					),
					'global'    => false,
				),
				'panel'          => 'Form',
				'section'        => 'Design',
				'section_icon'   => 'cp-icon-field',
				'has_params'     => false,
				'category'       => 'Typography',
				'show_on_mobile' => true,
			),

			// Form - Advanced Accordion.
			array(
				'type'         => 'label',
				'class'        => '',
				'name'         => 'form_field_color_label',
				'opts'         => array(
					'title'  => '',
					'label'  => __( 'Color', 'convertpro' ),
					'global' => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Styling',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'form_field_color',
				'opts'         => array(
					'title'       => __( 'Text Color', 'convertpro' ),
					'value'       => '#666',
					'description' => '',
					'tags'        => 'field color,text color',
					'map_style'   => array(
						'parameter' => 'color',
					),
					'global'      => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Styling',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'form_field_placeholder_color',
				'opts'         => array(
					'title'       => __( 'Placeholder Color', 'convertpro' ),
					'value'       => '#666',
					'description' => '',
					'tags'        => 'field color,text color',
					'map_style'   => array(
						'parameter' => 'color',
						'target'    => 'placeholder',
					),
					'global'      => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Styling',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'form_field_bg_color',
				'opts'         => array(
					'title'       => __( 'Background Color', 'convertpro' ),
					'value'       => '#fff',
					'description' => '',
					'tags'        => 'field color,background color',
					'map_style'   => array(
						'parameter' => 'background-color',
					),
					'global'      => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Styling',
			),
			array(
				'type'         => 'label',
				'class'        => '',
				'name'         => 'form_field_border_label',
				'opts'         => array(
					'title'  => '',
					'label'  => __( 'Border', 'convertpro' ),
					'global' => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'dropdown',
				'class'        => '',
				'name'         => 'form_field_border_style',
				'opts'         => array(
					'title'     => __( 'Border Style', 'convertpro' ),
					'value'     => 'solid',
					'options'   => cp_Framework::$border_options,
					'tags'      => 'field border,border style',
					'map_style' => array(
						'parameter' => 'border-style',
					),
					'global'    => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'has_params'   => false,
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'multiinput',
				'class'        => '',
				'name'         => 'form_field_border_width',
				'opts'         => array(
					'title'       => __( 'Border Width', 'convertpro' ),
					'value'       => '1|1|1|1|px',
					'min'         => 0,
					'max'         => 50,
					'step'        => 1,
					'suffix'      => 'px',
					'description' => '',
					'tags'        => 'field border,border width',
					'map_style'   => array(
						'parameter' => 'border-width',
					),
					'global'      => false,
				),
				'dependency'   => array(
					'name'     => 'form_field_border_style',
					'operator' => '!=',
					'value'    => 'none',
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'multiinput',
				'class'        => '',
				'name'         => 'form_field_border_radius',
				'opts'         => array(
					'title'       => __( 'Border Radius', 'convertpro' ),
					'value'       => '1|1|1|1|px',
					'min'         => 0,
					'max'         => 250,
					'step'        => 1,
					'suffix'      => 'px',
					'description' => '',
					'tags'        => 'field border,border radius',
					'map_style'   => array(
						'parameter' => 'border-radius',
					),
					'global'      => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'form_field_border_color',
				'opts'         => array(
					'title'     => __( 'Border Color', 'convertpro' ),
					'value'     => '#bbb',
					'tags'      => 'field border,border color',
					'map_style' => array(
						'parameter' => 'border-color',
					),
					'global'    => false,
				),
				'dependency'   => array(
					'name'     => 'form_field_border_style',
					'operator' => '!=',
					'value'    => 'none',
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'colorpicker',
				'class'        => '',
				'name'         => 'form_field_active_border_color',
				'opts'         => array(
					'title'       => __( 'Active Field Border Color', 'convertpro' ),
					'value'       => '#666',
					'description' => '',
					'tags'        => 'field border,active field border color',
					'map_style'   => array(
						'parameter' => 'active-border-color',
					),
					'global'      => false,
				),
				'dependency'   => array(
					'name'     => 'form_field_border_style',
					'operator' => '!=',
					'value'    => 'none',
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'label',
				'class'        => '',
				'name'         => 'form_field_box_shadow_label',
				'opts'         => array(
					'title'  => '',
					'label'  => __( 'Box Shadow', 'convertpro' ),
					'global' => false,
				),
				'panel'        => 'Form',
				'section'      => 'Design',
				'has_params'   => false,
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'         => 'box_shadow',
				'class'        => '',
				'name'         => 'form_field_box_shadow',
				'opts'         => array(
					'title'     => '',
					'value'     => 'type:none|horizontal:0|vertical:0|blur:5|spread:0|color:rgba(86,86,131,0.6)',
					'tags'      => 'field box shadow,shadow effect,shadow color,blur radius,spread radius,horizontal length,vertical length',
					'map_style' => array(
						'parameter' => 'box-shadow',
					),
					'global'    => false,
				),
				'panel'        => 'Form',
				'has_params'   => false,
				'section'      => 'Design',
				'section_icon' => 'cp-icon-field',
				'category'     => 'Advanced',
			),
			array(
				'type'           => 'label',
				'class'          => '',
				'name'           => 'form_field_padding_label',
				'opts'           => array(
					'title'  => '',
					'label'  => __( 'Padding', 'convertpro' ),
					'global' => false,
				),
				'panel'          => 'Form',
				'section'        => 'Design',
				'has_params'     => false,
				'section_icon'   => 'cp-icon-field',
				'category'       => 'Advanced',
				'show_on_mobile' => true,
			),
			array(
				'type'           => 'multiinput',
				'class'          => '',
				'name'           => 'form_field_padding',
				'opts'           => array(
					'title'       => __( 'Padding', 'convertpro' ),
					'value'       => '0|10|0|10|px',
					'min'         => 0,
					'max'         => 50,
					'step'        => 1,
					'suffix'      => 'px',
					'description' => '',
					'tags'        => 'field padding,padding',
					'map_style'   => array(
						'parameter' => 'padding',
					),
					'global'      => false,
				),
				'panel'          => 'Form',
				'section'        => 'Design',
				'has_params'     => false,
				'section_icon'   => 'cp-icon-field',
				'category'       => 'Advanced',
				'show_on_mobile' => true,
			),

			// Button - Flat Button.
			parent::$cp_button_flatbtn_opts,

			// Button - Gradient Button.
			parent::$cp_button_gradientbtn_opts,

			// Shapes.
			parent::$cp_shapes_opts,
		);

		$design_field_options = apply_filters( 'cp_update_design_options', $design_field_options );
		$panel_design_options = array_merge( $design_field_options, $panel_design_options );

		return $panel_design_options;
	}
}

new CP_Modal_Popup();
