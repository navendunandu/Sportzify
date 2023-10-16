<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
?>
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">  dashboard </h2>
            </div>
            <div class="row">
              <img src="stadium.jpg"height="100%" width="100%"/>
            
            </div>
            <?php
include('foot.php');
ob_flush();
?>