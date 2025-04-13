<?php
error_reporting(0);
session_start();

  if(isset($_SESSION['Username']))
{
?>
<?php

//include('../connect.php');


 define('DATABASE_HOST', 'localhost:3306');           // Database host
    define('DATABASE_NAME', 'jcltdrxl_amrut-tdbs');           // Name of the database to be used
    define('DATABASE_USERNAME', 'jcltdrxl_amrutus');       // User name for access to database
    define('DATABASE_PASSWORD', '0}LJ[HrFNetA');   // Password for access to database
    
    define('DB_PREFIX', '');		        // Unique prefix of all tables in the database

    define('PASSWORDS_ENCRYPTION_TYPE',  '');  // AES|MD5
    define('PASSWORDS_ENCRYPTION',  '');              // true|false
    define('PASSWORDS_ENCRYPT_KEY', '');
    
	
	$connection=mysqli_connect('localhost','root','','realestate');



?>
<!DOCTYPE html>
<html class="sidebar-light sidebar-left-xs   has-top-menu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AMC Management System">
    <meta name="author" content="TOTAL VDO SOLUTION">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<!-- 
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
    <title>NEW MATERIAL | <?php echo SITE_NAME; ?></title>
<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php 
include('../headcssjs.php');
?>
		
    
</head>

<?php
		
		if(isset($_REQUEST['submit']))
		 {
		  $FieldTarget = 18;
		  $InputError = 0;
		  
		  $FileName = $_FILES["file"]["name"];
		  $TempName = $_FILES["file"]["tmp_name"];
		  $FileSize = $_FILES["file"]["size"];
		  //get file Handle
		  $FileHandle = fopen($TempName, "r");
		  //get header row
		  $HeadRow = fgetcsv($FileHandle,20971520,",");
		  if (count($HeadRow) > 0 && count($HeadRow) == $FieldTarget) {
		        while (($column = fgetcsv($FileHandle, 10000, ",")) !== FALSE) {
		            $sl_no = $column[0];
		            $pvr_no = $column[1];
		            $city = $column[2];
		            if(!empty($city)){
		               $sql_city = "SELECT * FROM `city` WHERE `city` LIKE '".$city."'"; 
		               $res_city = mysqli_query($connection, $sql_city);
		               $row_city = mysqli_fetch_array($res_city);
		               $city = $row_city['id'];
		            }
		            $ward_no = $column[3];
		            $watco_sec = $column[4];
		            $consumer_name = $column[5];
		            $consumer_no = $column[6];
		            $so_wo = $column[7];
		            $meter_sr_no = $column[8];
		            $address = $column[9];
		            $mobile_no = $column[10];
		            $meter_install_date = $column[11];
		            $initial_meter_reading = $column[12];
		            $vendor_name = $column[13];
		            $adhar_no = $column[14];
		            $cust_pincode = $column[15];
		            $pipe_type = $column[16];
		            $flooring_type = $column[17];
		            if(!empty($vendor_name)){
		               $sql_vendor = "SELECT * FROM `vendor` WHERE `company_name` LIKE '".$vendor_name."'"; 
		               $res_vendor = mysqli_query($connection, $sql_vendor);
		               $row_vendor = mysqli_fetch_array($res_vendor);
		               $vendor_code = $row_vendor['vendor_code'];
		            }
		            else{
		                $vendor_code = '';
		            }
		            $token=	generateRandomString();
		            $install_status = 1;
		            $sql_insert="insert into new_installation set token='$token',  consumer_no='$consumer_no',cust_name='$consumer_name',cust_address='$address',cust_city='$city', cust_phone='$mobile_no',pvr_no='$pvr_no' ,meter_no='$meter_sr_no', meter_reading='$initial_meter_reading', install_date='$meter_install_date',vendor_code='$vendor_code', company_name='$vendor_name',install_status='$install_status',adhar_no = '$adhar_no',cust_pincode = '$cust_pincode',pipe_type='$pipe_type',flooring_type = '$flooring_type',ward_no='$ward_no'";
			        //echo $sql_insert.'<br>';
			        if(!mysqli_query($connection,$sql_insert)){
			            $title = 'Failed';
			            $type = 'warning';
			            $text = 'Failed on Row '.$sl_no.' Database Rolled Back';  
			            mysqli_rollback($connection);
			            break;
			        }
			        else{
			            $text = 'CSV Data Imported Successfully!';
			        }
			        $title = 'Success';
			        $text = 'CSV Data Imported Successfully!';
			        $type = 'success';
		      }
		  }
		  else{
		      $title = 'Failed';
		      $text = 'Please check CSV format and number of columns to be imported!';
		      $type = 'warning';
		  }
		    unset($_POST);
			 
			 ?>
			 
			 <script src="../source/alert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../source/alert/dist/sweetalert.css">
			 
<script type="text/javascript">
function SuccessSaved (){
	var title = '<?php echo $title; ?>';
	var text = '<?php echo $text; ?>';
	var type = '<?php echo $type; ?>';
        swal({ 
              title: title,
              text:  text,
              type: type
		},
             function(){
               
			window.location.href = "<?php echo BASE_URL; ?>/admin/importcsv.php";
        });
}

</script>
        <script type="text/javascript" >
        $( document ).ready(function() {
            "use strict";
			SuccessSaved();
		});
		
		
</script>

		<?php	 
		 }

	?>			
		
<body class="loading-overlay-showing" data-loading-overlay>
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
    <section class="body">
        <?php include('navigation-header.php'); ?>

        <div class="inner-wrapper">
        <!-- nav -->
        <?php include('navigation-sidebar.php'); ?>

        <section role="main" class="content-body">
					<header class="page-header">
						<h2>Import CSV</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="#">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Import CSV</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
						</div>
					</header>

    <div class="row">
		<div class="col">
			<section class="card">
				<div class="card-body">
					<form class="form-horizontal" id="form" enctype="multipart/form-data" method="post" >

						
						<div class="form-group row">
							
							<div class="col-lg-12 form-group">
								<div class="form-group row">
									<label class="col-sm-4 control-label text-sm-left pt-2">Import CSV Template</label>
									<div class="col-sm-8">
										<input name="file"  value="" type="file" required class="form-control  required" id="file" accept=".csv">
										<div id="msg"></div>
									</div>
									
								</div>
							</div>

						</div>
						<br>

						
						<footer class="card-footer">
							<div class="row justify-content-end">
								<div class="col-sm-12">
									<button class="btn btn-success " type="submit" name="submit" value="Save and Submit"><i class="fa fa-save"></i>&nbsp;&nbsp;<span class="bold">SAVE</span></button>
									
								</div>
							</div>
						</footer>

					</form>	
				</div>
			</section>
		</div>  
	</div>
				
			

        </div>
        
    </div>
   <!-- The meter Modal -->
  <div class="modal fade" id="myModal_meter">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Meter Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo BASE_URL."api/upload/".$row['meter_image']; ?>" class="img-fluid" >
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
   <!-- The meter Modal -->
  <div class="modal fade" id="myModal_adhar">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adhar card Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo BASE_URL."api/upload/".$row['adhar_image']; ?>" class="img-fluid" >
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 <?php include('../headjs.php'); ?>
<script>
function upperCaseF(a){ "use strict";
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

</script>
<script>
$('#item_name').keyup(delay(function (e) {
	$('#msg').html('');
	var item = this.value;
	$.ajax({
		url: '<?php echo  BASE_URL ?>/admin/ajax_item_check.php',
        data: {item: item},
        type: 'post',
        success: function (output) {
        	var obj = JSON.parse(output);
        	$('#msg').html(obj.msg);
        	if(obj.status == 1){
        		$('#item_name').val('');	
        	}
        }
    });

  //console.log('Time elapsed!', this.value);
}, 500));

function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}


function get_company_from_vendor(vendor_code)
{
	 $.ajax({url: '<?php echo  BASE_URL ?>/admin/ajax_vendor_company.php',
                    data: {vendor_code: vendor_code},
                    type: 'post',
                    success: function (output) {
                          //alert(output);
						$('#company_name').val(output)
                    }
                });
}

</script>



</body>

</html>


<script>
  $( function() {
    $( "#install_date" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>

  <script>
  function check_pvr_no()
  {
	  
	  
		var pvr_no=$('#pvr_no').val();
				$.ajax({url: '<?php echo BASE_URL ?>admin/ajax_pvr_no_unique.php',
                    data: {pvr_no: pvr_no},
                    type: 'post',
                    success: function (output) {
						if(output>0)
						{
							alert('pvr no already exists');
							 $('#pvr_no').val('');
						}	
						
                    }
                });
	  
  }
  
  function check_meter_no()
  {
		
		var meter_no=$('#meter_no').val();
		$.ajax({url: '<?php echo BASE_URL ?>admin/ajax_meter_no_unique.php',
				data: {meter_no: meter_no},
				type: 'post',
				success: function (output) {
					
					if(output>0)
					{
						alert('Meter no already exists');
						$('#meter_no').val('');
						//return false;
					}	
					//else
					//{
					//}	
				}
		});

  }
  </script>
  <script>
	function show_hidden_depth_of_floor(selected_value)
	{
		
		if(selected_value=='Above ground level')
		{
			
			$('#depth_of_the_floor').attr("disabled", true); 

			//alert(selected_value);
		}
		else
		{
			$('#depth_of_the_floor').attr("disabled", false); 
		}	
	}
  
  </script>

<?php 

     }
else{
        header('Location: ../login.php'); //redirect URL
    }
	
	
	
	function generateRandomString($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	
?>