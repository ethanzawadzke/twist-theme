<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    /> -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</head>

<body>
    <header class="header">
        <button class="hamburger">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"></a>

        <nav class="nav-menu">
            <ul class="nav-menu-list">
                <li class="nav-menu-item">
                    <a class="nav-menu-text" href="<?php echo esc_url(home_url('/about')); ?>">About</a>
                </li>
                <li class="nav-menu-item">
                    <a class="nav-menu-text" href="<?php echo esc_url(home_url('/services')); ?>">Services</a>
                </li>
                <li class="nav-menu-item">
                    <a class="nav-menu-text" href="<?php echo esc_url(home_url('/our-clients')); ?>">Our Clients</a>
                </li>
                <li class="nav-menu-item" id="nav-menu-item-contact">
                    <a class="nav-menu-text" href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
                </li>
            </ul>
        </nav>
    </header>

