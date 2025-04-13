<footer>
        <div class="container">
            <div class="flex justify-content-between align-items-start">
                 <div class="col-box-3">
                    <a href="#">
                        <img class="icon svg" src="<?php echo base_url(); ?>assets/mcl_assets/images/footer.svg" />
                    </a>
                </div>
                
               
                 <div class="col-box-2">
                    <div class="grid gap-25">
                        <h4>Quick Links</h4>
                        <ul class="grid gap-10">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="<?php echo base_url() ?>ourstory">Our Story</a></li>
                            <li><a href="<?php echo base_url() ?>ourplatform">Our Platform</a></li>
                            <li><a href="<?php echo base_url() ?>contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-box-4">
                    <a href="#">
                        <img class="icon" src="<?php echo base_url(); ?>assets/mcl_assets/images/patentpending.html.png" />
                    </a>
                </div>
                
                 <div class="col-box-1">
                    <div class="grid gap-25">
                        <h4>Get In Touch</h4>
                        <a href="mailto:support@multipleclientlist" class="auto-fr gap-10">
                            <i class="link las la-envelope"></i>
                            <p class="m-0">support@multipleclientlist.com</p>
                        </a>
                        <div class="flex gap-30">
                            <a href="https://www.facebook.com/multipleclientlist" class="auto-fr gap-5">
                                <i class="lab la-facebook-f"></i>
                                <p class="m-0">Facebook</p>
                            </a>
                            |
                            <a href="https://www.instagram.com/multipleclientslist" class="auto-fr gap-5">
                                <i class="lab la-instagram"></i>
                                <p class="m-0">Instagram</p>
                            </a>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </footer>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>© 2022. Multiple Clients List - All Rights Reserved.</p>
                </div>
                <div class="col-lg-6">
                    <ul class="flex align-items-center justify-content-end gap-20">
                        <li>
                            <a href="<?php echo base_url(); ?>home/privacy_policy">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/terms_and_conditions">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/web_accessibility">Web Accessibility</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	
	
	<script type="text/javascript">
        
		/*
		
		$(function() {
            $('#btncheck').click(function() {
                if ($('#chkterms').is(':checked')) {
                    alert('you agreed conditions')
                }
                else {
                    alert('please check terms & conditions');
					return false;
                }
            })
        })
    */
	
	
	$(function() {
            $('#chkterms').click(function() {
                if ($('#chkterms').is(':checked')) {
                   //alert('you agreed conditions')
					$("#btncheck").removeAttr('disabled');
					 //$('#btncheck').attr('disabled', 'false');
                }
                else 
				{
                    //alert('please check terms & conditions');
					//return false;
					$('#btncheck').attr('disabled', 'true');
                }
            })
        })
	
	
	</script>