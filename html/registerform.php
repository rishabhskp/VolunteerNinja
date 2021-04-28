<div class="form-wrapper form-registration">
     <div class="control-group">
          <label for="name">Full Name </label>
	  <input type="text" id="name" name="name" title="Enter your Full Name" placeholder="Full Name" value="<?php echo $_POST['name']?>" autofocus onchange="jsname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
          <span class="error" id="err-name" style="color: #F26322; font-size:14px"><?php echo $err['name']; ?></span>
     </div>
     <div class="control-group">
          <label for="email">Email </label>
	  <input id="email" type="email" name="email" title="Enter your email address" placeholder="Email Address" value="<?php echo $_POST['email']?>" onchange="jsemail()" required/>
	  <span class="error" id="err-email" style="color: #F26322; font-size:14px"><?php echo $err['email']; ?></span>
     </div>
     <div class="control-group">
          <label for="password">Password </label>
	  <input id="password" type="password" name="password" title="Minimum 5 char long" placeholder="Password" value="<?php echo $_POST['password']?>" onchange="jspassword()" maxlength="20" pattern="^.{5,20}$" required />
	  <span class="error" id="err-password" style="color: #F26322; font-size:14px"><?php echo $err['password']; ?></span>
    </div>
    <div class="control-group">
           <label for="confirm_password">Confirm Password </label>
           <input name="confirm_password" id="confirm_password" type="password" value="<?php echo $_POST['confirm_password']?>" maxlength="20" pattern="^.{5,20}$" required/>
          <span class="error" id="err-password" style="color: #F26322; font-size:14px"><?php echo $err['confirm_password']; ?></span>
     </div>
     <div class="control-group">
        <label for="mobile">Mobile </label>
        <input id="mobile" type="tel" name="mobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Mobile Number" value="<?php echo $_POST['mobile']?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
			<span class="error" id="err-mobile" style="color: #F26322; font-size:14px"><?php echo $err['mobile']; ?></span>

     <div>
</div>
