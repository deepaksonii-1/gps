<?php include "header.php"; ?>

   <div class="row" id="section">
         
        <?php include "left_menu.php"; ?>

         <div class="col-sm-10">
              
              <br />
         	  <div class="well well-sm">
         	  	Dashboard > Home
         	  </div>

         	  <div class="panel">

                 

                    <div class="panel-body">

                        <h3>Add New Mechanics</h3>
                        <?php 
                           
                          if(isset($_POST['add_mechanic']))
                          {
                              $data = array('name'=>$_POST['nm'],
                                           'email'=>$_POST['em'],
                                           'contact'=>$_POST['cn'],
                                           'aadhar'=>$_POST['adhar'],
                                           'address'=>$_POST['address'],
                                           'experties'=>$_POST['expert'],
                                           'exp'=>$_POST['exp'],
                                           'lognitude'=>$_POST['logni'],
                                           'latitude'=>$_POST['lati']);
                              
                              $k = array_keys($data);
                              $key =implode(",",$k);
                              
                               $v = array_values($data);
                              $value =implode("','",$v);
                              
                              $qry ="insert into mechanics($key) values('$value')";
                              
                             
                              $ex = mysqli_query($con,$qry);
                              
                              
                              
                              
                             if($ex>0)
                             {
                                 echo "Add Mechanics Successful";
                             }
                          }
                        
                        ?>
                        
                    	<form action="" method="post">
                    	    
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Name</label>
                    	        <input type="text" name="nm" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Email</label>
                    	        <input type="email" name="em" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Contact</label>
                    	        <input type="tel" name="cn" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Adhar No</label>
                    	        <input type="text" name="adhar" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Address</label>
                    	        <input type="text" name="address" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Experties</label>
                    	        <input type="text" name="expert" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Experience</label>
                    	        <input type="number" name="exp" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Lognitude</label>
                    	        <input type="text" name="logni" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-4">
                    	        <label for="">Latitude</label>
                    	        <input type="text" name="lati" id="" class="form-control">
                    	    </div>
                    	    <div class="form-group col-sm-12">
                    	       
                    	        <input type="submit" name="add_mechanic" id="" class="btn btn-success">
                    	    </div>
                    	    
                    	</form>

                    </div>


         	  </div><!-- End of Panel -->



         </div>
  
   </div><!-- End of Section -->


<?php include "footer.php"; ?>