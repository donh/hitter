<?php
//debug($card);//exit;
/*
array(
	'Card' => array(
		'id' => '2',
		'name' => 'Don',
		'gender' => 'M',
		'position' => 'Developer',
		'company' => 'Quick Hitter',
		'email' => 'don@hitter.com',
		'mobile' => '0912345678',
		'phone' => '27734568'
	)
)
*/

if (isset($card)) {
	debug($card);
?>

<cneter>
<table class="pure-table pure-table-horizontal">
	<thead>
		<tr>
			<th>Card ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Type</th>
			<th>Position</th>
			<th>Company</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Phone</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<?php
			foreach ($card as $key => $value) {
				echo '<td>'.$value.'</td>'."\n";
			}
			?>
		</tr>
	</tbody>
</table>
</cneter>

<?php
} elseif (isset($cards)) {
	foreach ($cards as $key => $card) {
	?>

<cneter>
<table class="pure-table pure-table-horizontal">
	<thead>
		<tr>
			<th>Card ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Type</th>
			<th>Position</th>
			<th>Company</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Phone</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<?php
			foreach ($card as $key => $value) {
				echo '<td>'.$value.'</td>'."\n";
			}
			?>
		</tr>
	</tbody>
</table>
</cneter>

	<?php
	}
}

?>