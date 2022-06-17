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
                    <a href="<?php echo base_url() . 'guest/shopping_cart'; ?>">Go to cart</a>
                  </div>
                </div>
                <div class="empty-box text-center d-none">
                  <p>Your cart is empty.</p>
                  <a href="">Keep Shopping</a>
                </div>
              </div>

              <script type="text/javascript">
                function showCartPage() {
                  window.location.replace("<?php echo base_url() . 'guest/shopping_cart'; ?>");
                }
              </script>
            </div>

            <span class="signin-box-move-desktop-helper"></span>
      
            <!--  sign-in-box end -->
          </nav>
        </div>
      </div>
    </div>
  </section>