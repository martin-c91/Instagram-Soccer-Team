<h3>View All Teams</h3>

<a class="btn btn-primary" href="<?=site_url('admin/team/edit/')?>">Add New Team</a>

<section id="table table-bordered table-striped">
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
        <td><div id="divpreview" style="float: left; height: 100%; width: 100px; background-color: #<?=$row->team_color1;?>;">&nbsp;</div></td>
        <td><div id="divpreview" style="float: left; height: 100%; width: 100px; background-color: #<?=$row->team_color2;?>;">&nbsp;</div></td>
        <td><?=anchor('admin/team/edit/'.$row->team_id, 'Edit')?> |
   <a href="<?=site_url('admin/team/delete/'.$row->team_id)?>"
   onclick="return confirm('Are you sure?');">
   Delete
   </a></td>
      </tr>
      <?endforeach?>
    </tbody>
  </table>
</section>