<?php
/**
 * @package Helix3 Framework
 * Template Name - Shaper Helix3
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2015 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework'); //Force load Bootstrap
unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']); // Remove joomla core bootstrap
//Load Helix
$helix3_path = JPATH_PLUGINS . '/system/helix3/core/helix3.php';

if (file_exists($helix3_path)) {
    require_once($helix3_path);
    $this->helix3 = helix3::getInstance();
} else {
    die('Please install and activate helix plugin');
}

//Coming Soon
if ($this->helix3->getParam('comingsoon_mode'))
    header("Location: " . $this->baseUrl . "?tmpl=comingsoon");

//Class Classes
$body_classes = '';
if ($this->helix3->getParam('sticky_header')) {
    $body_classes .= ' sticky-header';
}

$body_classes .= ($this->helix3->getParam('boxed_layout', 0)) ? ' layout-boxed' : ' layout-fluid';

if (isset($menu) && $menu) {
  if ($menu->params->get('pageclass_sfx')) {
    $body_classes .= ' ' . $menu->params->get('pageclass_sfx');
  }
}

//Body Background Image
if ($bg_image = $this->helix3->getParam('body_bg_image')) {

    $body_style = 'background-image: url(' . JURI::base(true) . '/' . $bg_image . ');';
    $body_style .= 'background-repeat: ' . $this->helix3->getParam('body_bg_repeat') . ';';
    $body_style .= 'background-size: ' . $this->helix3->getParam('body_bg_size') . ';';
    $body_style .= 'background-attachment: ' . $this->helix3->getParam('body_bg_attachment') . ';';
    $body_style .= 'background-position: ' . $this->helix3->getParam('body_bg_position') . ';';
    $body_style = 'body.site {' . $body_style . '}';

    $doc->addStyledeclaration($body_style);
}

//Body Font
$webfonts = array();

if ($this->params->get('enable_body_font')) {
    $webfonts['body'] = $this->params->get('body_font');
}

//Heading1 Font
if ($this->params->get('enable_h1_font')) {
    $webfonts['h1'] = $this->params->get('h1_font');
}

//Heading2 Font
if ($this->params->get('enable_h2_font')) {
    $webfonts['h2'] = $this->params->get('h2_font');
}

//Heading3 Font
if ($this->params->get('enable_h3_font')) {
    $webfonts['h3'] = $this->params->get('h3_font');
}

//Heading4 Font
if ($this->params->get('enable_h4_font')) {
    $webfonts['h4'] = $this->params->get('h4_font');
}

//Heading5 Font
if ($this->params->get('enable_h5_font')) {
    $webfonts['h5'] = $this->params->get('h5_font');
}

//Heading6 Font
if ($this->params->get('enable_h6_font')) {
    $webfonts['h6'] = $this->params->get('h6_font');
}

//Navigation Font
if ($this->params->get('enable_navigation_font')) {
    $webfonts['.sp-megamenu-parent'] = $this->params->get('navigation_font');
}

//Custom Font
if ($this->params->get('enable_custom_font') && $this->params->get('custom_font_selectors')) {
    $webfonts[$this->params->get('custom_font_selectors')] = $this->params->get('custom_font');
}

$this->helix3->addGoogleFont($webfonts);

//Custom CSS
if ($custom_css = $this->helix3->getParam('custom_css')) {
    $doc->addStyledeclaration($custom_css);
}

//Custom JS
if ($custom_js = $this->helix3->getParam('custom_js')) {
    $doc->addScriptdeclaration($custom_js);
}

//preloader & goto top
$doc->addScriptdeclaration("\nvar sp_preloader = '" . $this->params->get('preloader') . "';\n");
$doc->addScriptdeclaration("\nvar sp_gotop = '" . $this->params->get('goto_top') . "';\n");
$doc->addScriptdeclaration("\nvar sp_offanimation = '" . $this->params->get('offcanvas_animation') . "';\n");



$useragent=$_SERVER['HTTP_USER_AGENT'];
$mobileDevice = 'false';
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
    $mobileDevice = 'true';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <?php
                if ($favicon = $this->helix3->getParam('favicon')) {
                    $doc->addFavicon(JURI::base(true) . '/' . $favicon);
                } else {
                    $doc->addFavicon($this->helix3->getTemplateUri() . '/images/favicon.ico');
                }
                ?>
                <!-- head -->
                <jdoc:include type="head" />
                <?php
                $megabgcolor = ($this->helix3->PresetParam('_megabg')) ? $this->helix3->PresetParam('_megabg') : '#ffffff';
                $megabgtx = ($this->helix3->PresetParam('_megatx')) ? $this->helix3->PresetParam('_megatx') : '#333333';

                $preloader_bg = ($this->helix3->getParam('preloader_bg')) ? $this->helix3->getParam('preloader_bg') : '#f5f5f5';
                $preloader_tx = ($this->helix3->getParam('preloader_tx')) ? $this->helix3->getParam('preloader_tx') : '#f5f5f5';

				
				$doc->addScript('https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js');
				$doc->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js');
				
                // load css, less and js
                $this->helix3->addCSS('bootstrap.min.css, font-awesome.min.css') // CSS Files
                        ->addJS('bootstrap.min.js, jquery.sticky.js, main.js, jd_map.js, jquery.nicescroll.min.js, jd.js') // JS Files
                        ->lessInit()->setLessVariables(array(
                            'preset' => $this->helix3->Preset(),
                            'bg_color' => $this->helix3->PresetParam('_bg'),
                            'text_color' => $this->helix3->PresetParam('_text'),
                            'major_color' => $this->helix3->PresetParam('_major'),
                            'megabg_color' => $megabgcolor,
                            'megatx_color' => $megabgtx,
                            'preloader_bg' => $preloader_bg,
                            'preloader_tx' => $preloader_tx,
                        ))
                        ->addLess('legacy/bootstrap', 'legacy')
                        ->addLess('master', 'template');

                //RTL
                if ($this->direction == 'rtl') {
                    $this->helix3->addCSS('bootstrap-rtl.min.css')
                            ->addLess('rtl', 'rtl');
                }

                $this->helix3->addLess('presets', 'presets/' . $this->helix3->Preset(), array('class' => 'preset'));

                //Before Head
                if ($before_head = $this->helix3->getParam('before_head')) {
                    echo $before_head . "\n";
                }
				$offcanvasAnimationValue = $this->params->get('offcanvas_animation');
				$offcanvasBodyClass ="";
				if(isset($offcanvasAnimationValue) && $offcanvasAnimationValue == 'default'){
					$offcanvasBodyClass = 'default-offcanvas';
				}
                ?>
				<script>
				var JDCONST = {};
				JDCONST.IS_MOBILE = <?php echo $mobileDevice; ?>;
				</script>
                </head>
                <body class="<?php echo $this->helix3->bodyClass($body_classes); ?> off-canvas-menu-init <?php echo $offcanvasBodyClass?>">

                    <div class="body-wrapper">
                        <div class="body-innerwrapper">
                            <?php $this->helix3->generatelayout(); ?>
                        </div> <!-- /.body-innerwrapper -->
                    </div> <!-- /.body-innerwrapper -->

                    <!-- Off Canvas Menu -->
                    <div class="offcanvas-menu">
                        <a href="#" id="offcanvas-toggler" class="close-offcanvas hamburger active"><span></span><span></span><span></span></a>
                        <div class="offcanvas-inner">
                            <?php if ($this->helix3->countModules('offcanvas')) { ?>
                              <jdoc:include type="modules" name="offcanvas" style="sp_xhtml" />
                            <?php } else { ?>
                              <p class="alert alert-warning">
                                <?php echo JText::_('HELIX_NO_MODULE_OFFCANVAS'); ?>
                              </p>
                            <?php } ?>
                        </div> <!-- /.offcanvas-inner -->
                    </div> <!-- /.offcanvas-menu -->

                    <?php
                    if ($this->params->get('compress_css')) {
                        $this->helix3->compressCSS();
                    }

                    $tempOption    = $app->input->get('option');
                    // $tempView       = $app->input->get('view');

                    if ( $this->params->get('compress_js') && $tempOption != 'com_config' ) {
                        $this->helix3->compressJS($this->params->get('exclude_js'));
                    }

                    //before body
                    if ($before_body = $this->helix3->getParam('before_body')) {
                        echo $before_body . "\n";
                    } ?>

                    <jdoc:include type="modules" name="debug" />
                    <!-- Preloader -->
                    <jdoc:include type="modules" name="helixpreloader" />
                    <!-- Go to top -->
                    <?php if ($this->params->get('goto_top')) { ?>
                        <a href="javascript:void(0)" class="scrollup">&nbsp;</a>
                    <?php } ?>
					<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58c0a07bfc7a47a4"></script> 
                </body>
                </html>
