<section class="cart-list-area">
  <div class="container">
    <div class="row" id="cart_items_details">
      <div class="col-lg-9">

        <div class="in-cart-box">
          <div class="title">1 Courses in cart</div>
          <div class="">
            <ul class="cart-course-list">
              <li>
                <div class="cart-course-wrapper">
                  <div class="image">
                    <a href="<?php echo site_url('guest/course/test/2'); ?>">
                      <img src="<?php echo site_url('assets/guest/default/img/course_thumbnail_placeholder.jpg'); ?>" alt="" class="img-fluid">
                    </a>
                  </div>
                  <div class="details">
                    <a href="<?php echo site_url('guest/course/test/2'); ?>">
                      <div class="name">Microsoft Excel untuk Pemula</div>
                    </a>
                    <a href="<?php echo site_url('guest/instructor/1'); ?>">
                      <div class="instructor">
                        By <span class="instructor-name">Pertamina Training & Consulting</span>,
                      </div>
                    </a>
                  </div>
                  <div class="move-remove">
                    <div id="2" onclick="removeFromCartList(this)">Remove</div>
                    <!-- <div>Move to Wishlist</div> -->
                  </div>
                  <div class="price">
                    <a href="">
                      <div class="current-price">
                        Rp. 150.000,-</div>
                      <span class="coupon-tag">
                        <i class="fas fa-tag"></i>
                      </span>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
      <div class="col-lg-3">
        <div class="cart-sidebar">
          <div class="total">Total:</div>
          <span id="total_price_of_checking_out" hidden>Rp. 150.000,-</span>
          <div class="total-price">Rp. 150.000,-</div>
          <div class="total-original-price">
            <!-- <span class="discount-rate">95% off</span> -->
          </div>
          <button type="button" class="btn btn-primary btn-block checkout-btn" onclick="handleCheckOut()">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://www.paypalobjects.com/js/external/dg.js"></script>
<script>
  var dgFlow = new PAYPAL.apps.DGFlow({
    trigger: 'submitBtn'
  });
  dgFlow = top.dgFlow || top.opener.top.dgFlow;
  dgFlow.closeFlow();
  // top.close();
</script>

<script type="text/javascript">
  function removeFromCartList(elem) {
    url1 = '<?php echo site_url('guest/handle/CartItems'); ?>';
    url2 = '<?php echo site_url('guest/refresh/WishList'); ?>';
    url3 = '<?php echo site_url('guest/refresh/ShoppingCart'); ?>';
    $.ajax({
      url: url1,
      type: 'POST',
      data: {
        course_id: elem.id
      },
      success: function(response) {

        $('#cart_items').html(response);
        if ($(elem).hasClass('addedToCart')) {
          $('.big-cart-button-' + elem.id).removeClass('addedToCart')
          $('.big-cart-button-' + elem.id).text("Add to cart");
        } else {
          $('.big-cart-button-' + elem.id).addClass('addedToCart')
          $('.big-cart-button-' + elem.id).text("Added to cart");
        }

        $.ajax({
          url: url2,
          type: 'POST',
          success: function(response) {
            $('#wishlist_items').html(response);
          }
        });

        $.ajax({
          url: url3,
          type: 'POST',
          success: function(response) {
            $('#cart_items_details').html(response);
          }
        });
      }
    });
  }

  function handleCheckOut() {
    $.ajax({
      url: '<?php echo site_url('guest/isLoggedIn'); ?>',
      success: function(response) {
        if (!response) {
          window.location.replace("<?php echo site_url('guest/login'); ?>");
        } else if ("10" > 0) {
          // $('#paymentModal').modal('show');
          //$('.total_price_of_checking_out').val($('#total_price_of_checking_out').text());
          window.location.replace("<?php echo site_url('guest/payment'); ?>");
        } else {
          toastr.error('There are no courses on your cart');
        }
      }
    });
  }

  function handleCartItems(elem) {
    url1 = '<?php echo site_url('guest/handle/CartItems'); ?>';
    url2 = '<?php echo site_url('guest/refresh/WishList'); ?>';
    url3 = '<?php echo site_url('guest/refresh/ShoppingCart'); ?>';
    $.ajax({
      url: url1,
      type: 'POST',
      data: {
        course_id: elem.id
      },
      success: function(response) {
        $('#cart_items').html(response);
        if ($(elem).hasClass('addedToCart')) {
          $('.big-cart-button-' + elem.id).removeClass('addedToCart')
          $('.big-cart-button-' + elem.id).text("Add to cart");
        } else {
          $('.big-cart-button-' + elem.id).addClass('addedToCart')
          $('.big-cart-button-' + elem.id).text("Added to cart");
        }
        $.ajax({
          url: url2,
          type: 'POST',
          success: function(response) {
            $('#wishlist_items').html(response);
          }
        });

        $.ajax({
          url: url3,
          type: 'POST',
          success: function(response) {
            $('#cart_items_details').html(response);
          }
        });
      }
    });
  }
</script>