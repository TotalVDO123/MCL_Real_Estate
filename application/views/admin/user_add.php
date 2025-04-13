<?php echo form_open(base_url() . 'admin/manage_user/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<h4 class="text-center"><?php echo trans('new_user_information'); ?></h4>
<hr>
<div class="form-group">
  <label class="control-label"><?php echo 'First name' ; ?></label>
  <input type="text" name="first_name" class="form-control" placeholder="First name" required/>
</div>

<div class="form-group">
  <label class="control-label"><?php echo 'Last name'; ?></label>
  <input type="text" name="last_name" class="form-control" placeholder="Last name" />
</div>

<div class="form-group">
  <label class="control-label"><?php echo 'Phone/Mobile'; ?></label>
  <input type="text" name="phone" class="form-control" placeholder="Phone/Mobile" required />
</div>

<div class="form-group">
  <label class="control-label"><?php echo 'Email'; ?></label>
  <input type="text" name="email" class="form-control" placeholder="<?php echo 'Email'; ?>" />
</div>


<div class="form-group">
  <label class="control-label"><?php echo 'Email'; ?></label>
  <input type="text" name="email" class="form-control" placeholder="<?php echo 'Email'; ?>" />
</div>



<div class="form-group">
<label class="control-label"><?php echo 'Affiliated Real Estate Brokerage'; ?></label>
 <input type="text" name="realestate_brokerage" placeholder="Affiliated Real Estate Brokerage" class="form-control" required />
</div>



<div class="form-group">
<label class="control-label"><?php echo 'Office Address'; ?></label>
	<input type="text" name="office_address" placeholder="Office Address" class="form-control" required />
</div>



<div class="form-group">
 <label class="control-label"><?php echo 'Affiliated MLS Name'; ?></label>  
	<input type="text" name="affiliated_mls_name" placeholder="Affiliated MLS Name" class="form-control" required />
</div>


<div class="form-group">
<label class="control-label"><?php echo 'office_phone_number'; ?></label>
	<input type="text" name="office_phone_number" placeholder="Office Phone Number" class="form-control" required />
</div>
							


<div class="form-group">
<label class="control-label"><?php echo 'Activation Code'; ?></label>
	<input type="text" name="activation_code" placeholder="Activation Code" class="form-control" required />
</div>

							
  

<div class="form-group">
  <label class="control-label"><?php echo trans('login_password'); ?></label>
  <input type="password" name="password" class="form-control" placeholder="<?php echo trans('enter_login_password'); ?>" />
</div>


<div class="form-group">
  <label class="control-label"><?php echo trans('user_role'); ?></label>
  <select class="form-control" name="role" required>
    < <option value="admin"><?php echo trans('admin'); ?></option>
      <option value="subscriber"><?php echo trans('subscriber'); ?></option>
  </select>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9 m-t-15">
    <button type="submit" class="btn btn-sm btn-primary waves-effect"> <span class="btn-label"><i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
    <button type="" class="btn btn-sm btn-white m-l-5 waves-effect" data-dismiss="modal"><?php echo trans('close'); ?> </button>
  </div>
</div>
</form>
<script>
  jQuery(document).ready(function() {
    $('form').parsley();

  });
</script>