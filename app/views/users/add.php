<?php 
    echo (empty($msg)?false:$msg);
?>

<form method="post" action="<?php echo _WEB_ROOT; ?>/home/post_user">
    <div>
        <input type="text" name="fullname" placeholder="Ho ten..." 
        value="<?php echo (empty($old['fullname'])?false:$old['fullname']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['fullname'])?false:$errors['fullname']); ?>
        </span>
    </div>
    <div>
        <input type="text" name="age" placeholder="Tuoi" 
        value="<?php echo (empty($old['age'])?false:$old['age']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['age'])?false:$errors['age']); ?>
        </span>
    </div>
    <div>
        <input type="text" name="email" placeholder="Email"
        value="<?php echo (empty($old['email'])?false:$old['email']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['email'])?false:$errors['email']); ?>
        </span>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password"
        value="<?php echo (empty($old['password'])?false:$old['password']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['password'])?false:$errors['password']); ?>
        </span>
    </div>
    <div>
        <input type="password" name="confirm_password" placeholder="Confirm Password"
        value="<?php echo (empty($old['confirm_password'])?false:$old['confirm_password']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['confirm_password'])?false:$errors['confirm_password']); ?>
        </span>
    </div> 
    <button type="submit">Submit</button>
</form>