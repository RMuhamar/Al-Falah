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
                    <a href="http://localhost/academy/home/course/test/2">
                      <img src="http://localhost/academy/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" class="img-fluid">
                    </a>
                  </div>
                  <div class="details">
                    <a href="http://localhost/academy/home/course/test/2">
                      <div class="name">test</div>
                    </a>
                    <a href="http://localhost/academy/home/instructor_page/1">
                      <div class="instructor">
                        By <span class="instructor-name">Admin Admin</span>,
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
                        $10 </div>
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
          <span id="total_price_of_checking_out" hidden>10 </span>
          <div class="total-price">$10</div>
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
    url1 = 'http://localhost/academy/home/handleCartItems';
    url2 = 'http://localhost/academy/home/refreshWishList';
    url3 = 'http://localhost/academy/home/refreshShoppingCart';
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
      url: 'http://localhost/academy/home/isLoggedIn',
      success: function(response) {
        if (!response) {
          window.location.replace("http://localhost/academy/login");
        } else if ("10" > 0) {
          // $('#paymentModal').modal('show');
          //$('.total_price_of_checking_out').val($('#total_price_of_checking_out').text());
          window.location.replace("http://localhost/academy/home/payment");
        } else {
          toastr.error('There are no courses on your cart');
        }
      }
    });
  }

  function handleCartItems(elem) {
    url1 = 'http://localhost/academy/home/handleCartItems';
    url2 = 'http://localhost/academy/home/refreshWishList';
    url3 = 'http://localhost/academy/home/refreshShoppingCart';
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