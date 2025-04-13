<?php    
    $default_meta_description       =   ovoo_config('meta_description');
    $default_focus_keyword          =   ovoo_config('focus_keyword');
    $author                         =   ovoo_config('author');
    $front_end_theme                =   ovoo_config('front_end_theme');
    $theme_dir                      =   'theme/mcl/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $dark_theme                     =   ovoo_config('dark_theme');
    $google_analytics_id            =   ovoo_config('google_analytics_id');       
    $footer_templete                =   ovoo_config('footer_templete');
    $share_this_enable              =   ovoo_config('social_share_enable');    
    $push_notification_enable       =   ovoo_config('push_notification_enable');
    $site_name                      =   ovoo_config('site_name');
    $recaptcha_enable               =   ovoo_config('recaptcha_enable');  
    $favicon                        =   ovoo_config('favicon');
    $enable_ribbon                  =   ovoo_config('enable_ribbon');
$site_name="MCL";
//$page_name=$this->uri->segment(2);


if($page_name=='home' or  $page_name=='ourstory' or $page_name=='ourplatform' or $page_name=='contactus'  )
{
?>

<!DOCTYPE html>
<html lang="en">
<link href="<?php echo base_url(); ?>assets/player/plugins/videojs-seek-buttons/videojs-seek-buttons.css" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php if(isset($title) && !empty($title)): echo $title; else: echo $site_name; endif; ?></title>
	<link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mcl_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mcl_assets/css/style.css">

    <script src="<?php echo base_url(); ?>assets/mcl_assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/mcl_assets/js/bootstrap.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/mcl_assets/js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/mcl_assets/js/jquery.min.js"></script>  
    
    <script>
        $(document).ready(function () {
            $(".menu-icon").on("click", function () {
                $("body").addClass("show-menu");
            });
            $(".close-menu").on("click", function () {
                $("body").removeClass("show-menu");
            })
        });
    </script>
</head>


            <?php 
            $this->load->view($theme_dir .'header');  

}

            $this->load->view($theme_dir .$page_name);  
           

		if($page_name=='home' or  $page_name=='ourstory' or $page_name=='ourplatform' or $page_name=='contactus'  )
		{		
           $this->load->view($theme_dir .'footer');  
		}
        ?>
       
    
</html>