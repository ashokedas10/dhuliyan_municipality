<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>
<?
   if(isset($_REQUEST['issubmit'])){
      echo "<strong>form is sumbitted</strong>";
   }

?>

<form action="<?php echo BASE_URL?>cmscontaint/customer_purchase/shop" method="POST">
  <input type='hidden' name="issubmit" value="1">
  <input type='hidden' name="id" value="">
  
<!-- Tabs -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <span class="stepNumber">1</span>
                <span class="stepDesc">
                   Sign In<br />
                   <small>Check out faster!</small>
                </span>
            </a></li>
  				<li><a href="#step-2">
                <span class="stepNumber">2</span>
                <span class="stepDesc">
                   Shipping<br />
                   <small>Fill your profile details</small>
                </span>
            </a></li>
  				<li><a href="#step-3">
                <span class="stepNumber">3</span>
                <span class="stepDesc">
                   Order Summary<br />
                   <small>Fill your contact details</small>
                </span>
             </a></li>
  				<li><a href="#step-4">
                <span class="stepNumber">4</span>
                <span class="stepDesc">
                   Payment<br />
                   <small>Fill your other details</small>
                </span>
            </a></li>
  			</ul>
  		
			<div id="step-1">	
            <h2 class="StepTitle">Step 1: Sign In</h2>
          
			     
			   <table cellspacing="3" cellpadding="3" align="center">
          			<tr>
                    	<td align="center" colspan="3">&nbsp;</td>
          			</tr>  
          							
					<tr>
                    	<td align="right">Email :</td>
                    	<td align="left">
                    	  <input type="text" id="email" name="email" value="" class="txtBox">
						  </td>
                    	<td align="left"><span id="msg_username"></span>&nbsp;</td>
          			</tr>
					<tr>
                    	<td align="right">Mobile No :</td>
                    	<td align="left">
                    	  <input type="text" id="mobile" name="mobile" value="" class="txtBox">
						  </td>
                    	<td align="left"><span id="msg_mobile"></span>&nbsp;</td>
          			</tr>
					<tr>
					<td></td>
<!--<td align="left" colspan="2"><input type="checkbox" id="have_account" name="have_account" />Have Account in Pocketbazar.net</td>	-->				
					</tr>
					<div id="divpass">
          			<!--<tr>
                    	<td align="right">Password :</td>
                    	<td align="left">
                    	  <input type="password" id="password" name="password" value="" class="txtBox">                
						  <input type="hidden" id="cpassword" name="cpassword" 
						  value="123" class="txtBox">          
						  
						        </td>
                    	<td align="left"><span id="msg_password"></span>&nbsp;</td>
          			</tr>-->
					</div>
  			   </table>    		
			   	
        </div>
		
		
  			<div id="step-2">
            <h2 class="StepTitle">Step 2: Shipping Details</h2>	
            		   
			<table cellspacing="3" cellpadding="3" align="center">
          			<tr>
                    	<td align="center" colspan="3">&nbsp;</td>
          			</tr>        
          			<tr>
                    	<td align="right"> Name :</td>
                    	<td align="left">
                    	  <input type="text" id="name" name="name" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_name"></span>&nbsp;</td>
          			</tr>
					<tr>
                    	<td align="right">Address  :</td>
                    	<td align="left">
						<textarea name="address" id="address" class="txtBox" rows="3"></textarea>
                    	        </td>
                    	<td align="left"><span id="msg_address"></span>&nbsp;</td>
          			</tr> 
					
					<tr>
                    	<td align="right">Land Mark  :</td>
                    	<td align="left">
                    	  <input type="text" id="landmark" name="landmark" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_landmark"></span>&nbsp;</td>
          			</tr> 
					
          			<tr>
                    	<td align="right">Pin Code  :</td>
                    	<td align="left">
                    	  <input type="text" id="pincode" name="pincode" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_pin"></span>&nbsp;</td>
          			</tr> 
					<tr>
                    	<td align="right">Mobile No:</td>
                    	<td align="left">
                    	  <input type="text" id="phone" name="phone" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_phone"></span>&nbsp;</td>
          			</tr>   
					
          			<tr>
                    	<td align="right">Country :</td>
                    	<td align="left">
                        <select id="country" name="country" class="txtBox">
                          <option value="India">India Only</option>
                        </select>                      </td>
                    	<td align="left"><span id="msg_country"></span>&nbsp;</td>
          			</tr>                                   			
  			   </table>  
			         
        </div>                      
  			<div id="step-3">
            <h2 class="StepTitle">Step 3: Order Summary</h2>	
			    <table cellspacing="3" cellpadding="3" align="center">
			
			
		<tr><td align="center" colspan="3">&nbsp;</td></tr>        
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
<?php echo form_hidden('product'.$i, $items['id']); ?>

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
	  <a href="<?php echo BASE_URL?>cmscontaint/removecart/<?php echo $items['rowid']; ?>">Remove</a>
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
        </div>
  			<div id="step-4">
            <h2 class="StepTitle">Step 4: Payment Method</h2>	
			
			   <p>&nbsp;</p>
            <p  align="center"><strong>CASH ON DELIVERY </strong></p>     
			       			
        </div>
  		</div>
<!-- End SmartWizard Content -->  		
</form> 
  		
</td></tr>
</table> 