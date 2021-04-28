<?php include "templates/include/header.php" ?>

      <form action="userlogin.php" method="post" style="width: 50%;">
        <input type="hidden" name="userlogin" value="true" />

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="emailid">EmailID</label>
            <input type="text" name="emailid" id="emailid" placeholder="Your EmailID" required autofocus maxlength="50" />
          </li>

          <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your Password" required maxlength="20" />
          </li>

        </ul>

        <div class="buttons">
          <input type="submit" name="Login" value="loginUser" />
        </div>

      </form>

<?php include "templates/include/footer.php" ?>