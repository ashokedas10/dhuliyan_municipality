<!--body-section starts-->
<div class="body-section">
<div class="main">
  <h1><span class="red-text">Dhuliyan </span><strong><em>is a very densely populated Municipality Comprising 19 No. of Wards in  Jangipur  Sub-Division of Murshidabad District</em></strong>.</h1>
</div>

  <div class="latest-heading"><span class="red-text">Welcome To </span> Dhuliyan Municipality 
  </div>
  
	<?php /*?><div class="showcase">
	<div class="main">
		<ul>
			<li>
				<b><img src="<?php echo BASE_PATH_FRONT;?>theme_files/public_work/pwork1.jpg" alt="" /></b>
				<!--<h3>Maintainance of Road</h3>-->
				<div class="btn"><a href="<?php echo BASE_URL?>cmscontaint/dmc/publicwork">Details</a></div>
			</li>
			<li>
				<b><img src="<?php echo BASE_PATH_FRONT;?>theme_files/public_work/pwork2.jpg" alt="" /></b>
				<!--<h3>DESCRIPTION HERE<BR />HERE</h3>-->
				<div class="btn"><a href="<?php echo BASE_URL?>cmscontaint/dmc/publicwork">Details</a></div>
			</li>
			<li>
				<b><img src="<?php echo BASE_PATH_FRONT;?>theme_files/public_work/pwork3.jpg" alt="" /></b>
				<!-- <h3>DESCRIPTION HERE<BR />HERE</h3>-->
				<div class="btn"><a href="<?php echo BASE_URL?>cmscontaint/dmc/publicwork">Details</a></div>
			</li>
			<li>
				<b><img src="<?php echo BASE_PATH_FRONT;?>theme_files/public_work/pwork4.jpg" alt="" /></b>
			  <!-- <h3>DESCRIPTION HERE<BR />HERE</h3>-->
				<div class="btn"><a href="<?php echo BASE_URL?>cmscontaint/dmc/publicwork">Details</a></div>
			</li>
		</ul>
		<div class="clearBoth"></div>
	</div>
	</div><?php */?>
	
	<div class="body-bottom">
	<div class="main">
	<div class="body-left">
			<h2>Chairman's  <span class="red-txt">Speech</span></h2>
			<blockquote>
			<?php 
			$picpath=BASE_PATH_ADMIN.'uploads/contents/';
			$sqlsubcat="SELECT * FROM `content` WHERE `SubCatId` =40  "; 
			$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
			foreach ($subcategorylist as $subcat)
			{  $content=$subcat->details;  }
			?>	
			<img src="<?php echo $picpath.$subcat->images;?>" width="230" />
			</blockquote><p>
			<?php echo $content; ?> 
	
			<!--Dhuliyan is a very densely populated Municipality Comprising 19 No. of Wards in  Jangipur  Sub-Division of Murshidabad District. This Municipality was established in the year 1909 with 9 No. of Wards and population of 8,295. Its Distance from Sub-divisional Head quarter at Raghunathganj is 37  K.M. and that from district Head quarter at Berhampur is 94 K.M. Population of the Municipality has reached 95713 (As per Census 2011) whereas geographical Area of the Municipality remains 6.25 Sq K.M. only. Now the Municipality area is spread  over Kanchantala, Anupnagar, Lalpur  and few more Villages. Near about two third of the population belong to Muslim community and remaining one third belong to Hindu and Jain Community. Percentage of Literacy is 52.53-->
			
			<br />
			<br />
			<br />
</p>
			
	  </div>
	
	  <div class="body-right">
			<div class="testimonials">
				<h2><span class="red-txt">Announcement</span></h2>
				
				<marquee height="250" onmouseout="scrollDelay=1" 
				onmouseover="scrollDelay=1000000" scrollamount="2" direction="up">
		   <?php 
			$sqlsubcat="SELECT * FROM `content` WHERE `SubCatId` =66  "; 
			$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
			foreach ($subcategorylist as $subcat)
			{  $content=$subcat->details;  
			?>	
			<em><?php echo $content; ?></em><br /><br />
		  <?php } ?>
		
		</marquee>				
				<!--<div class="more-btn"><a href="#">More Announcement</a></div>-->
				<div class="clearBoth"></div>
			</div>
		   
		</div>
	
	 
		
	<div class="body-left">
			<h2>Few Words about <span class="red-txt">Dhuliyan Municipality</span></h2>
			<blockquote>
			<?php 
			$picpath=BASE_PATH_ADMIN.'uploads/contents/';
			$sqlsubcat="SELECT * FROM `content` WHERE `SubCatId` =41  "; 
			$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
			foreach ($subcategorylist as $subcat)
			{  $content=$subcat->details;  }
			?>	
			<img src="<?php echo $picpath.$subcat->images;?>" width="230" />
			
		<?php /*?>	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/dhuliyan_mc.jpg" alt="" width="230" /><?php */?>
			
			</blockquote><p>
			<?php echo $content; ?> 
			
			<!--Dhuliyan is a very densely populated Municipality Comprising 19 No. of Wards in  Jangipur  Sub-Division of Murshidabad District. This Municipality was established in the year 1909 with 9 No. of Wards and population of 8,295. Its Distance from Sub-divisional Head quarter at Raghunathganj is 37  K.M. and that from district Head quarter at Berhampur is 94 K.M. Population of the Municipality has reached 95713 (As per Census 2011) whereas geographical Area of the Municipality remains 6.25 Sq K.M. only. Now the Municipality area is spread  over Kanchantala, Anupnagar, Lalpur  and few more Villages. Near about two third of the population belong to Muslim community and remaining one third belong to Hindu and Jain Community. Percentage of Literacy is 52.53<br /><br />
			
Dhuliyan is located between river Ganges & Hooghly Canal. Soil erosion has shifted the town towards south-west  from its earlier position . This town is  mentioned as an Inland Water Transport (IWT) Trading point between Murshidabad and the city of Rajsahi in Bangladesh. Thus , this Municipality is surrounded by Farakka in the north, Aurangabad in the south, Jharkhand in the west and Ganges River & Bangladesh country in the east. It is within 56, Samsherganj Assembly Constituency & 8, Malda (South) Parliamentary constituency. Names of present M.L.A. & M.P.  are Touab Ali & Abu Hasem Khan Chowdhury respectively. Mr. Khan Chowdhury is the Hon’ble Union minister of state for Health and Family welfare.
<br /><br />

Dhuliyan Ganga is the Nearest railway station from this place. It is well connected with Kolkata City by Malda town Fast Passenger, Malda town Intercity Express, Radhikapur Express, Teesta Torsha Express, Kamrup Express and a few more. Kolkata is at a distance of 282 K.M. from this place & Malda Town  is at   a distance  of 49 K.M.  Pakur is another railway station at a distance of 25 K.M. from this place in Jharkhand state from where a number trains are available connecting Kolkata viz. Gour Express, Balurghat Express, Intercity Express (via Rampurhat), Darjeeling Mail, Hate Bazare Express. Buses are also plying from Kolkata to Siliguri touching this place
<br /><br />

A  good  number of people of this Municipality earn their livelihood by making & selling of Biris. A number of Biri Industries are located in this town. Some people are engaged in running business of wholesale & retail sale of articles like cloth, readymade garments, bedding, furniture, hardware goods and  utensils made of  bell metal, steel and aluminum. Wholesale business of rice, flour, and spice are also running from this place. As such gathering of carrying vehicles can be found on the road of entrance to the town, day & night.
<br /><br />

Dhuliyan is a quiet town with people having riverside lifestyle. Local people of this place spend a lot of time on the river and by the river side. It is a no-fuss river town where one does not have to be pressurized by the regular tourist hassle but can enjoy here  riverside activities like boating & fishing and long river-walks.
When in Dhuliyan, one can visit some places near by  which are not at Dhuliyan but at a distance of 20 K.M.  or a little above viz. Farakka Barrage over Ganges and Nimtita Zamindari Palace & Snake Garden. Coming to Dhuliyan, one Can enjoy ride on a Cart driven by a horse, which is available here throughout the day on the entrance road of the town.
<br /><br />-->

</p>
<!--<p>&nbsp;</p>
<div class="image-galleries">
	<img src="images/gal-img01.jpg" alt="" />
	<img src="images/gal-img02.jpg" alt="" />
	<img src="images/gal-img03.jpg" alt="" />
	<div class="clearBoth"></div>
</div>-->
			
</div>
		
		
		<div class="body-right">
			<!--<div class="testimonials">
				<h2>Client’s <span class="red-txt">Feedback</span></h2>
				<em>" They have just a superb collection at a single place. I would recommend anyone to get their services for the kitchen rennovations."</em>
				<strong>-- Amit Dey</strong>
				<div class="more-btn"><a href="#">More Testimonials</a></div>
				<div class="clearBoth"></div>
			</div>-->
			
			<!--<a href="dealer.html"><img src="images/distr-btn.png" alt="" /></a>-->
			
			<h3>Quick <span class="blue-text2">Query</span></h3>
			<form action="#" method="post">
			<input name="" type="text" placeholder="FULL NAME">
			<input name="" type="text" placeholder="EMAIL ADDRESS">
			<textarea name="" cols="1" rows="1" placeholder="MESSAGE"></textarea>
			<input name="" type="submit" value="Send">
			</form>
		</div>
		
		<!--ADVERTISEMENT-->
		<div class="body-right" >
			<div class="testimonials">
				<h2><span class="red-txt">ADVERTISEMENT</span></h2>
									   
				<div class="clearBoth"></div>
			</div>
			
		   
		</div>
		
		<!--ADVERTISEMENT-->
		
		<div class="clearBoth"></div>
	</div>
	</div>
  
</div>
<!--body-section ends-->




<?php /*?><?php $picpath=BASE_PATH_ADMIN.'uploads/contents/'; ?>
<?php foreach ($contentlist as $row){ if($row->order==1 && $row->SubCatId==41 && $row->status=='Active'){ ?>
<style>#bodyMidLeft p{width:740px !important;}</style>	
<div id="bodyMid">
<div id="bodyMidLeft">
<h2><?php echo $row->content_initials;?></h2>
<div><?php echo $row->details; ?></div>
</div>
<div style="float:right;margin-right:20px;" id="bodyMidRighty"><img src="<?php echo $picpath.$row->images; ?>" width="200" height="200" style="	border-radius: 30px;" /></div>
<?php } } ?>
<br class="clear" />
</div>
<br class="clear" />
</div>
<div id="bodyBottom">
<?php foreach ($contentlist as $row){ if($row->order==2 && $row->SubCatId==41 && $row->status=='Active'){?>
<div id="bodyBottomLefty">
<h2><?php echo $row->content_initials; ?></h2>
<img src="<?php echo $picpath.$row->images; ?>"  width="200" height="200"  style="	border-radius: 30px;margin-top:17px;"/>
<div><?php echo $row->details; ?></div>
</div>
<?php } } ?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<div id="bodyBottomRighty">
<div class="notice">
<!----------------------------------->
<div class="notice">
<div class="hot">Hot Navigation</div>
<div class="hhotArea">
<ul><?php foreach ($contentlist as $row){ if($row->SubCatId!=41 && $row->SubCatId!=50 && $row->SubCatId!=66 && $row->status=='Active'){?>
<li><a href="#"><?php echo $row->content_initials; ?></a></li>
<?php } } ?></ul></div>
</div>
<!----------------------------------->
<div class="notice">
<div class="hot">Important Announcement</div>
<div class="hhotArea">
<marquee height="130" onmouseout="scrollDelay=1" onmouseover="scrollDelay=1000000" scrollamount="2" direction="up">
<?php foreach ($contentlist as $row){ if($row->SubCatId==66 && $row->status=='Active'){?>
<p><a href="#"><?php echo $row->content_initials; ?></a></p>
<?php }} ?>

</marquee>
<a href="#" class="seeall_link1">View All </a>
</div>		
</div>
<!-------------------------------->
<div class="notice">
<div class="hot">Visitors Counter</div>
<div class="hhotArea">Total Site Visitor : 
<a href="#" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=5117272&style=0001&nbdigits=5&type=ip&initCount=0" title="blog web counter" Alt="blog web counter" border="0" ></a></div>
</div>
<br class="clear" />
</div>
</div>
<?php */?>

