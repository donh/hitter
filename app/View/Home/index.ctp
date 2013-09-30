<?php
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>
<center><h2>Quick Hitter</h2></center>
<center><a href="/phpinfo.php">phpinfo</a></center>


	<div class="pure-u-1-3">
	</div>
	<div class="pure-u-1-3">
	<form class="pure-form pure-form-stacked">
		<fieldset>
			<legend>Add My Business Card</legend>

			<label for="name">Name</label>
			<input id="name" type="email" placeholder="Name">

			<label for="position">Position</label>
			<input id="position" type="email" placeholder="Position">

			<label for="company">Company</label>
			<input id="company" type="email" placeholder="Company">

			<label for="email">Email</label>
			<input id="email" type="email" placeholder="Email">

			<label for="mobile">Mobile</label>
			<input id="mobile" type="email" placeholder="Mobile">

			<label for="phone">Phone</label>
			<input id="phone" type="email" placeholder="Phone">

			<label for="password">Password</label>
			<input id="password" type="password" placeholder="Password">

			<label for="sex">Sex</label>
			<select id="sex">
				<option>M</option>
				<option>F</option>
			</select>

			<button type="submit" class="pure-button pure-button-primary">Submit</button>
		</fieldset>
	</form>

	</div>
	<div class="pure-u-1-3">
	</div>
