<?php
//fetch.php
include 'config/db_config.php'; @session_start(); 
$output = '';
if(isset($_POST["search"]))
{
 $search = mysqli_real_escape_string($con, $_POST["search"]);
 $query = "
  SELECT * FROM product 
  WHERE p_name LIKE '%".$search."%' ";
}
else
{
 $query = " SELECT * FROM product ORDER BY p_id ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a>
                  <img class="card-img-top" src="img/'.$row['p_image'].'" alt="product image">
                </a>
                <div class="card-body">

                  <h4 class="card-title">
                    <a href="#"" style="font-size: 18px">'.$row['p_name'].'</a> 
                    <span class="ml-4 uppercase badge badge-pill badge-success" 
                    style="font-size: 12px;text-transform: uppercase;">'.$row['p_category'].'</span>
                  </h4>
                  <p>
                    <span style="font-family:Arial">&#8377;</span> '.$row['p_price'].'
                  </p>
                  <p class="card-text more">
                    '.$row['p_description'].'
                  </p>

                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </small>
                  <button class="btn btn-primary btn-sm ml-4" data='.$row['p_id'].'>Add to Cart</button>
                </div>
              </div>
            </div>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>