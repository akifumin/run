<div class="row"><h4>User List</h4></div>
<?php echo \Form::open(array('action' => 'users', 'role' => 'form', 'class' => 'form-inline well well-sm clearfix'))?>
<div class="form-group">
  <?php echo \Form::input('user_name', '', array('id' => 'user_id', 'class' => 'form-control', 'placeholder' => 'UserName'))?>
</div>
<?php echo \Form::submit('search', 'search', array('class' => 'btn btn-info'));?>
<?php echo \Form::close()?>

<div>
  <a href="<?php echo Uri::create('/users/new') ;?>" class="btn btn-success">new</a>
</div>

<div class="row">
  <div class="col-sm-10"><?php echo $all_count ?>:items</div>
</div>

<table class="table table-striped">
  <tr>
    <th class="col-sm-1">user_id</th>
    <th class="col-sm-4">user_name</th>
    <th class="col-sm-4">password</th>
    <th class="col-sm-1"></th>
    <th class="col-sm-1"></th>
  </tr>
  <?php if(isset($results)){ ?>
    <?php foreach ($results as $user) {?>
      <tr>
        <td><?php echo $user->user_id ?></td>
        <td><?php echo $user->user_name ?></td>
        <td><?php echo $user->password ?></td>
        <td>
          <a href="<?php echo Uri::create('/users/edit') ;?>" class="btn btn-success">edit</a>
<!--            
          <?= \Form::open(array('action' => 'users/edit'))?>
          <?php echo \Form::hidden('user_id', $user['user_id']) ?>
          <?= \Form::submit('', 'edit', array('class' => 'btn btn-success'))?>
          <?= \Form::close()?>
-->
        </td>
        <td>
          <?= \Form::open(array('action' => 'users/delete'))?>
          <?php echo \Form::hidden('user_id', $user['user_id']) ?>
          <?= \Form::submit('', 'delete', array('class' => 'btn btn-danger'))?>
          <?= \Form::close()?>

        </td>
      </tr>
    <?php }?>
  <?php } else { ?>
      <tr>
        <td colspan=5>none</td>
      </tr>
  <?php }?>
</table>
</div>


