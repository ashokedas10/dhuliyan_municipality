<div id="bodyWrapper">
<div id="bodyContainer">
<div class="productTop">
<div class="cartLeft">
<div class="cartLeftTop">
<div class="continue">
<div class="continueArrow"><a href="<?php echo BASE_URL?>cmscontaint/"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/carttarrow.jpg" alt="image" /></a></div>
<div class="continueText"><a href="<?php echo BASE_URL?>cmscontaint/">Continue Shopping</a></div>
</div>
<div class="shopHead">your shopping cart</div>
</div>

<!--<div class="cartLeftMid">

<div class="cartLeftMidImage">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/shopImage.jpg" alt="image" />
</div>

<div class="cartLeftMidText">
<h2><a href="#"></a></h2>

<p>
<h3></span></h3>

</p>


Quantity <b>2</b></span> 
<a href="#">change</a>
</p>
<p><a href="#">Remove</a><span>|</span> <a href="#">Save for later</a></p>
</div>
<div class="cartLeftDeliver">Delivered in 4-7 days</div>
<div class="cartLeftPrice">Rs.333</div>
</div>-->


<?php echo form_open('cmscontaint/updatecart'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
 <th width="18%">Item Image</th>
  <th width="63%">Item Description</th>
   <th width="5%">QTY</th>
  <th width="5%" style="text-align:right"> Price</th>
  <th width="9%" style="text-align:right">Sub-Total</th>
  <th width="9%" style="text-align:right">Remove</th>
</tr>

<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items): ?>
<?php echo form_hidden('rid'.$i, $items['rowid']); ?>

	<tr>
	
	<td style="text-align:right">
	<?php echo $this->cart->format_number($items['price']); ?>	</td>
	
	    <td>
		<?php echo $items['name']; ?>
		<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

			  <p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
				        <?php endforeach; ?>
			  </p>

			<?php endif; ?>	
			
			  </td>
	  <td><?php echo form_input(array('name' => 'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>

	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">Rs.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	  <td style="text-align:right">
	  <a href="<?php echo BASE_URL?>cmscontaint/removecart/<?php echo $items['rowid']; ?>"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/delete.png" width="20" height="20" alt="image" /></a>
	  </td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="3"> </td>
  <td class="right"><strong>Total</strong></td>
  <td style="text-align:right">Rs.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
</table>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>

<!--<div class="cartLeftBottom">
<h2>You May Also Like</h2>
<div id="slider">
			<ul>				
				<li>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s1.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 44</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s2.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s3.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <br style="clear:both" />
       </li>
       <li>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s4.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s5.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/s6.jpg" alt="image" /></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <br style="clear:both" />
       </li>
       </ul>
       </div>
</div>-->

</div>
<div class="cartRight">
<h2>shopping cart summary</h2>
<div class="cartRightInner">
<div class="cartRightInnerRow">
<div class="cartRightInnerRowLeft">Sub Total</div>
<div class="cartRightInnerRowRight">Rs.<?php echo $this->cart->format_number($this->cart->total()); ?></div>
</div>
<div class="cartRightInnerRow">
<div class="cartRightInnerRowLeft">Shipping Charges</div>
<div class="cartRightInnerRowRight"><span>Free</span></div>
</div>
<div class="cartRightInnerRow">
<div class="cartRightInnerRowLeft">Payable Amount</div>
<div class="cartRightInnerRowRight"><b>Rs.<?php echo $this->cart->format_number($this->cart->total()); ?></b></div>
</div>
<div class="place"><a href="<?php echo BASE_URL?>cmscontaint/check_out"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/place.jpg" alt="image" /></a></div>
</div>
<div class="cartBottom">
<h2>check delivery time</h2>
<p><input type="text" value="Enter your pincode" onfocus="if(this.value=='Enter your pincode'){ this.value='';}" onblur="if(this.value==''){ this.value='Enter your pincode';}" class="cartinput"><input name="" type="button" class="check" value="Check" /></p>
</div>
</div>
<br class="clear" />
</div>
</div>
</div>