<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Row -->
<div class="row">


		<div class="col-lg-12">

			<!-- Circle Buttons -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Results</h6>
				</div>
				<div class="card-body">
  <?php $score =0; ?>
          <?php  $count=1; ?>

            <?php $array1= array(); ?>
            <?php $array2= array(); ?>
            <?php $array3= array(); ?>
            <?php $array4= array(); ?>
            <?php $array5= array(); ?>
            <?php $array6= array(); ?>
            <?php $array7= array(); ?>
            <?php $array8= array(); ?>

               <?php foreach($checks as $checkans) { ?>
                     <?php array_push($array1, $checkans); } ?>


              <?php
 echo "<pre>"; print_r($results) ; echo "</pre>";
							foreach($results as $res) { ?>
                     <?php array_push($array2, $res->correct);
                     array_push($array3, $res->id);
                     array_push($array4, $res->question);
                     array_push($array5, $res->options1);
                     array_push($array6, $res->options2);
                     array_push($array7, $res->options3);
                 array_push($array8, $res->correct);
               } ?>


                 <?php
                 for ($x=0; $x <5; $x++) { ?>


<?= form_open('/',array('class'=>'form-horizontal')) ?>

          <p><?=$array3[$x]?>.<?=$array4[$x]?></p>


            <?php if ($array2[$x]!=$array1[$x]) { ?>

                 <p><span style="background-color: #FF9C9E"><?=$array1[$x]?></span></p>
                 <p><span style="background-color: #ADFFB4"><?=$array2[$x]?></span></p>

            <?php } else { ?>
           <p><span style="background-color: #ADFFB4"><?=$array1[$x]?></span></p>

                 <?php $score =+ 1; ?>

          <?php } } ?>

          <br><br>

          <h2>Your Score: </h2>
                <h1><?=$score?>/5</h1>

          <button type="submit" class="btn btn-primary btn-user btn-block" name="btn_add_course">
  <i class="fa fa-save"></i> Try Again!!
                            </button>
          <?= form_close() ?>




        </div>
      </div>

    </div>

    </div>
