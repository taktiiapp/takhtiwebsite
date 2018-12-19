<div class="container">
	<div class="row">
	 <div class="col-md-3"></div>
        <div class="col-md-6">
    		<div class="form-group">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Search by Teacher Name" class="form-control" style="border:groove;">
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                </div>
            </div>
            
	</div>
	<div class="col-md-3"></div>
</div>
</div>
<div class="container-fluid">
	<div class="row">
          <?php
		  $cont=0;
            foreach ($teacher_list as $pvalue) { ?>

		<div class="col-lg-4 col-sm-8">
           <div class="container" style="width: 450px; max-width:450px; height:400px ; max-height:400px; margin: 0 auto;  display: inline-block;">
            <div class="card hovercard">
                <div class="cardheader">
                </div>
                <div class="avatar">
                    <img alt="" src="<?php echo $pvalue['profile_img'];?>">
                </div>

                <div class="info">
                    <div class="title">
                        <a target="_blank" href=""><?php echo $pvalue['name'];?></a>
                    </div>
                   <div class="desc"><img alt="" src="<?= base_url()?>assest/img/address.png" style="height:25px;width:25px;margin-bottom:8px;margin-left:10px;">&nbsp <?php echo $pvalue['per_address'];?></div>
					<div class="desc"><img alt="" src="<?= base_url()?>assest/img/class.png" style="height:25px;width:25px;margin-bottom:8px;margin-left:10px;">&nbsp <?php echo $pvalue['class_name'];?></div>
                    <div class="desc"><img alt="" src="<?= base_url()?>assest/img/subject.png" style="height:25px;width:25px;margin-bottom:8px;margin-left:10px;">&nbsp <a href="#" data-toggle="tooltip" data-placement="right" title="<?php str_replace(",",", ",$pvalue['subject_name']) ?> "><?php substr_count( str_replace(",",", ",$pvalue['subject_name']),', ')+1 ?>Subject..</a>.</div>
                    <div class="desc"><img alt="" src="<?= base_url()?>assest/img/expi.png" style="height:25px;width:25px;margin-bottom:8px;margin-left:10px;">&nbsp <?php echo $pvalue['total_experience'];?>.</div>
                </div>

                <div class="bottom">
                    <a href="<?= base_url()?>home_controller/teacher_detail/<?php echo $pvalue["id"]?>"><button type="button" class="btn btn-danger">View Teacher Profile</button></a>
                </div>
            </div>
        </div>
          
		</div>

        <?php
if($cont=='3'){
	echo '<div style="clear:both,width:100%"></div>';
	$cont=0;
 }else{
	 $cont++;
 }

		}?>
        
		   

        </div>

	</div>
<br>
	