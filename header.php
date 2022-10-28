<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package blightone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <header>
        <nav class="main-menu navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                
                    <?php
                    wp_nav_menu(array(
                          'theme_location' => 'primary',
                          'depth' 			=> 4,
													'container'         => 'div',
													'container_class'   => 'collapse navbar-collapse',
													'container_id'      => 'main-menu',
													'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>
                
            </div>
        </nav>

    </header>	