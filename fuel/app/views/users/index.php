<pre><?php // var_dump($results) ?></pre>
<div class="col-sm-10"></div>
  <table class="table table-striped">
    <tr>
      <th class="col-sm-1">id</th>
      <th class="col-sm-4">name</th>
      <th class="col-sm-4">email</th>
      <th class="col-sm-1"></th>
      <th class="col-sm-1"></th>
    </tr>
    <?php if(isset($results)){ ?>
      <?php foreach ($results as $user) {?>
        <tr>
          <td><?php echo $user->id ?></td>
          <td><?php echo $user->name ?></td>
          <td><?php echo $user->email ?></td>
          <td><button type="button" class="btn btn-success">edit</button></td>
          <td>
            <?= \Form::open(array('action' => 'users/delete'))?>
            <?php // echo \Form::hidden('id', $value['id']) ?>
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
    <label for="form_name">name</label>
    <?= \Form::input('name', '' , array('id' => 'form_name', 'class' => 'form-control', 'placeholder'=>'name'))?>
  </div>

  <div class="form-gruop">
    <label for="form_email">email</label>
    <?= \Form::input('email', '', array('id' => 'form_email', 'class' => 'form-control', 'placeholder'=>'email'))?></div>
  <?= \Form::submit('', 'update', array('class' => 'btn btn-info'));?>

    <?= \Form::close()?>
</div>

