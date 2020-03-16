<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>
 <?php
   if(isset($_REQUEST['issubmit'])){
      echo "<strong>form is sumbitted</strong>";
   }

?>

<?php /*?><form action="<?php echo BASE_URL?>cmscontaint/user_register_login" method="POST"><?php */?>

<form action="ap.php" method="POST">
  <input type='hidden' name="issubmit" value="1">
<!-- Tabs -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <span class="stepNumber">1</span>
                <span class="stepDesc">
                   Sign In<br />
                   <small>check out faster!</small></span>
            </a></li>
  				<li><a href="#step-2">
                <span class="stepNumber">2</span>
                <span class="stepDesc">
                   Shipping<br />
                </span>
            </a></li>
  				<li><a href="#step-3">
                <span class="stepNumber">3</span>
                <span class="stepDesc">
                   Order Summary<br />
                </span>
             </a></li>
  				<li><a href="#step-4">
                <span class="stepNumber">4</span>
                <span class="stepDesc">
                   Payment
                </span>
            </a></li>
  			</ul>
  			<div id="step-1">	
            <h2 class="StepTitle">Step 1: Login Details</h2>
            <table cellspacing="3" cellpadding="3" align="center">
          			<tr>
                    	<td align="center" colspan="3">&nbsp;</td>
          			</tr>  
					      
          		<!--	<tr>
                    	<td align="right">Email Id :</td>
                    	<td align="left">
                    	  <input type="text" id="username" name="username" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_username"></span>&nbsp;</td>
          			</tr>-->
					
					<tr>
                    	<td align="right">Email :</td>
                    	<td align="left">
                    	  <input type="text" id="email" name="email" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_email"></span>&nbsp;</td>
          			</tr>
					
					
          			<tr>
                    	<td align="right">Password :</td>
                    	<td align="left">
                    	  <input type="password" id="password" name="password" value="" class="txtBox">                
						  <input type="hidden" id="cpassword" name="cpassword" 
						  value="123" class="txtBox">          
						  
						        </td>
                    	<td align="left"><span id="msg_password"></span>&nbsp;</td>
          			</tr> 
					
               <!-- <tr>
                    	<td align="right">Confirm Password :</td>
                    	<td align="left">
                    	  <input type="password" id="cpassword" name="cpassword" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_cpassword"></span>&nbsp;</td>
          			</tr>              -->                     			
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
                    	  <input type="text" id="firstname" name="firstname" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_firstname"></span>&nbsp;</td>
          			</tr>
					<tr>
                    	<td align="right">Address  :</td>
                    	<td align="left">
						<textarea name="address" id="address" class="txtBox" rows="3"></textarea>
                    	        </td>
                    	<td align="left"><span id="msg_lastname"></span>&nbsp;</td>
          			</tr> 
					
					<tr>
                    	<td align="right">Land Mark  :</td>
                    	<td align="left">
                    	  <input type="text" id="landmark" name="landmark" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_lastname"></span>&nbsp;</td>
          			</tr> 
					
          			<tr>
                    	<td align="right">Pin Code  :</td>
                    	<td align="left">
                    	  <input type="text" id="lastname" name="lastname" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_lastname"></span>&nbsp;</td>
          			</tr> 
					<tr>
                    	<td align="right">Phone :</td>
                    	<td align="left">
                    	  <input type="text" id="phone" name="phone" value="" class="txtBox">                      </td>
                    	<td align="left"><span id="msg_phone"></span>&nbsp;</td>
          			</tr>   
					
          			<tr>
                    	<td align="right">Country :</td>
                    	<td align="left">
                        <select id="gender" name="gender" class="txtBox">
                          <option value="India">India Only</option>
                                         
                        </select>                      </td>
                    	<td align="left"><span id="msg_gender"></span>&nbsp;</td>
          			</tr>                                   			
  			   </table>        
        </div>                      
  			<div id="step-3">
	<h2 class="StepTitle">Step 3: Order Summary </h2>	
 
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
            <h2 class="StepTitle">Step 4: Payment Method </h2>
            <p>&nbsp;</p>
            <p  align="center"><strong>CASH ON DELIVERY </strong></p>
            
</div>
		
  		</div>
	
</form> 
  		
</td></tr>
</table>
