    <main class="signup-page">
]
      <div class="signup-container">



      <?php echo validation_errors(); ?>

      <?php echo form_open('user-profile-page/signup'); ?>

          <label for="uid">Username</label>
          <input type="input" name="uid" placeholder="Username"/><br />
          <label for="email">E-mail</label>
          <input type="input" name="email" placeholder="E-mail"/><br />
          <label for="pwd">Password</label>
          <input type="password" name="pwd" placeholder="Username"/><br />
          <label for="pwd-repeat">Repeat password</label>
          <input type="password" name="pwd-repeat" placeholder="Repeat password"/><br />

          <input type="submit" name="submit" value="Signup" />

      </form> 
      </div>
    </main>