<!--footer-starts-->
<div class="footer">
<div class="main">
	<div class="footer-left">Powered by 
	<a href="http://www.adequatesolutions.co.in/" target="_blank">Adequate Solutions</a></div>
	<div class="footer-middle">
		<a href="index.php">
		
		<embed src="dhuliyan_images/flash.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="268" height="53" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>
		</a>
		<p>2016 © Copyright Dhulian Municipality. All rights reserved.</p>
	</div>
	<div class="social">
		<a href="https://twitter.com/" target="_blank">a</a>
		<a href="https://www.facebook.com/" target="_blank">b</a>
		<!--<a href="#">c</a>
		<a href="#">,</a>-->
	</div>
	<div class="clearBoth"></div>
</div>
</div>
<!--footer-ends-->


<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/jquery.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/bootstrap-affix.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/holder/holder.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/application.js"></script>


    <!-- Analytics
    ================================================== -->
    <script>
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>
	
	

<?php /*?><div id="footer">
<div id="footercontainer">
 <div class="tender">
<a href="#"><h2>Recent tender Notice</h2></a>
<marquee height="70" onmouseout="scrollDelay=1" onmouseover="scrollDelay=100000000" scrollamount="2" direction="up" scrolldelay="1">
<?php foreach ($tenderlist as $row){ if($row->status=='Active'){?>
<p><a href="<?php echo BASE_URL?>cmscontaint/navigation/10">
<?php echo "Tender Information: ".$row->tender_title." Tender Starting Dete: ".$row->startingdate." Tender Starting Dete : ".$row->closingdate; ?>
</a></p>
<?php }} ?>
</marquee>
 </div>
</div>
<div id="footerBottom">
<div class="footerRight">
<?php foreach ($categorylist as $row){?>
|&nbsp;<a href="<?php echo BASE_URL?>cmscontaint/navigation/<?php echo $row->id;?>" class="active">
<?php echo strtoupper($row->cat_name); ?></a>&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
<br />
2013 © Copyright Dhulian Municipality. All rights reserved.
</div>
</div><?php */?>