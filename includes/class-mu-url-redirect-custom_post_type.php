<?php
/**
 * Register all custom post types for the plugin
 *
 * @link       https://audilu.com
 * @since      1.0.0
 *
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/includes
 */

/**
 * Register all custom post types for the plugin.
 *
 * Maintain a list of all custom post types that are registered throughout
 * the plugin, and register them with the WordPress API.
 *
 * @package    Mu_Url_Redirect
 * @subpackage Mu_Url_Redirect/includes
 * @author     Audi Lu <mrmu@mrmu.com.tw>
 */
class Mu_Url_Redirect_Custom_Post_Type {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }
    
    public function reg() {

		if ( post_type_exists( "re_url" ) )
            return;

        $plugin_name = $this->plugin_name;

        // // Custom Taxonomy

		// $tax_singular  = __( 'taxonomy name', $plugin_name );
		// $tax_plural = __( 'taxonomy names', $plugin_name );
        // $rewrite   = array(
        //     'slug'         => 'taxonomy-name',
        //     'with_front'   => false,
        //     'hierarchical' => false
        // );
        // $public    = true;
        // $admin_capability = 'manage_categories';

        // register_taxonomy(
        //     "taxonomy_name",
        //     array( 'cpt_slug' ),
        //     array(
        //         'hierarchical' 			=> true,
        //         'label' 				=> $tax_singular,
        //         'labels' => array(
        //             'name'              => $tax_singular,
        //             'singular_name'     => $tax_singular,
        //             'menu_name'         => ucwords( $tax_singular ),
        //             'search_items'      => sprintf( __( 'Search %s', $plugin_name ), $tax_plural ),
        //             'all_items'         => sprintf( __( 'All %s', $plugin_name ), $tax_plural ),
        //             'parent_item'       => sprintf( __( 'Parent %s', $plugin_name ), $tax_singular ),
        //             'parent_item_colon' => sprintf( __( 'Parent %s:', $plugin_name ), $tax_singular ),
        //             'edit_item'         => sprintf( __( 'Edit %s', $plugin_name ), $tax_singular ),
        //             'update_item'       => sprintf( __( 'Update %s', $plugin_name ), $tax_singular ),
        //             'add_new_item'      => sprintf( __( 'Add New %s', $plugin_name ), $tax_singular ),
        //             'new_item_name'     => sprintf( __( 'New %s Name', $plugin_name ),  $tax_singular )
        //         ),
        //         'show_ui' 				=> true,
        //         'public' 	     		=> $public,
        //         'capabilities'			=> array(
        //             'manage_terms' 		=> $admin_capability,
        //             'edit_terms' 		=> $admin_capability,
        //             'delete_terms' 		=> $admin_capability,
        //             'assign_terms' 		=> $admin_capability,
        //         ),
        //         'rewrite' 				=> $rewrite,
        //     )
        // );

        // Custom Post types

		$singular  = __( 'Redirect', $plugin_name );
        $plural = __( 'Redirects', $plugin_name );
        $menu_name = __( 'Redirects', $plugin_name );

        $has_archive = false;
        $rewrite     = array(
            'slug'       => 'urlto',
            'with_front' => false,
            'feeds'      => true,
            'pages'      => false
        );

        register_post_type(
            "re_url",
            array(
                'labels' => array(
                    'name' 					=> $singular,
                    'singular_name' 		=> $singular,
                    'menu_name'             => sprintf( __( '%s', $plugin_name ), $menu_name ),
                    'all_items'             => sprintf( __( 'All %s', $plugin_name ), $plural ),
                    'add_new' 				=> __( 'Add New', $plugin_name ),
                    'add_new_item' 			=> sprintf( __( 'Add %s', $plugin_name ), $singular ),
                    'edit' 					=> __( 'Edit', $plugin_name ),
                    'edit_item' 			=> sprintf( __( 'Edit %s', $plugin_name ), $singular ),
                    'new_item' 				=> sprintf( __( 'New %s', $plugin_name ), $singular ),
                    'view' 					=> sprintf( __( 'View %s', $plugin_name ), $singular ),
                    'view_item' 			=> sprintf( __( 'View %s', $plugin_name ), $singular ),
                    'search_items' 			=> sprintf( __( 'Search %s', $plugin_name ), $plural ),
                    'not_found' 			=> sprintf( __( 'No %s found', $plugin_name ), $singular ),
                    'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', $plugin_name ), $singular ),
                    'parent' 				=> sprintf( __( 'Parent %s', $plugin_name ), $singular ),
                    // 'featured_image'        => __( 'Event Cover', $plugin_name ),
                    'set_featured_image'    => __( 'Set event cover', $plugin_name ),
                    'remove_featured_image' => __( 'Remove event cover', $plugin_name ),
                    'use_featured_image'    => __( 'Use as event cover', $plugin_name ),
                ),
                'description' => sprintf( __( 'This is where you can create and manage %s.', $plugin_name ), $singular ),
                'public' 				=> true,
                'show_ui' 				=> true,
                'capability_type' 		=> 'post',
                'map_meta_cap'          => true,
                'publicly_queryable' 	=> true,
                'exclude_from_search' 	=> false,
                'hierarchical' 			=> false,
                'rewrite' 				=> $rewrite,
                'query_var' 			=> true,
                'supports' 				=> array( 'title', 'editor', 'custom-fields' , 'thumbnail'),
                'has_archive' 			=> $has_archive,
                'show_in_nav_menus' 	=> false,
                'menu_icon' => 'dashicons-calendar'
            )
        );


		// // Custom Post status

		// register_post_status( 'expired', array(
		// 	'label'                     => _x( 'Expired', 'post status', $plugin_name ),
		// 	'public'                    => true,
		// 	'exclude_from_search'       => true,
		// 	'show_in_admin_all_list'    => true,
		// 	'show_in_admin_status_list' => true,
		// 	'label_count'               => _n_noop( 'Expired <span class="count">(%s)</span>', 'Expired <span class="count">(%s)</span>', $plugin_name )
		// ) );

		// register_post_status( 'preview', array(
		// 	'public'                    => true,
		// 	'exclude_from_search'       => true,
		// 	'show_in_admin_all_list'    => true,
		// 	'show_in_admin_status_list' => true,
		// 	'label_count'               => _n_noop( 'Preview <span class="count">(%s)</span>', 'Preview <span class="count">(%s)</span>', $plugin_name )
        // ) );

    }


	public function mu_meta_box_add() {
		add_meta_box( 'mu-meta-box-type', 'URL Settings', array($this, 'mu_meta_box_func'), 're_url', 'normal', 'high' );
	}

	public function mu_meta_box_func( $post ) {
        $mu_url_type = get_post_meta( $post->ID, 'mu_url_type', true);
        $mu_url_url = get_post_meta( $post->ID, 'mu_url_url', true);
        if (empty($mu_url_type)) {
            $mu_url_url = empty($mu_url_url) ? 'http://www.google.com/calendar/event?action=TEMPLATE' : $mu_url_url;
        }
        $mu_url_location = get_post_meta( $post->ID, 'mu_url_location', true);
        $mu_url_google_calendar_date_s = get_post_meta( $post->ID, 'mu_url_google_calendar_date_s', true);
        $mu_url_google_calendar_date_e = get_post_meta( $post->ID, 'mu_url_google_calendar_date_e', true);
		?>
		<p>
            <h3>General</h3>
			<label for="mu_url_type">URL Type：</label>
			<select name='mu_url_type' id='mu_url_type'>
				<option value="google_calendar_event_link" <?php echo ($mu_url_type === 'google_calendar_event_link')?'selected':''; ?>>Google Calendar Event Link</option>
				<option value="301" <?php echo ($mu_url_type === '301')?'selected':''; ?>>301 Redirect</option>
			</select>
            <br>
            <label for="mu_url_url">Redirect to：</label>
            <input type="url" name="mu_url_url" style="width:80%;" value="<?php echo $mu_url_url;?>"/>
            <br>
            <h3>Google Event Arguments</h3>
            <label for="mu_url_location">Location：</label>
            <input type="text" name="mu_url_location" style="width:80%;" value="<?php echo $mu_url_location;?>"/>
            <br>
            <label for="mu_url_google_calendar_date_s">Duration：</label>
            <input type="text" name="mu_url_google_calendar_date_s" value="<?php echo $mu_url_google_calendar_date_s;?>">
            ～
            <input type="text" name="mu_url_google_calendar_date_e" value="<?php echo $mu_url_google_calendar_date_e;?>">
            <code>Format: 2020-03-21 09:00:00</code>
            <br>
		</p>
        <p>
            <h3>Info</h3>
            <label>URL：<b>
                <?php
                if ($post->post_status == 'publish') {
                    echo get_permalink($post->ID);
                }else{
                    echo 'Publish this post to get URL for sharing.';
                }
                ?></b>
            </label>
            <br>
            <label>Views：</label><b>
            <?php
            $re_times = get_post_meta($post->ID, 'mu_url_redirect_times', true);
            echo $re_times;
            ?></b>
        </p>
		<?php   
	}

	public function mu_meta_box_save( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( !current_user_can( 'edit_posts' ) ) return;

		// // now we can actually save the data
		// $allowed = array( 
		// 	'a' => array( // on allow a tags
		// 		'href' => array() // and those anchords can only have href attribute
		// 	)
		// );

		// Probably a good idea to make sure your data is set
		if ( isset( $_POST['mu_url_type'] ) ) {
			update_post_meta( $post_id, 'mu_url_type', esc_attr( $_POST['mu_url_type'] ) );
        }
		if ( isset( $_POST['mu_url_url'] ) ) {
			update_post_meta( $post_id, 'mu_url_url', esc_attr( $_POST['mu_url_url'] ) );
        }
		if ( isset( $_POST['mu_url_location'] ) ) {
			update_post_meta( $post_id, 'mu_url_location', esc_attr( $_POST['mu_url_location'] ) );
        }
		if ( isset( $_POST['mu_url_google_calendar_date_s'] ) ) {
			update_post_meta( $post_id, 'mu_url_google_calendar_date_s', esc_attr( $_POST['mu_url_google_calendar_date_s'] ) );
        }
		if ( isset( $_POST['mu_url_google_calendar_date_e'] ) ) {
			update_post_meta( $post_id, 'mu_url_google_calendar_date_e', esc_attr( $_POST['mu_url_google_calendar_date_e'] ) );
		}
    }
    
    public function mu_do_url_redirect() {
        global $post;
        if (!is_admin() && is_singular('re_url')) {
            $url_type = get_post_meta($post->ID, 'mu_url_type', true);
            $mu_url_url = get_post_meta($post->ID, 'mu_url_url', true);
            $mu_url_location = get_post_meta($post->ID, 'mu_url_location', true);
            $mu_url_google_calendar_date_s = get_post_meta($post->ID, 'mu_url_google_calendar_date_s', true);
            $mu_url_google_calendar_date_e = get_post_meta($post->ID, 'mu_url_google_calendar_date_e', true);

            if ($url_type === 'google_calendar_event_link') {
                $date_s = get_gmt_from_date($mu_url_google_calendar_date_s, 'Ymd\THis\Z');
                $date_e = get_gmt_from_date($mu_url_google_calendar_date_e, 'Ymd\THis\Z');
                $base_url = empty($mu_url_url) ? 'http://www.google.com/calendar/event?action=TEMPLATE' : $mu_url_url; // http://www.google.com/calendar/render?
                $base_url .= '&text='.urlencode(esc_attr($post->post_title));
                $base_url .= '&dates='.urlencode($date_s.'/'.$date_e);
                $base_url .= '&details='.urlencode(esc_attr($post->post_content));
                $base_url .= '&location='.urlencode(esc_attr($mu_url_location));
                // &trp=false
                // &sprop=
                // &sprop=name:
                // echo '<a href="'.$base_url.'">Add Event</a>';
            }else{
                if (!empty($mu_url_url)) {
                    $base_url = $mu_url_url;
                }
            }
            if (!empty($base_url) && $_GET['preview'] != 'true') {
                $re_times = get_post_meta($post->ID, 'mu_url_redirect_times', true);
                $re_times = absint($re_times) + 1;
                update_post_meta($post->ID, 'mu_url_redirect_times', $re_times);
                wp_redirect($base_url, '301');
            }else{
                if ('publish' != $post->post_status) {
                    echo 'Please publish this post first.';
                }else{
                    echo 'The URL is：'.get_permalink($post->ID);
                }
            }
            exit;
        }
    }
}
