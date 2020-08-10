<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Row -->
<div class="row">


		<div class="col-lg-12">

			<!-- Circle Buttons -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Answer all questions</h6>
				</div>
				<div class="card-body">
    <?= form_open('submit',array('class'=>'form-horizontal')) ?>
<pre><?php $count=1; // print_r($questions) ?></pre>

<?php
$i=1;
    foreach($questions as $row){?>
			<?php $ans_array = array($row->options1, $row->options2, $row->options3, $row->correct);
			shuffle($ans_array); ?>
      <p><?=$count++?>.<?=$row->question?></p>
			<input type="hidden" value=<?=$row->id?> name="id_quest<?= $i ?>">
  <input type="hidden" name="quest_id" value="<?=$row->id?>"/>
	<input type="radio" name="question<?=$i?>" value="<?=$ans_array[0]?>" required> A.<?=$ans_array[0]?><br>
	<input type="radio" name="question<?=$i?>" value="<?=$ans_array[1]?>"> B.<?=$ans_array[1]?><br>
	<input type="radio" name="question<?=$i?>" value="<?=$ans_array[2]?>"> C.<?=$ans_array[2]?><br>
	<input type="radio" name="question<?=$i?>" value="<?=$ans_array[3]?>"> D.<?=$ans_array[3]?><br>

            <br><br>
       <?php $i++;} ?>



			    <br><br>

					<button type="submit" class="btn btn-primary btn-user btn-block" name="btn_add_course">
	<i class="fa fa-save"></i> Submit!
														</button>
					<?= form_close() ?>
							<hr>

				</div>
			</div>

		</div>

</div>
