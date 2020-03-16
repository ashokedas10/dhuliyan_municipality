<div id="bodyWrapper">
<div id="bodyContainer">

<h1>Shopping Cart</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!--<p></p><p></p><p></p>-->
<?php echo form_open('cmscontaint/updatecart'); ?>
<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
  
<?php $i = 1;
$tot_tax=0;
$tot_shiping=0;

 ?>
<?php foreach ($this->cart->contents() as $items): ?>
<?php echo form_hidden('rid'.$i, $items['rowid']); ?>

  <div class="product">
    <div class="product-image">
      <img src="http://s.cdpn.io/3/dingo-dog-bones.jpg">
    </div>
    <div class="product-details">
	
	<div class="product-title"><?php echo $items['name']; ?></div>
	
		<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

			  <p class="product-description">
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
				        <?php endforeach; ?>
			  </p>

			<?php endif; ?>	
	
	</div>
	
    <div class="product-price"><?php  echo $items['price']; //echo $this->cart->format_number($items['price']); ?></div>
    <div class="product-quantity">
	<?php echo form_input(array('name' => 'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','type' => 'number')); ?>
	
     <!-- <input type="number" value="2" min="1">-->
		 
    </div>
	
	<?php /*?><?php echo form_input(array('name' => 'tax'.$i, 'value' => $items['tax'], 'maxlength' => '3', 'size' => '5','type' => 'hidden')); ?>
	
	<?php echo form_input(array('name' => 'shipping'.$i, 'value' => $items['shiping'], 'maxlength' => '3', 'size' => '5','type' => 'hidden')); ?><?php */?>
	
	
	
	 <div class="product-line-tax" style="display:none;"><?php $items['tax_amt']; ?></div>
	 <div class="product-line-shiping" style="display:none;"><?php $items['shipping_amt']; ?></div>
	 
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
	
    <div class="product-line-price">
	<?php echo $this->cart->format_number($items['subtotal']); ?></div>
	
  </div>
  
 
 
  

 <!-- <div class="product">
    <div class="product-image">
      <img src="http://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
    </div>
    <div class="product-details">
      <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
      <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
    </div>
    <div class="product-price">88.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.99</div>
  </div>-->

 

<?php $i++; ?>

<?php endforeach; ?>

	 <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">
	  <?php echo $this->cart->format_number($this->cart->total()); ?></div>
    </div>
    <div class="totals-item">
      <label>Tax </label>
      <div class="totals-value" id="cart-tax">0.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>

      <a href="<?php echo BASE_URL?>cmscontaint/check_out">
	  <button class="checkout">Checkout</button>
	  </a>
	  

</div>

</div>
</div>

<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/codepen_Amrfs/js/index.js"></script>