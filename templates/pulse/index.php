<?php
/**
* @version   $Id: index.php 9769 2013-04-26 17:40:14Z kevin $
 * @author RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access

defined( '_JEXEC' ) or die( 'Restricted index access' );

$jquery = '';
jimport('joomla.version');
$version = new JVersion();
if(version_compare($version->getShortVersion(), '3.0', '>=')){
    JHtml::_('jquery.framework');
    JFactory::getDocument()->addScriptDeclaration('jQuery(document).ready(function()
    {
        if(typeof jQuery(".hasTooltip").tooltip != "undefined"){
            jQuery(".hasTooltip").tooltip({"html": true,"container": "body"});
        }
    });');
} else {
    JHTML::_('behavior.mootools');
    JFactory::getDocument()->addScript($this->baseurl.'/templates/'.$this->template.'/js/jq.min.js');
}
        
// load and inititialize gantry class
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();

// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));
?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
	<meta name="viewport" content="width=960px">
	<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
	<meta name="viewport" content="width=1200px">
	<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="HandheldFriendly" content="true" />
        <script type="text/javascript">
        if(navigator.appVersion.indexOf("MSIE 9.")!=-1){
            document.documentElement.className += " ie9";
        } else if(navigator.appVersion.indexOf("MSIE 8.")!=-1){
            document.documentElement.className += " ie8";
        } else if(navigator.appVersion.indexOf("MSIE 7.")!=-1){
            document.documentElement.className += " ie7";
        }
        </script>
	<?php endif; ?>
    <?php
        
        $gantry->displayHead();
        
        // Family weight H1,H2...
        
        // Family1 is for the titles
    
        $font_family = $gantry->get('font1-family1');
        
        if (strpos($font_family, ':')) {
                $explode = explode(':', $font_family);

                $delimiter = $explode[0];
                $name      = $explode[1];
                $variant   = isset($explode[2]) ? $explode[2] : null;
        } else {
                $delimiter = false;
                $name      = $font_family;
                $variant   = null;
        }

        if (isset($variant) && $variant) $variant = ':' . $variant;
        else if($gantry->get('font1-weight1')){ $variant = ':' . $gantry->get('font1-weight1'); }

        switch ($delimiter) {
                // google fonts
                case 'g':
                        $variant = $variant ? $variant : '';
                        $gantry->addStyle('//fonts.googleapis.com/css?family=' . str_replace(" ", "+", $name) . $variant);
                        break;
                default:
                        break;
        }
        
        $gantry->addInlineStyle("\nh1,h2,h3,h4,h5,h6,.title,legend {font-weight: lighter;}\nh1,h2,h3,h4,h5,h6,.title,legend { font-family: '" . $name . "', 'Helvetica', arial, sans-serif; font-weight: " . $gantry->get('font1-weight1') . " !important; }\n");
        
        // Family1 Body End
       
        // Family2 is for the body
    
        $font_family = $gantry->get('font2-family2');
        
        if (strpos($font_family, ':')) {
                $explode = explode(':', $font_family);

                $delimiter = $explode[0];
                $name      = $explode[1];
                $variant   = isset($explode[2]) ? $explode[2] : null;
        } else {
                $delimiter = false;
                $name      = $font_family;
                $variant   = null;
        }

        if (isset($variant) && $variant) $variant = ':' . $variant;
        else if($gantry->get('font2-weight2')){ $variant = ':' . $gantry->get('font2-weight2'); }

        switch ($delimiter) {
                // google fonts
                case 'g':
                        $variant = $variant ? $variant : '';
                        $gantry->addStyle('//fonts.googleapis.com/css?family=' . str_replace(" ", "+", $name) . $variant);
                        break;
                default:
                        break;
        }
        
        $gantry->addInlineStyle("\nbody, input, button, select, textarea { font-family: '" . $name . "', 'Helvetica', arial, sans-serif; font-weight: " . $gantry->get('font2-weight2') . "; }\n");
        
        // Family2 Body End
        
        // Family3 is for the menu
    
        $font_family = $gantry->get('font3-family3');
        
        if (strpos($font_family, ':')) {
                $explode = explode(':', $font_family);

                $delimiter = $explode[0];
                $name      = $explode[1];
                $variant   = isset($explode[2]) ? $explode[2] : null;
        } else {
                $delimiter = false;
                $name      = $font_family;
                $variant   = null;
        }

        if (isset($variant) && $variant) $variant = ':' . $variant;
        else if($gantry->get('font3-weight3')){ $variant = ':' . $gantry->get('font3-weight3'); }
        
        switch ($delimiter) {
                // google fonts
                case 'g':
                        $variant = $variant ? $variant : '';
                        $gantry->addStyle('//fonts.googleapis.com/css?family=' . str_replace(" ", "+", $name) . $variant);
                        break;
                default:
                        break;
        }
        
        $gantry->addInlineStyle("\n.gf-menu, .gf-menu .item, .breadcrumb, [class^=\"icon-\"] { font-family: '" . $name . "', 'Helvetica', arial, sans-serif; font-weight: " . $gantry->get('font3-weight3') . ";}\n");
        
        // Family3 Menu End
        
        $gantry->addStyle('grid-responsive.css', 5);
        $gantry->addLess('bootstrap.less', 'bootstrap.css', 6);

        if ($gantry->browser->name == 'ie') {
            if ($gantry->browser->shortversion == 9) {
                $gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
            }
            if ($gantry->browser->shortversion == 8) {
                $gantry->addScript('html5shim.js');
            }
        }
        if ($gantry->get('layout-mode', 'responsive') == 'responsive')
            $gantry->addScript('rokmediaqueries.js');
        if ($gantry->get('loadtransition')) {
            $gantry->addScript('load-transition.js');
            $hidden = ' class="rt-hidden"';
        }
    ?>
        <script type="text/javascript">
        <!--
        // windows phone IE10 snap mode fix
        (function() {
                if ("-ms-user-select" in document.documentElement.style && ( navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/IEMobile\/11\.0/) ) ) {
                        var msViewportStyle = document.createElement("style");
                        msViewportStyle.appendChild(
                                document.createTextNode("@-ms-viewport{width:auto!important}")
                        );
                        document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
                }
        })();
        
        jQuery(document).ready(function(){
          
            <?php
            JFactory::getDocument()->addScript(JURI::root(true).'/templates/'.$this->template.'/js/TweenMax.min.js'); 
            JFactory::getDocument()->addScript(JURI::root(true).'/templates/'.$this->template.'/js/jq.scrollmagic.min.js');
            ?>
            if(document.getElementById('rt-mainbottom')){
                var plx_duration = jQuery("#rt-mainbottom").height() + jQuery(window).height();
                var plx_bgPosMovement = "0 " + ( plx_duration * 0.4 * -1 ) + "px";
                
                var plx_controller = new ScrollMagic({globalSceneOptions: {triggerHook: "onEnter", duration: plx_duration}});
                
                new ScrollScene({triggerElement: "#rt-mainbottom"})
                    .setTween(TweenMax.to("#rt-mainbottom",1, {backgroundPosition: plx_bgPosMovement, ease: Linear.easeNone}))
                    .addTo(plx_controller);
            }
            
            var controller = new ScrollMagic({globalSceneOptions: {triggerHook: "onEnter", duration: 0}});
            
            jQuery(".rt-block.ct-scroll-scale").each(
                function(){
                    var tween = TweenMax.to(this, 0.4, {scale: 1.0});
                    new ScrollScene({triggerElement: jQuery(this).closest('.rt-container')})
                            .setTween(tween)
                            .addTo(controller)
                            .reverse(false);
                }
            );
    
            jQuery(".rt-block.ct-scroll-leftin").each(
                function(){
                    var display = jQuery(this).css('display');
                    jQuery(this).css('display','none');
                    var tween = TweenMax.to(this, 1, {left: 0, display: display});
                    new ScrollScene({triggerElement: jQuery(this).closest('.rt-container'), duration: 400})
                    .setTween(tween)
                    .addTo(controller).reverse(false);
                }
            );
    
            jQuery(".rt-block.ct-scroll-rightin").each(
                function(){
                    var display = jQuery(this).css('display');
                    jQuery(this).css('display','none');
                    var tween = TweenMax.to(this, 1, {right: 0, display: display});
                    new ScrollScene({triggerElement: jQuery(this).closest('.rt-container'), duration: 400})
                    .setTween(tween)
                    .addTo(controller).reverse(false);
                }
            );
    
            jQuery(".rt-block.ct-scroll-bottomin").each(
                function(){
                    var display = jQuery(this).css('display');
                    jQuery(this).css('display','none');
                    var tween = TweenMax.to(this, 0.6, {bottom: 0, display: display});
                    new ScrollScene({triggerElement: jQuery(this).closest('.rt-container'), duration: 400})
                    .setTween(tween)
                    .addTo(controller).reverse(false);
                }
            );
    
            jQuery(".rt-block.ct-scroll-opacity").each(
                function(){
                    var tween = TweenMax.to(this, 1, {opacity: 1});
                    new ScrollScene({triggerElement: jQuery(this).closest('.rt-container'), duration: 800})
                    .setTween(tween)
                    .addTo(controller).reverse(false);
                }
            );
            
            var is_iOS = navigator.userAgent.match(/iPhone/i) != null || navigator.userAgent.match(/iPod/i) != null || navigator.userAgent.match(/iPad/i) != null;

            var menu = jQuery('#rt-header');

            if(jQuery('#rt-top').size() != 1){
                jQuery('#rt-header').addClass('ct-header-border');
            }
            
            <?php
            if($gantry->get('enablestickymenu')){
            ?>
            if(jQuery(window).width() > 767){
                
                jQuery('#rt-top').css('display','none')
                
                if(jQuery(menu).next().hasClass('ct-showcase')){
                    jQuery(menu).addClass('ct-fixed-header');
                }

                jQuery(menu).addClass('ct-fixed-transition');

                var cubuk_seviye = jQuery(document).scrollTop();
                var header_yuksekligi = jQuery(menu).outerHeight();

                jQuery(window).scroll(function() {
                    var kaydirma_cubugu = jQuery(document).scrollTop();

                    if (kaydirma_cubugu > 0){
                        jQuery(menu).addClass('gizle');
                        jQuery(menu).addClass('ct-fixed-transition');
                        jQuery(menu).addClass('ct-fixed-header');
                    } 
                    else {
                        jQuery(menu).removeClass('gizle');
                        if(!jQuery(menu).next().hasClass('ct-showcase')){
                            jQuery(menu).removeClass('ct-fixed-transition');
                            jQuery(menu).removeClass('ct-fixed-header');
                        }
                    }

                    if (kaydirma_cubugu > cubuk_seviye){jQuery(menu).removeClass('sabit');} 
                    else {jQuery(menu).addClass('sabit');}				

                    cubuk_seviye = jQuery(document).scrollTop();	
                 });
            }
            <?php
            }
            ?>
            
            jQuery('.dropdown li > a > [class^="icon-"]').each(
                function(){
                    var backup = jQuery(this).html();
                    jQuery(this).html('');
                    jQuery(this).parent().append(backup);
                    jQuery(this).closest('li').prepend(jQuery(this));
                }
            );
            <?php
            if($gantry->get('totupbutton')){
            ?>
            jQuery('body').append('<div id="toTop"><li class="icon-chevron-up"></li></div>');
            jQuery(window).scroll(function () {
                    if (jQuery(this).scrollTop() != 0) {
                            jQuery('#toTop').fadeIn();
                    } else {
                            jQuery('#toTop').fadeOut();
                    }
            });
            window.addEvent("domready",function(){var b=document.id("toTop");if(b){var a=new Fx.Scroll(window);b.setStyle("outline","none").addEvent("click",function(c){c.stop(); a.toTop();});}});
            <?php
            }
            ?>
        });
        
        var menuWidth = 0;
        var items = [];
        var allPages = 0;
        var currentPage = 0;
        
        function menuItemNext(direction){
            
            if(direction == 'init'){
                
                for(var i = 0; i < items.length;i++){
                    jQuery(items[i].item).addClass('animated');
                    jQuery(items[i].item).addClass('fadeInLeft');
                    jQuery(items[i].item).removeClass('fadeInRight');
                    if(items[i].page != currentPage){
                        jQuery(items[i].item).css('display','none');
                    }else{
                        jQuery(items[i].item).css('display','inline-block');
                    }
                }
                
            } else if(direction == 'next'){
                
                if(currentPage < allPages){
                    currentPage++;
                }
                
                for(var i = 0; i < items.length;i++){
                    jQuery(items[i].item).addClass('fadeInLeft');
                    jQuery(items[i].item).removeClass('fadeInRight');
                    if(items[i].page != currentPage){
                        jQuery(items[i].item).css('display','none');
                    }else{
                        jQuery(items[i].item).css('display','inline-block');
                    }
                }
                
            } else if(direction == 'prev'){
                
                if(currentPage > 0){
                    currentPage--;
                }
                
                for(var i = 0; i < items.length;i++){
                    jQuery(items[i].item).removeClass('fadeInLeft');
                    jQuery(items[i].item).addClass('fadeInRight');
                    if(items[i].page != currentPage){
                        jQuery(items[i].item).css('display','none');
                    }else{
                        jQuery(items[i].item).css('display','inline-block');
                    }
                }
            }
            
            if(currentPage + 1 <= allPages && items.length != 0 && jQuery("#itemMenuNext999").length == 0){
                jQuery(items[items.length-1].item).closest('ul').append('<li id="itemMenuNext999" class="itemMenuNext999 last"><a href="javascript:menuItemNext(\'next\')" class="item">'+<?php echo json_encode($gantry->get('menupagingmore') == '' ? 'More' : $gantry->get('menupagingmore')); ?>+' <i class="icon-chevron-right">&nbsp;</i></a></li>');
                jQuery('#itemMenuNext999').addClass('animated');
                jQuery('#itemMenuNext999').addClass('fadeInDown');
            } else if(currentPage >= allPages){
                jQuery('#itemMenuNext999').remove();
            }
            
            if(currentPage > 0 && items.length != 0 && jQuery("#itemMenuPrev999").length == 0){
                jQuery(items[items.length-1].item).closest('ul').prepend('<li id="itemMenuPrev999" class="itemMenuPrev999 last"><a href="javascript:menuItemNext(\'prev\')" class="item"><i class="icon-chevron-left">&nbsp;</i> '+<?php echo json_encode($gantry->get('menupagingless') == '' ? 'Less' : $gantry->get('menupagingless')); ?>+'</a></li>');
                jQuery('#itemMenuPrev999').addClass('animated');
                jQuery('#itemMenuPrev999').addClass('fadeInDown');
            }else if(currentPage <= 0){
                jQuery('#itemMenuPrev999').remove();
            }
        }
        //-->
        </script>
</head>
<body <?php echo $gantry->displayBodyTag(); ?>>
    
    <?php /** Begin Top Surround **/ if ($gantry->countModules('top') or $gantry->countModules('header')) : ?>
    
    <header id="rt-top-surround">
		<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
		<div id="rt-top" <?php echo $gantry->displayClassesByTag('rt-top'); ?>>
			<div class="rt-container">
				<?php echo $gantry->displayModules('top','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Top **/ endif; ?>
		<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
		<div id="rt-header">
                    
			<div class="rt-container">
                            
				<?php echo $gantry->displayModules('header','standard','standard'); ?>
				<div class="clear"></div>
                                
			</div>
                    
		</div>
		<?php /** End Header **/ endif; ?>
        
        <?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
        
	<div id="rt-showcase" class="ct-showcase">
            
		<div class="rt-showcase-pattern">
                  
			<div class="rt-container">
                           
				<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
				<div class="clear"></div>
			
		</div>
	</div>
        </div>
        <?php else:?>
        <?php /** End Showcase **/ endif; ?>
        
        
    </header>
    <?php /** End Top Surround **/ endif; ?>
    <div id="ct-body">
        
            <div id="rt-transition"<?php if ($gantry->get('loadtransition')) echo $hidden; ?>>
                
                    <?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
                    <div id="rt-breadcrumbs">
                            <div class="rt-container">
                                    <?php echo $gantry->displayModules('breadcrumb','standard','standard'); ?>
                                    <div class="clear"></div>
                            </div>
                    </div>
                    <?php /** End Breadcrumbs **/ endif; ?>
                    <div id="rt-mainbody-surround">

                            <?php /** Begin topparallax **/ if ($gantry->countModules('parallaxtop')) : ?>
                        
                        <div id="ct-parallaxtop">
                                <div class="rt-container">
                                        <?php echo $gantry->displayModules('parallaxtop','standard','standard'); ?>
                                        <div class="clear"></div>
                                </div>
                        </div>
                        <?php /** End topparallax **/ endif; ?>
                        

                            <?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
                            <div id="rt-drawer">
                                <div class="rt-container">
                                    <?php echo $gantry->displayModules('drawer','standard','standard'); ?>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php /** End Drawer **/ endif; ?>
                            <?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
                            <div id="rt-feature">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('feature','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                                    <div id="ct-feature-divider"></div>
                            </div>

                            <?php /** End Feature **/ endif; ?>
                            <?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
                            <div id="rt-utility">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('utility','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End Utility **/ endif; ?>

                            <?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
                            <div id="rt-maintop">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('maintop','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End Main Top **/ endif; ?>
                            <?php /** Begin Full Width**/ if ($gantry->countModules('fullwidth')) : ?>
                            <div id="rt-fullwidth">
                                    <?php echo $gantry->displayModules('fullwidth','basic','basic'); ?>
                                            <div class="clear"></div>
                                    </div>
                            <?php /** End Full Width **/ endif; ?>
                            <?php /** Begin Main Body **/ ?>
                            <div id="ct-mainbody">
                                <div class="rt-container">
                                        <?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
                                </div>
                            </div>
                            <?php /** End Main Body **/ ?>
                        
                            <?php /** Begin parallaxbottom **/ if ($gantry->countModules('parallaxbottom')) : ?>
                            <div id="ct-parallaxbottom">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('parallaxbottom','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End parallaxbottom **/ endif; ?>
                        
                            <?php /** Begin Main Bottom **/ $background = $gantry->get('bild-bild1'); if ($gantry->countModules('mainbottom')) : ?>
                            
                            <div id="rt-mainbottom">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End Main Bottom **/ endif; ?>
                            <?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
                            <div id="rt-extension">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('extension','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End Extension **/ endif; ?>
                        
                            <?php /** Begin extraextension **/ if ($gantry->countModules('extraextension')) : ?>
                            <div id="rt-extraextension">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('extraextension','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End extraextension **/ endif; ?>
                        
                            <?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
                            <div id="rt-bottom">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('bottom','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End Bottom **/ endif; ?>
                        
                            <?php /** Begin extraBottom **/ if ($gantry->countModules('extrabottom')) : ?>
                            <div id="rt-extrabottom">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('extrabottom','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End extraBottom **/ endif; ?>
                        
                    </div>
            </div>
            
            <?php /** Begin Footer Section **/ if ($gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
            <footer id="rt-footer-surround">
                    <?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
                    <div id="rt-footer">
                            <div class="rt-container">
                                    <?php echo $gantry->displayModules('footer','standard','standard'); ?>
                                    <div class="clear"></div>
                            </div>
                    </div>
                    <?php /** End Footer **/ endif; ?>
                
                    <?php /** Begin extraFooter **/ if ($gantry->countModules('extraFooter')) : ?>
                            <div id="rt-extraFooter">
                                    <div class="rt-container">
                                            <?php echo $gantry->displayModules('extraFooter','standard','standard'); ?>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <?php /** End extraFooter **/ endif; ?>
                
                    <?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
                    <div id="rt-copyright">
                            <div class="rt-container">
                                    <?php echo $gantry->displayModules('copyright','standard','standard'); ?>
                                    <div class="clear"></div>
                            </div>
                    </div>
                    <?php /** End Copyright **/ endif; ?>
            </footer>
        
        
	<?php /** End Footer Surround **/ endif; ?>
	<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
	<div id="rt-debug">
		<div class="rt-container">
			<?php echo $gantry->displayModules('debug','standard','standard'); ?>
			<div class="clear"></div>
		</div>
	</div>
	<?php /** End Debug **/ endif; ?>
	<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
	<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
	<?php /** End Analytics **/ endif; ?>
        
    </div>
	</body>
</html>
<?php
$gantry->finalize();
?>
