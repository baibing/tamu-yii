<html>
<body>
	<p align=center><h2>Howdy! A new group visit registration</h2><p>
	<br>
	<table>
		<tr>
			<th width=10% align=left><h3>Field</h3></th><th width=20% align=left><h3>Content<h3></th>
		</tr>
		<tr>
			<td>Visit Date</td>
			<td><?php echo date('m/d/Y', strtotime($schedule->date)); ?></td>
		</tr>
		<tr>
			<td>Group Name</td>
			<td><?php echo $schedule->name; ?></td>
		</tr>
		<tr>
			<td>Group Type</td>
			<td><?php
				if (!$schedule -> type_name == "") {
						echo $schedule -> type_name;
				} else {
					echo  GroupReservation::model() -> getType($schedule -> type_id);
				}
                ?></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><?php echo $schedule->first_name; ?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?php echo $schedule->last_name; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $schedule->email; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $schedule->phone; ?></td>
		</tr>
		<tr>
			<td>Street</td>
			<td><?php echo $schedule->address; ?></td>
		</tr>
		<tr>
			<td>City, State</td>
			<td><?php echo $schedule->city . ", " . $schedule->state; ?></td>
		</tr>
		<tr>
			<td>Zip Code</td>
			<td><?php echo $schedule->zipcode; ?></td>
		</tr>
		<tr>
			<td>Number of Students</td>
			<td><?php echo $schedule->visitors_num; ?></td>
		</tr>
		<tr>
			<td>Number of Adults</td>
			<td><?php echo $schedule->audits_num; ?></td>
		</tr>
		<tr>
			<td>Size of Party</td>
			<td><?php echo $schedule->total_num; ?></td>
		</tr>
		<tr>
			<td>Bus Parking</td>
			<td><?php echo ($schedule->bus_parking)? 'Yes':'No'; ?></td>
		</tr>
		<?php if ($schedule->bus_parking): ?>
		<tr>
			<td>Bus Name</td>
			<td><?php echo $schedule->bus_name; ?></td>
		</tr>
		<?php endif; ?>
	</table>
</body>
</html>
