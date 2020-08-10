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


              <?php
 //echo "<pre>"; print_r($results) ; echo "</pre>";
				?>


								 <?php

								 foreach($results as $cs){
							 //  var_dump($viewstudent);
											foreach ($cs->children as $child) { ?>

												<?= form_open('/',array('class'=>'form-horizontal')) ?>

												          <p><?=$child->id?>.<?=$child->question?></p>


												            <?php if ($child->correct!=$cs->answer) { ?>

												                 <p><span style="background-color: #FF9C9E"><?=$cs->answer?></span></p>
												                 <p><span style="background-color: #ADFFB4"><?=$child->correct?></span></p>

												            <?php } else { ?>
												           <p><span style="background-color: #ADFFB4"><?=$cs->answer?></span></p>

												                 <?php $score = $score + 10; ?>

												          <?php } }
																																				}?>

												          <br><br>

												          <h2>Your Score: </h2>
												                <h1><?=$score?></h1>

												          <button type="submit" class="btn btn-primary btn-user btn-block" name="btn_add_course">
												  <i class="fa fa-save"></i> Try Again!!
												                            </button>
												          <?= form_close() ?>

<?php

						?>

        </div>
      </div>

    </div>

    </div>
