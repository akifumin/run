

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
        <td><button type="button" class="btn btn-success">edit</button></td>
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


<div class="col-sm-3">
  <?= \Form::open(array('action' => 'users/update', 'role' => 'from'))?>
  <div class="form-group">
    <label for="form_name">UserID</label>
    <?= \Form::input('user_id', '' , array('id' => 'form_name', 'class' => 'form-control', 'placeholder'=> 'UserID'))?>
  </div>

  <div class="form-group">
    <label for="form_name">UserName</label>
    <?= \Form::input('user_name', '' , array('id' => 'form_name', 'class' => 'form-control', 'placeholder'=> 'UserName'))?>
  </div>

  <div class="form-gruop">
    <label for="form_email">password</label>
    <?= \Form::input('password', '', array('id' => 'form_email', 'class' => 'form-control', 'placeholder'=>'password'))?></div>
  <?= \Form::submit('', 'update', array('class' => 'btn btn-info'));?>

    <?= \Form::close()?>
</div>


<?php if(isset($val)): ?>
  <pre>
    <?php var_dump($val)?>
  </pre>
<?php endif?>

