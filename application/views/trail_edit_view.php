<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
if($results){

	foreach($results as $row){
		$trail_name = $row->trail_name;
		$area = $row->area;
		$trail_length = $row->trail_length;
		$elevation_gain = $row->elevation_gain;
		$shelter = $row->shelter;
		$trail_access = $row->trail_access;
		$trail_description = $row->trail_description;
		$id = $row->trail_id;

		//echo "$letter, $description, $id";
	}


}// if resutls
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Edit Trail</h1>
			<?php echo form_open_multipart("trails/edit/$id"); ?>

				<div class="form-group">
					<label for="trail_name">Trail Name</label>
					<input type="text" name="trail_name"  class="form-control form-width" value="<?php echo set_value('trail_name', $trail_name); ?>">
					<?php echo form_error('trail_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_length">Trail Length</label>
					<input type="text" name="trail_length"  class="form-control form-width" value="<?php echo set_value('trail_length', $trail_length); ?>">
					<?php echo form_error('trail_length'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="elevation_gain">Elevation Gain</label>
					<input type="text" name="elevation_gain"  class="form-control form-width" value="<?php echo set_value('elevation_gain', $elevation_gain); ?>">
					<?php echo form_error('elevation_gain'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="McBride" <?php if($area == 'McBride') echo "checked";?>> McBride
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="Dunster" <?php if($area == 'Dunster') echo "checked";?>> Dunster
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="Valemount" <?php if($area == 'Valemount') echo "checked";?>> Valemount
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="MtRobson" <?php if($area == 'MtRobson') echo "checked";?>> MtRobson
					</label>
				</div>

				<div class="form-group">
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="None" <?php if($shelter == 'None') echo "checked";?> >None
					</label>
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="Shelter"  <?php if($shelter == 'Shelter') echo "checked";?>> Shelter
					</label>
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="Hut"  <?php if($shelter == 'Hut') echo "checked";?>> Hut
					</label>
				</div>

				<div class="form-group">
					<label for="trail_description">Trail Description</label>
					<textarea name="trail_description"  class="form-control form-width"> <?php echo set_value('trail_description', $trail_description); ?></textarea>
					<?php echo form_error('trail_description'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_access">Trail Access</label>
					<textarea name="trail_access"  class="form-control form-width"><?php echo set_value('trail_access', $trail_access); ?></textarea>
					<?php echo form_error('trail_access'); ?>	
				</div> <!-- /form-goup -->


				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Edit Trail">
				</div> <!-- /form-goup -->

			</form>		
		</div>
	</div>
</div>