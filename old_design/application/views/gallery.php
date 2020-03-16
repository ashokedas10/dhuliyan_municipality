<script>
var thickboxL10n = {
	next: "Next &gt;",
	prev: "&lt; Prev",
	image: "Image",
	of: "of",
	close: "Close",
	noiframes: ""
};

if ( typeof tb_pathToImage != 'string' ) {
	var tb_pathToImage = "<?php echo BASE_PATH_FRONT;?>theme_files/images/loadingAnimation.gif";
}
if ( typeof tb_closeImage != 'string' ) {
	var tb_closeImage = "<?php echo BASE_PATH_FRONT;?>theme_files/images/tb-close.png";
}

if ( typeof tb_leftArrow != 'string' ) {
	var tb_leftArrow = "<?php echo BASE_PATH_FRONT;?>theme_files/images/left.gif";
}

if ( typeof tb_rightArrow != 'string' ) {
	var tb_rightArrow = "<?php echo BASE_PATH_FRONT;?>theme_files/images/right.gif";
}
/*!!!!!!!!!!!!!!!!! edit below this line at your own risk !!!!!!!!!!!!!!!!!!!!!!!*/

//on page load call tb_init
jQuery(document).ready(function(){
	tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
	imgLoader = new Image();// preload image
	imgLoader.src = tb_pathToImage;
});

//add thickbox to href & area elements that have a class of .thickbox
function tb_init(domChunk){
	jQuery(domChunk).live('click', tb_click);
}

function tb_click(){
	var t = this.title || this.name || null;
	var a = this.href || this.alt;
	var g = this.rel || false;
	tb_show(t,a,g);
	this.blur();
	return false;
}

function tb_show(caption, url, imageGroup) {//function called when the user clicks on a thickbox link

	try {
		if (typeof document.body.style.maxHeight === "undefined") {//if IE 6
			jQuery("body","html").css({height: "100%", width: "100%"});
			jQuery("html").css("overflow","hidden");
			if (document.getElementById("TB_HideSelect") === null) {//iframe to hide select elements in ie6
				jQuery("body").append("<iframe id='TB_HideSelect'>"+thickboxL10n.noiframes+"</iframe><div id='TB_overlay'></div><div id='TB_window'></div>");
				jQuery("#TB_overlay").click(tb_remove);
			}
		}else{//all others
			if(document.getElementById("TB_overlay") === null){
				jQuery("body").append("<div id='TB_overlay'></div><div id='TB_window'></div>");
				jQuery("#TB_overlay").click(tb_remove);
			}
		}

		if(tb_detectMacXFF()){
			jQuery("#TB_overlay").addClass("TB_overlayMacFFBGHack");//use png overlay so hide flash
		}else{
			jQuery("#TB_overlay").addClass("TB_overlayBG");//use background and opacity
		}

		if(caption===null){caption="";}
		jQuery("body").append("<div id='TB_load'><img src='"+imgLoader.src+"' /></div>");//add loader to the page
		jQuery('#TB_load').show();//show loader

		var baseURL;
	   if(url.indexOf("?")!==-1){ //ff there is a query string involved
			baseURL = url.substr(0, url.indexOf("?"));
	   }else{
	   		baseURL = url;
	   }

	   var urlString = /\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$/;
	   var urlType = baseURL.toLowerCase().match(urlString);

		if(urlType == '.jpg' || urlType == '.jpeg' || urlType == '.png' || urlType == '.gif' || urlType == '.bmp'){//code to show images

			TB_PrevCaption = "";
			TB_PrevURL = "";
			TB_PrevHTML = "";
			TB_NextCaption = "";
			TB_NextURL = "";
			TB_NextHTML = "";
			TB_imageCount = "";
			TB_FoundURL = false;
			if(imageGroup){
				TB_TempArray = jQuery("a[rel="+imageGroup+"]").get();
				for (TB_Counter = 0; ((TB_Counter < TB_TempArray.length) && (TB_NextHTML === "")); TB_Counter++) {
					var urlTypeTemp = TB_TempArray[TB_Counter].href.toLowerCase().match(urlString);
						if (!(TB_TempArray[TB_Counter].href == url)) {
							if (TB_FoundURL) {
								TB_NextCaption = TB_TempArray[TB_Counter].title;
								TB_NextURL = TB_TempArray[TB_Counter].href;
								TB_NextHTML = "<span id='TB_next'>&nbsp;&nbsp;<a href='#'>"+thickboxL10n.next+"</a></span>";
							} else {
								TB_PrevCaption = TB_TempArray[TB_Counter].title;
								TB_PrevURL = TB_TempArray[TB_Counter].href;
								TB_PrevHTML = "<span id='TB_prev'>&nbsp;&nbsp;<a href='#'>"+thickboxL10n.prev+"</a></span>";
							}
						} else {
							TB_FoundURL = true;
							TB_imageCount = thickboxL10n.image + ' ' + (TB_Counter + 1) + ' ' + thickboxL10n.of + ' ' + (TB_TempArray.length);
						}
				}
			}


			imgPreloader = new Image();
			prevImg = new Image();
			nextImg = new Image();
			imgPreloader.onload = function(){
			imgPreloader.onload = null;

			var tb_links = jQuery('a[class="thickbox"]');
			var i = -1;
			tb_links.each(function(n) { if (this.href == imgPreloader.src) { i = n; } });
			
			
			if (i != -1) {
				if (i>0) { prevImg.src = tb_links[i-1].href; }
				if (i+1<tb_links.length) { 
				
					var imgTemp1 = new Image();
					imgTemp1.src = tb_links[i+1].href; 
					
					if(tb_links[i+2]){
						var imgTemp2 = new Image();
						imgTemp2.src = tb_links[i+2].href; 
					}
					
					if(tb_links[i+3]){
						var imgTemp3 = new Image();
						imgTemp3.src = tb_links[i+3].href; 
					}
				}
			}
		
	/*
			imgPreloader = new Image();
			imgPreloader.onload = function(){
			imgPreloader.onload = null;
	*/
			// Resizing large images - orginal by Christian Montoya edited by me.
			var pagesize = tb_getPageSize();
			var x = pagesize[0] - 150;
			var y = pagesize[1] - 150;
			var imageWidth = imgPreloader.width;
			var imageHeight = imgPreloader.height;
			if (imageWidth > x) {
				imageHeight = imageHeight * (x / imageWidth);
				imageWidth = x;
				if (imageHeight > y) {
					imageWidth = imageWidth * (y / imageHeight);
					imageHeight = y;
				}
			} else if (imageHeight > y) {
				imageWidth = imageWidth * (y / imageHeight);
				imageHeight = y;
				if (imageWidth > x) {
					imageHeight = imageHeight * (x / imageWidth);
					imageWidth = x;
				}
			}
			// End Resizing

			TB_WIDTH = imageWidth + 30;
			TB_HEIGHT = imageHeight + 60;
			jQuery("#TB_window").append("<img id='imgLeftArrow' src='" +tb_leftArrow+ "' border='0' style='display:none;'/><img id='imgRightArrow' src='" +tb_rightArrow+ "' border='0' style='display:none;'/><div id='divNavControl'><div id='divPre'></div><div id='divNext'></div></div><a href='#' id='TB_nextPIC' title='"+thickboxL10n.next+"'><img id='TB_Image' src='"+url+"' width='"+imageWidth+"' height='"+imageHeight+"' alt='"+caption+"'/></a>" + "<div id='TB_caption'>"+caption+"<div id='TB_secondLine'>" + TB_imageCount + TB_PrevHTML + TB_NextHTML + "</div></div><div id='TB_closeWindow'><a href='#' id='TB_closeWindowButton' title='"+thickboxL10n.close+"'><img src='" + tb_closeImage + "' /></a></div>");

			jQuery("#TB_closeWindowButton").click(tb_remove);

			function hideArrows(){
					jQuery("#imgLeftArrow").css({display: 'none'});
					jQuery("#imgRightArrow").css({display: 'none'});
			}

			jQuery("#divNavControl").css({height: imageHeight + 'px', width: imageWidth + 'px', left:'15px', top:'15px'});
				
			if (!(TB_PrevHTML === "")) {
				function goPrev(){
					if(jQuery(document).unbind("click",goPrev)){jQuery(document).unbind("click",goPrev);}
					jQuery("#TB_window").remove();
					jQuery("body").append("<div id='TB_window'></div>");
					tb_show(TB_PrevCaption, TB_PrevURL, imageGroup);
					return false;
				}
				jQuery("#TB_prev").click(goPrev);
				
				function showLeftArrow(){
					jQuery("#imgLeftArrow").css({display: ''});
					jQuery("#imgRightArrow").css({display: 'none'});
				}
				
				
				jQuery("#divPre").click(goPrev);
				jQuery("#divPre").mouseover(showLeftArrow);
				jQuery("#divPre").mouseout(hideArrows);
			}

			if (!(TB_NextHTML === "")) {
				function goNext(){
					jQuery("#TB_window").remove();
					jQuery("body").append("<div id='TB_window'></div>");
					tb_show(TB_NextCaption, TB_NextURL, imageGroup);
					return false;
				}
				jQuery("#TB_next").click(goNext);
				jQuery("#TB_nextPIC").click(goNext);
				
				
				jQuery("#divNext").click(goNext);
				
				function showRightArrow(){
					jQuery("#imgLeftArrow").css({display: 'none'});
					jQuery("#imgRightArrow").css({display: ''});
				}
				jQuery("#divNext").mouseover(showRightArrow);
				jQuery("#divNext").mouseout(hideArrows);

			}
			

			document.onkeydown = function(e){
				if (e == null) { // ie
					keycode = event.keyCode;
				} else { // mozilla
					keycode = e.which;
				}
				if(keycode == 27){ // close
					tb_remove();
				} else if(keycode == 190){ // display previous image
					if(!(TB_NextHTML == "")){
						document.onkeydown = "";
						goNext();
					}
				} else if(keycode == 188){ // display next image
					if(!(TB_PrevHTML == "")){
						document.onkeydown = "";
						goPrev();
					}
				}
			};

			tb_position();
			jQuery("#TB_load").remove();
			jQuery("#TB_ImageOff").click(tb_remove);
			jQuery("#TB_window").css({display:"block"}); //for safari using css instead of show
			};

			imgPreloader.src = url;
		}else{//code to show html

			var queryString = url.replace(/^[^\?]+\??/,'');
			var params = tb_parseQuery( queryString );

			TB_WIDTH = (params['width']*1) + 30 || 630; //defaults to 630 if no paramaters were added to URL
			TB_HEIGHT = (params['height']*1) + 40 || 440; //defaults to 440 if no paramaters were added to URL
			ajaxContentW = TB_WIDTH - 30;
			ajaxContentH = TB_HEIGHT - 45;

			if(url.indexOf('TB_iframe') != -1){// either iframe or ajax window
					urlNoQuery = url.split('TB_');
					jQuery("#TB_iframeContent").remove();
					if(params['modal'] != "true"){//iframe no modal
						jQuery("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>"+caption+"</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton' title='"+thickboxL10n.close+"'><img src='" + tb_closeImage + "' /></a></div></div><iframe frameborder='0' hspace='0' src='"+urlNoQuery[0]+"' id='TB_iframeContent' name='TB_iframeContent"+Math.round(Math.random()*1000)+"' onload='tb_showIframe()' style='width:"+(ajaxContentW + 29)+"px;height:"+(ajaxContentH + 17)+"px;' >"+thickboxL10n.noiframes+"</iframe>");
					}else{//iframe modal
					jQuery("#TB_overlay").unbind();
						jQuery("#TB_window").append("<iframe frameborder='0' hspace='0' src='"+urlNoQuery[0]+"' id='TB_iframeContent' name='TB_iframeContent"+Math.round(Math.random()*1000)+"' onload='tb_showIframe()' style='width:"+(ajaxContentW + 29)+"px;height:"+(ajaxContentH + 17)+"px;'>"+thickboxL10n.noiframes+"</iframe>");
					}
			}else{// not an iframe, ajax
					if(jQuery("#TB_window").css("display") != "block"){
						if(params['modal'] != "true"){//ajax no modal
						jQuery("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>"+caption+"</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton'><img src='" + tb_closeImage + "' /></a></div></div><div id='TB_ajaxContent' style='width:"+ajaxContentW+"px;height:"+ajaxContentH+"px'></div>");
						}else{//ajax modal
						jQuery("#TB_overlay").unbind();
						jQuery("#TB_window").append("<div id='TB_ajaxContent' class='TB_modal' style='width:"+ajaxContentW+"px;height:"+ajaxContentH+"px;'></div>");
						}
					}else{//this means the window is already up, we are just loading new content via ajax
						jQuery("#TB_ajaxContent")[0].style.width = ajaxContentW +"px";
						jQuery("#TB_ajaxContent")[0].style.height = ajaxContentH +"px";
						jQuery("#TB_ajaxContent")[0].scrollTop = 0;
						jQuery("#TB_ajaxWindowTitle").html(caption);
					}
			}

			jQuery("#TB_closeWindowButton").click(tb_remove);

				if(url.indexOf('TB_inline') != -1){
					jQuery("#TB_ajaxContent").append(jQuery('#' + params['inlineId']).children());
					jQuery("#TB_window").unload(function () {
						jQuery('#' + params['inlineId']).append( jQuery("#TB_ajaxContent").children() ); // move elements back when you're finished
					});
					tb_position();
					jQuery("#TB_load").remove();
					jQuery("#TB_window").css({display:"block"});
				}else if(url.indexOf('TB_iframe') != -1){
					tb_position();
					if(jQuery.browser.safari){//safari needs help because it will not fire iframe onload
						jQuery("#TB_load").remove();
						jQuery("#TB_window").css({display:"block"});
					}
				}else{
					jQuery("#TB_ajaxContent").load(url += "&random=" + (new Date().getTime()),function(){//to do a post change this load method
						tb_position();
						jQuery("#TB_load").remove();
						tb_init("#TB_ajaxContent a.thickbox");
						jQuery("#TB_window").css({display:"block"});
					});
				}

		}

		if(!params['modal']){
			document.onkeyup = function(e){
				if (e == null) { // ie
					keycode = event.keyCode;
				} else { // mozilla
					keycode = e.which;
				}
				if(keycode == 27){ // close
					tb_remove();
				}
			};
		}

	} catch(e) {
		//nothing here
	}
}

//helper functions below
function tb_showIframe(){
	jQuery("#TB_load").remove();
	jQuery("#TB_window").css({display:"block"});
}

function tb_remove() {
 	jQuery("#TB_imageOff").unbind("click");
	jQuery("#TB_closeWindowButton").unbind("click");
	jQuery("#TB_window").fadeOut("fast",function(){jQuery('#TB_window,#TB_overlay,#TB_HideSelect').trigger("unload").unbind().remove();});
	jQuery("#TB_load").remove();
	if (typeof document.body.style.maxHeight == "undefined") {//if IE 6
		jQuery("body","html").css({height: "auto", width: "auto"});
		jQuery("html").css("overflow","");
	}
	document.onkeydown = "";
	document.onkeyup = "";
	return false;
}

function tb_position() {
var isIE6 = typeof document.body.style.maxHeight === "undefined";
jQuery("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2),10) + 'px', width: TB_WIDTH + 'px'});
	if ( ! isIE6 ) { // take away IE6
		jQuery("#TB_window").css({marginTop: '-' + parseInt((TB_HEIGHT / 2),10) + 'px'});
	}
}

function tb_parseQuery ( query ) {
   var Params = {};
   if ( ! query ) {return Params;}// return empty object
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) {continue;}
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;
   }
   return Params;
}

function tb_getPageSize(){
	var de = document.documentElement;
	var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight;
	arrayPageSize = [w,h];
	return arrayPageSize;
}

function tb_detectMacXFF() {
  var userAgent = navigator.userAgent.toLowerCase();
  if (userAgent.indexOf('mac') != -1 && userAgent.indexOf('firefox')!=-1) {
    return true;
  }
}
</script>
<?php ########################################################################################################## ?>
<div id="bodyBottomRighty" style="float:left;">
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
<?php ################################################################################################# ?>
<style>#bodyBottomLeft img{float:left;margin:30px 27px 30px 27px !important; }</style>
<div id="bodyBottomLeft">
<h2><span>Image Gallery Of Dhuliyan Municipality</h2>
<?php ################################################################################################# ?>
<div class="gallery">
<?php 
$sql1="SELECT `images` FROM `tender` WHERE `images` != ''"; $list1=$this->projectmodel->get_records_from_sql($sql1);
$sql2="SELECT `images` FROM `service` WHERE `images` != ''"; $list2=$this->projectmodel->get_records_from_sql($sql2);
$sql3="SELECT `images` FROM `project` WHERE `images` != ''"; $list3=$this->projectmodel->get_records_from_sql($sql3);
$sql4="SELECT `Image` FROM `depertment` WHERE `Image` != ''"; $list4=$this->projectmodel->get_records_from_sql($sql4);
$sql5="SELECT `images` FROM `content` WHERE `images` != ''"; $list5=$this->projectmodel->get_records_from_sql($sql5);
$sql6="SELECT `image` FROM `administration` WHERE `image` != ''"; $list6=$this->projectmodel->get_records_from_sql($sql6);
$sql7="SELECT `images` FROM `banner` WHERE `images` != ''"; $list7=$this->projectmodel->get_records_from_sql($sql7);
?>
<?php ########################################################################################################## ?>
<?php foreach ($list1 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/tender/'; ?>
<div><a href="<?php echo $picpath.$row->images; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->images; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list2 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/service/'; ?>
<div><a href="<?php echo $picpath.$row->images; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->images; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list3 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/project/'; ?>
<div><a href="<?php echo $picpath.$row->images; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->images; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list4 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/products/'; ?>
<div><a href="<?php  echo $picpath.$row->Image; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->Image; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list7 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/banner/'; ?>
<div><a href="<?php echo $picpath.$row->images;?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->images; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list5 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/contents/'; ?>
<div><a href="<?php echo $picpath.$row->images; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->images; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
<?php foreach ($list6 as $row){ $picpath=BASE_PATH_ADMIN.'uploads/administration/'; ?>
<div><a href="<?php echo $picpath.$row->image; ?>" title="" class="thickbox" rel="gallery-plants"><img src="<?php echo $picpath.$row->image; ?>" width="150" height="150" alt="Plant 1" /></a></div><?php } ?>
</div>
<?php ########################################################################################################## ?>
</div>