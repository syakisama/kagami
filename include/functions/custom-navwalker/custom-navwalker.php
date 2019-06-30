<?php
if ( ! class_exists( 'Menu_Item_Custom_Fields' ) ) :
	/**
	* Menu Item Custom Fields Loader
	*/
	class Menu_Item_Custom_Fields {
		/**
		* Add filter
		*
		* @wp_hook action wp_loaded
		*/
		public static function load() {
			add_filter( 'wp_edit_nav_menu_walker', array( __CLASS__, '_filter_walker' ), 99 );
		}
		/**
		* Replace default menu editor walker with ours
		*
		* We don't actually replace the default walker. We're still using it and
		* only injecting some HTMLs.
		*
		* @since   0.1.0
		* @access  private
		* @wp_hook filter wp_edit_nav_menu_walker
		* @param   string $walker Walker class name
		* @return  string Walker class name
		*/
		public static function _filter_walker( $walker ) {
			$walker = 'Menu_Item_Custom_Fields_Walker';
			if ( ! class_exists( $walker ) ) {
				require_once dirname( __FILE__ ) . '/walker-nav-menu-edit.php';
			}
			return $walker;
		}
	}
	add_action( 'wp_loaded', array( 'Menu_Item_Custom_Fields', 'load' ), 9 );
endif;

class Menu_Item_Custom_Fields_Add {
  protected static $fields = array();
  public static function init() {
    add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
    add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
    add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );
    self::$fields = array(
      'kgm_awesome' => 'FontAwesome图标',
    );
  } 
  public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
      return;
    }
    check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
    foreach ( self::$fields as $_key => $label ) {
      $key = sprintf( 'menu-item-%s', $_key );
      // Sanitize
      if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
        // Do some checks here...
        $value = $_POST[ $key ][ $menu_item_db_id ];
      } else {
        $value = null;
      }
      // Update
      if ( ! is_null( $value ) ) {
        update_post_meta( $menu_item_db_id, $key, $value );
      } else {
        delete_post_meta( $menu_item_db_id, $key );
      }
    }
  }
  public static function _fields( $id, $item, $depth, $args ) {
    foreach ( self::$fields as $_key => $label ) :
      $key   = sprintf( 'menu-item-%s', $_key );
      $id    = sprintf( 'edit-%s-%s', $key, $item->ID );
      $name  = sprintf( '%s[%s]', $key, $item->ID );
      $value = get_post_meta( $item->ID, $key, true );
      $class = sprintf( 'field-%s', $_key );
      ?>
        <p class="description description-wide <?php echo esc_attr( $class ) ?>">
          <?php printf(
            '<label for="%1$s">%2$s<br /><input type="text" id="%1$s" class="widefat %1$s" name="%3$s" value="%4$s" /></label>',
            esc_attr( $id ),
            $label,
            esc_attr( $name ),
            esc_attr( $value )
          ) ?>
        </p>
      <?php
    endforeach;
  }
  public static function _columns( $columns ) {
    $columns = array_merge( $columns, self::$fields );
    return $columns;
  }
}
Menu_Item_Custom_Fields_Add::init();
?>