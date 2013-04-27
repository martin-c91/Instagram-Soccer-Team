<h3>Add/Edit Player</h3>

<?php echo form_open(''); ?>

<input type="hidden" name="player_id" value="<?=set_value('player_id', $team->player_id)?>">
<input type="hidden" name="team_id" value="<?=set_value('team_id', $team->team_id)?>">

<div class="row">

  <div class="span3"
         <label class="control-label" for="inputName">Player Name</label>
         <input type="text" name="player_name" value="<?=set_value('player_name', $team->player_name)?>">

         <label class="control-label" for="inputSchool">Instagram ID</label>
         <input type="text" name="player_instagram" value="<?=set_value('player_instagram', $team->player_instagram)?>">

    <div class="controls">
      <button type="submit" class="btn">Submit</button>
    </div>

  </div>

</div>
</form>

</form>
