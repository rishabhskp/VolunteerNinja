	<ul>
		<li>
			<input type="text" id="contactname" name="name" title="Enter your Full Name" placeholder="Contact Name" value="<?php echo $_POST['contactname']?>" autofocus onchange="jsname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
			<span class="error" id="err-name"><?php echo $err['name']; ?></span>
		</li>
		<li>
			<input id="email" type="contactemail" name="email" title="Enter your email address" placeholder="Contact Email Address" value="<?php echo $_POST['contactemail']?>" onchange="jsemail()" required/>
			<span class="error" id="err-email"><?php echo $err['email']; ?></span>
		</li>
		<li>
			<input id="mobile" type="contacttel" name="mobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Contact Mobile Number" value="<?php echo $_POST['contactmobile']?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
			<span class="error" id="err-mobile"><?php echo $err['mobile']; ?></span>
		</li>
		
	</ul>