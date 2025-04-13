      <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/contactus.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Contact Us</h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="grid gap-5 mb-5">
                <h2 class="title">Get in Touch</h2>
                <p class="m-0">Be Informed. Be Smart. Be Sure.</p>
            </div>
            <div class="row align-items-start justify-content-between">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <form method="POST" action="<?php echo base_url()?>home/contact"  >
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="fullname" placeholder="Full Name *" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="Phone Number *" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email *" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Office" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Type your message..."></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="grid gap-10">
                        <h4 class="font-weight-700">Contact Details</h4>
                        <a href="#" class="auto-fr gap-10">
                            <i class="link las la-envelope"></i>
                            <p class="m-0">support@multipleclientlist.com</p>
                        </a>
                        <div class="flex gap-15 mt-3">
                            <a href="https://www.facebook.com/multipleclientlist">
                                <img class="svg-icon" src="<?php echo base_url(); ?>assets/mcl_assets/images/fb.svg">
                            </a>
                            <a href="https://www.instagram.com/multipleclientslist">
                                <img class="svg-icon" src="<?php echo base_url(); ?>assets/mcl_assets/images/ig.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    