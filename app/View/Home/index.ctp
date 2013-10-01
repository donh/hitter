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
		<?php
		/*
		echo $this->Form->create(
			'Card',
			array(
				'id' => 'CardsAddForm',
				'url' => '/cards/add',
				'type' => 'post'
			)
		);
		echo $this->Form->input('username');   //text
		echo $this->Form->end('Finish');
		*/
		
		?>
	<form class="pure-form pure-form-stacked" id="CardsAddForm2" method="post" action="/cards/add">
		<fieldset>
			<legend>Add My Business Card</legend>

			<label for="name">Name</label>
			<input id="name" type="" placeholder="Name" name="data[Card][name]">
			<!--
			<input name="data[Card][username]" type="text" id="CardUsername">
			-->

			<label for="position">Position</label>
			<input id="position" type="" placeholder="Position" name="data[Card][position]">

			<label for="company">Company</label>
			<input id="company" type="" placeholder="Company" name="data[Card][company]">

			<label for="email">Email</label>
			<input id="email" type="email" placeholder="Email" name="data[Card][email]">

			<label for="mobile">Mobile</label>
			<input id="mobile" type="" placeholder="Mobile" name="data[Card][mobile]">

			<label for="phone">Phone</label>
			<input id="phone" type="" placeholder="Phone" name="data[Card][phone]">

			<label for="password">Password</label>
			<input id="password" type="password" placeholder="Password" name="data[Card][password]">

			<label for="sex">Sex</label>
			<select id="sex" name="data[Card][sex]">
				<option>M</option>
				<option>F</option>
			</select>

			<button type="submit" class="pure-button pure-button-primary">Submit</button>
		</fieldset>
	</form>

		<?php
			//echo $this->Form->end();
		?>
	</div>
	<div class="pure-u-1-3">
	</div>
