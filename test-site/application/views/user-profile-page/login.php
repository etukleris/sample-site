    <main class="login-page">  
      <div class="login-container">
      <?php echo validation_errors(); ?>

      <?php echo form_open('user-profile-page/login'); ?>

          <label for="mailuid">Username or email</label>
          <input type="input" name="mailuid" placeholder="Username or email"/><br />
          <label for="pwd">Password</label>
          <input type="password" name="pwd" placeholder="Username"/><br />

          <input type="submit" name="submit" value="Login" />

      </form>
      <p>Don't have an account? You can sign up <a href="signup">here</a></p>
      </div>
    </main>