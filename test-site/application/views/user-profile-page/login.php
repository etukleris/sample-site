    <main class="login-page">  
      <div class="login-container">
      <?php echo validation_errors(); ?>

      <?php echo form_open('user-profile-page/login'); ?>
          <ul>
            <li>
              <label for="mailuid" class="login-label">Username or email</label>
              <input type="input" name="mailuid" placeholder="Username or email"/><br />
            </li>
            <li>
          <label for="pwd" class="login-label">Password</label>
          <input type="password" name="pwd" placeholder="Password"/><br />
            </li>
            <li>
          <input type="submit" name="submit" value="Login" />
            </li>
          </ul>
      </form>
      <p>Don't have an account? You can sign up <a href="signup">here</a></p>
      </div>
    </main>