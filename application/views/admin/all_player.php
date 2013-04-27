<h3>Team: <?=$team->team_name?></h3>

<section id="table table-bordered table-striped">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
   <th>Player Name</th>
   <th>Instagram ID</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($player as $row):?>
      <tr>
        <td><?=$row->player_id?></td>
        <td><?=$row->player_name?></td>
   <td>
   <a href="http://instagram.com/<?=$row->player_instagram;?>"><?=$row->player_instagram;?></a>
   </td>
   <td><?=anchor("admin/player/edit/$row->player_id", 'Edit')?> |
   <a href="<?=site_url('admin/player/delete/'.$row->player_id)?>"
   onclick="return confirm('Are you sure?');">
   Delete
   </a></td>
      </tr>
      <?endforeach?>
    </tbody>
  </table>
</section>