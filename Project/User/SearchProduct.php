<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LuckysMart::Search Product</title>
<link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
		
        <div class="container-fluid">
		<a href="MyCart.php" style="padding-left:95%">Cart</a>
            <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check" id="txt_name">
                                </label>
                            </div>
            </div>
            <div class="row">
				
                <div class="col-lg">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
					<?php
	
						$sel="select * from tbl_product";
						$datas=$conn->query($sel);
						
						while($rows=$datas->fetch_assoc())
						{

						  ?>
  
						  <div class="col-md-3 mb-2">
							  <div class="card-deck">
								  <div class="card border-secondary">
									  <img src="../Assets/Files/Product/<?php echo $rows['product_image'] ?>" class="card-img-top" height="250">
									  <div class="card-img-secondary">
										  <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rows['product_name'] ?></h6>
									  </div>
                                      <?php
										
											
										$average_rating = 0;
										$total_review = 0;
										$five_star_review = 0;
										$four_star_review = 0;
										$three_star_review = 0;
										$two_star_review = 0;
										$one_star_review = 0;
										$total_review_rating = 0;
										$review_content = array();
									
										$query = "SELECT * FROM tbl_productrating where product_id = '".$rows["product_id"]."' ORDER BY prating_id  DESC";
									
										$result = $conn->query($query);
									
										while($row = $result->fetch_assoc())
										{
											
									
											if($row["user_rating"] == '5')
											{
												$five_star_review++;
											}
									
											if($row["user_rating"] == '4')
											{
												$four_star_review++;
											}
									
											if($row["user_rating"] == '3')
											{
												$three_star_review++;
											}
									
											if($row["user_rating"] == '2')
											{
												$two_star_review++;
											}
									
											if($row["user_rating"] == '1')
											{
												$one_star_review++;
											}
									
											$total_review++;
									
											$total_review_rating = $total_review_rating + $row["user_rating"];
									
										}
										
										
										if($total_review==0 || $total_review_rating==0 )
										{
											$average_rating = 0 ; 			
										}
										else
										{
											$average_rating = $total_review_rating / $total_review;
										}
										
										?>
										<p align="center" style="color:#F96;font-size:20px">
									   <?php
									   if($average_rating==5 || $average_rating==4.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
										   <?php
									   }
									   if($average_rating==4 || $average_rating==3.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==3 || $average_rating==2.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==2 || $average_rating==1.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==1)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==0)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   echo "(".$total_review.")";
									   ?>
									
									  <div class="card-body">
										  <h4 class="card-title text-danger">
											  Price : <?php echo $rows['product_rate'] ?>/-
										  </h4>
										  <p>
											 Details  &nbsp;&nbsp;&nbsp;&nbsp;   : <?php echo $rows['product_detail'] ?><br>
											 
											  
											
										  </p>
										  <?php
											  $stockSql = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" .$rows["product_id"] . "'";
											 $rsST = $conn->query($stockSql);
											  $rsstp=$rsST->fetch_assoc();
											  if ($rsstp["stock"] != "") {
												  $stock = $rsstp["stock"];
												  if ($stock > 0) {
										  ?>
										  <a href="javascript:void(0)" onclick="addCart('<?php echo $rows["product_id"] ?>')" class="btn btn-success btn-block">Add to Cart</a>
										  <?php
										  } else if (stock == 0) {
										  ?>
										  <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
										  <?php
											  }
										  } else {
										 ?>
										  <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
										  <?php
																					  }
										 ?>
										  
									  </div>
								  </div>
							  </div>
						  </div>
						  <?php
							  }
						  ?>
                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
        <script>



            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
					var name = document.getElementById('txt_name').value;
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&name=" + name ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>
<?php
include("Foot.php");
ob_flush();
?>
</html>