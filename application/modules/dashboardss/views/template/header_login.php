<section class="menu-area">
    <div class="container-xl">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <ul class="mobile-header-buttons">
                        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
                    </ul>

                    <a href="<?php echo site_url('guest/home'); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url() . 'assets/guest/default/img/logo.png'; ?>" alt="" height="35"></a>

                    <?php include 'menu.php'; ?>

                    <form class="inline-form" action="<?php echo site_url('guest/search'); ?>" method="get" style="width: 100%;">
                        <div class="input-group search-box mobile-search">
                            <input type="text" name='query' class="form-control" placeholder="Cari kursus">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="instructor-box menu-icon-box">
                        <div class="icon">
                            <a href="<?php echo site_url('guest/dashboard'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">Dashboard</a>
                        </div>
                    </div>

                    <div class="wishlist-box menu-icon-box" id="wishlist_items">
                        <div class="icon">
                            <a href=""><i class="far fa-heart"></i></a>
                            <span class="number">1</span>
                        </div>
                        <div class="dropdown course-list-dropdown corner-triangle top-right">
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                        <li>
                                            <div class="item clearfix">
                                                <div class="item-image">
                                                    <a href="">
                                                        <img src="<?php echo base_url() . 'uploads/thumbnails/course_thumbnails/course_thumbnail_default_2.jpg'; ?>" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="item-details">
                                                    <a href="">
                                                        <div class="course-name">test</div>
                                                        <div class="instructor-name">
                                                            By Admin Admin </div>

                                                        <div class="item-price">
                                                            <span class="current-price">Rp150000</span>
                                                            <span class="original-price">Rp250000</span>
                                                        </div>
                                                    </a>
                                                    <button type="button" id="2" onclick="handleCartItems(this)" class="">
                                                        Add to cart </button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="<?php echo site_url('guest/my_wishlist'); ?>">Wishlist</a>
                                </div>
                            </div>
                            <div class="empty-box text-center d-none">
                                <p>Your wishlist is empty.</p>
                                <a href="">Explore courses</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart-box menu-icon-box" id="cart_items">
                        <div class="icon">
                            <a href="javascript::" onclick="showCartPage()"><i class="fas fa-shopping-cart"></i></a>
                            <span class="number">0</span>
                        </div>

                        <!-- Cart Dropdown goes here -->
                        <div class="dropdown course-list-dropdown corner-triangle top-right" style="display: none;">
                            <!-- Just remove the display none from the css to make it work -->
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                    </ul>
                                </div>
                                <div class="dropdown-footer">
                                    <div class="cart-total-price clearfix">
                                        <span>Total:</span>
                                        <div class="float-right">
                                            <span class="current-price"></span>
                                            <!-- <span class="original-price">$94.99</span> -->
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('guest/shopping_cart'); ?>">Pergi ke keranjang</a>
                                </div>
                            </div>
                            <div class="empty-box text-center d-none">
                                <p>Keranjang anda kosong.</p>
                                <a href="">Keep Shopping</a>
                            </div>
                        </div>

                        <script type="text/javascript">
                            function showCartPage() {
                                window.location.replace("<?php echo site_url('guest/shopping_cart'); ?>");
                            }
                        </script>
                    </div>



                    <div class="user-box menu-icon-box">
                        <div class="icon">
                            <a href="javascript::">
                                <img src="<?php echo base_url() . 'uploads/user_image/2.jpg'; ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="dropdown user-dropdown corner-triangle top-right">
                            <ul class="user-dropdown-menu">

                                <li class="dropdown-user-info">
                                    <a href="">
                                        <div class="clearfix">
                                            <div class="user-image float-left">
                                                <img src="<?php echo base_url() . 'uploads/user_image/2.jpg'; ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">
                                                    <span class="hi">Hi,</span>
                                                    Azis M Iqbal
                                                </div>
                                                <div class="user-email">
                                                    <span class="email">azis@pertamina-ptc.com</span>
                                                    <span class="welcome">Welcome back</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('dashboard/my_courses'); ?>"><i class="far fa-gem"></i>My courses</a></li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('guest/my_wishlist'); ?>"><i class="far fa-heart"></i>My wishlist</a></li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('guest/my_messages'); ?>"><i class="far fa-envelope"></i>My messages</a></li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('guest/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i>Purchase history</a></li>
                                <li class="user-dropdown-menu-item"><a href="<?php echo site_url('guest/user_profile'); ?>"><i class="fas fa-user"></i>User profile</a></li>
                                <li class="dropdown-user-logout user-dropdown-menu-item"><a href="<?php echo site_url('guest/login/logout'); ?>">Log out</a></li>
                            </ul>
                        </div>
                    </div>

                    <span class="signin-box-move-desktop-helper"></span>
                   
                    <!--  sign-in-box end -->

                </nav>
            </div>
        </div>
    </div>
</section>