<h3>Add/Edit Team</h3>

<script type="text/javascript" src="<?=base_url('assets/jscolor/jscolor.js');?>"></script>

<?php echo form_open(''); ?>

<input type="hidden" name="team_id" value="<?=set_value('team_id', $values->team_id)?>">

<div class="row">

  <div class="span3"
         <label class="control-label" for="inputName">Team Name</label>
         <input type="text" name="team_name" value="<?=set_value('team_name', $values->team_name)?>">

    <label class="control-label" for="inputColor1">Color1</label>
    <input class="color" type="text" name="team_color1" value="<?=set_value('team_color1', $values->team_color1)?>">

    <label class="control-label" for="inputColor2">Color2</label>
    <input class="color" type="text" name="team_color2" value="<?=set_value('team_color2', $values->team_color2)?>">

    <div class="controls">
      <button type="submit" class="btn">Submit</button>
    </div>

  </div>

</div>
</form>

</form>
