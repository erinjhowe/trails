<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>New Trail</h1>
			<?php echo form_open_multipart('trails/create'); ?>
			<form>
				<div class="form-group">
					<label for="trail_name">Trail Name</label>
					<input type="text" name="trail_name"  class="form-control form-width" value="<?php echo set_value('trail_name'); ?>">
					<?php echo form_error('trail_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_description">Trail Description</label>
					<textarea name="trail_description"  class="form-control form-width"><?php echo set_value('trail_description'); ?></textarea>
					<?php echo form_error('trail_description'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_length">Trail Length</label>
					<input type="text" name="trail_length"  class="form-control form-width" value="<?php echo set_value('trail_length'); ?>">
					<?php echo form_error('trail_length'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="elevation_gain">Elevation Gain</label>
					<input type="text" name="elevation_gain"  class="form-control form-width" value="<?php echo set_value('elevation_gain'); ?>">
					<?php echo form_error('elevation_gain'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_access">Trail Access</label>
					<textarea name="trail_access"  class="form-control form-width"><?php echo set_value('trail_access'); ?></textarea>
					<?php echo form_error('trail_access'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="McBride"> McBride
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="Dunster"> Dunster
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="Valemount"> Valemount
					</label>
					<label class="radio-inline">
					  <input type="radio" id="area" name="area" value="MtRobson"> MtRobson
					</label>
				</div>

				<div class="form-group">
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="McBride">None
					</label>
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="Dunster"> Shelter
					</label>
					<label class="radio-inline">
					  <input type="radio" id="shelter" name="shelter" value="Valemount"> Hut
					</label>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit Trail">
				</div> <!-- /form-goup -->

			</form>		
		</div>
	</div>
</div>