    <main class="signup-page">

      <div class="signup-container">



      <?php echo validation_errors(); ?>

      <?php echo form_open('user-profile-page/signup'); ?>
          <ul>
            <li>
            <label for="uid" class="signup-label">Username</label>
            <input type="input" name="uid" placeholder="Username"/><br />
            </li>
            <li>
            <label for="email" class="signup-label">E-mail</label>
            <input type="input" name="email" placeholder="E-mail"/><br />
            </li>
            <li>
            <label for="pwd" class="signup-label">Password</label>
            <input type="password" name="pwd" placeholder="Username"/><br />
            </li>
            <li>
            <label for="pwd-repeat" class="signup-label">Repeat password</label>
            <input type="password" name="pwd-repeat" placeholder="Repeat password"/><br />
            </li>
            <li>
            <input type="submit" name="submit" value="Signup" />
            </li>
		  </ul>

      </form> 
      </div>
    </main>