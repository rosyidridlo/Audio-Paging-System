<h2>Login User</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Main/login'); ?>

    <label for="username">Username</label>
    <input type="input" name="username" /><br />

    <label for="password">Password</label>
    <input type="password" name="password"><br />

    <input type="submit" name="submit" value="Login" />

</form>