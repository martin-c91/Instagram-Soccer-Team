<h3>Add/Edit Team</h3>

button
<input type="hidden" name="action" value="<?=$action?>" />

  <div class="row">

    <div class="span3"
         <label class="control-label" for="inputName">Team Name</label>
         <input type="text" id="inputName" value="<?=$form->team_name?>">
  </div>

  <div class="span3">
    <label class="control-label" for="inputColor1">Color1</label>
    <input type="text" id="inputColor" value="<?=$form->team_color1?>">

    <label class="control-label" for="inputColor2">Color2</label>
    <input type="text" id="inputColor2" value="<?=$form->team_color2?>">

    <div class="controls">
      <button type="submit" class="btn">Submit</button>
    </div>

  </div>

</div>


</form>

<h3>View All Teams</h3>

<section id="table">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Team Name</th>
        <th>Color1</th>
        <th>Color2</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($result as $row):?>
      <tr>
        <td><?=$row->team_id;?></td>
        <td><?=$row->team_name;?></td>
        <td><?=$row->team_color1;?></td>
        <td><?=$row->team_color2;?></td>
        <td><a href='#'>Edit</a></td>
      </tr>
      <?endforeach?>
    </tbody>
  </table>
</section>
