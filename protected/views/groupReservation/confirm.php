<?php 
/* @var $this GroupReservationController */
/* @var $model GroupReservation */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'js/group_registration.js');
?>
<!-- protected/views/groupReservation/confirm.phtml --> 
<h2>Review your planned visit to Texas A&amp;M</h2>

<form id="visitDateAndTime" class="registrationForm" method="post">

<div class="itinerary">

    <div class="events">
        <h3>Campus visit details</h3>
        <dl>
            <dt>Date</dt>
            <dd><?php echo isset($model -> date) ? (date('l, F j, Y', strtotime($model -> date))) : ""; ?></dd>

            <?php  
            $schedules = $model->getSchedule($model->schedule_id);
			foreach ($schedules as $schedule) {
				if ($schedule['option_id'] == "" && $schedule['optional'] == 0) {
					echo '<dt>'.strftime("%R %p", strtotime($schedule['start_time']))." - ".strftime("%R %p", strtotime($schedule['end_time']))."</dt>\n";
					echo "<dd>".$schedule['event_name']."</dd>\n";
				} elseif ($schedule['option_id'] != "" && $schedule['option_id'] == $model->event_option_id) {
					echo '<dt>'.strftime("%R %p", strtotime($schedule['start_time']))." - ".strftime("%R %p", strtotime($schedule['end_time']))."</dt>\n";
					echo "<dd>".$schedule['event_name']."</dd>\n";
					echo "<dd>".$schedule['option_name']."</dd>\n";
				} elseif ($schedule['optional'] == 1 && $schedule['event_schedule_id'] == $model->schedule_option_id) {
					echo '<dt>'.strftime("%R %p", strtotime($schedule['start_time']))." - ".strftime("%R %p", strtotime($schedule['end_time']))."</dt>\n";
					echo "<dd>".$schedule['event_name']."</dd>\n";
				}
			}
            ?>

        </dl>

        <div class="clear"></div>
    </div>

    <div class="visitDateInfo events">
        <h3>Group details</h3>

        <dl>
            <dt>Group Name</dt>
            <dd><?php echo(isset($model -> name) ? ($model -> name) : ""); ?></dd>

            <dt>Group Type</dt>
            <dd><?php
				if (isset($model -> type_name)) {
						echo $model -> type_name;
				} else {
					echo $model -> getType($model -> type_id);
				}
                 ?></dd>

            <dt>Number of students</dt>
            <dd><?php echo isset($model -> visitors_num) ? ($model -> visitors_num) : ""; ?></dd>

            <dt>Number of adults</dt>
            <dd><?php echo isset($model -> audits_num) ? ($model -> audits_num) : ""; ?></dd>

            <dt>Size of Party</dt>
            <dd><?php echo isset($model -> total_num) ? ($model -> total_num) : ""; ?></dd>

            <dt>Lunch Payment</dt>
            <dd><?php echo ($model -> lunch_payment); ?></dd>

            <dt>Bus Parking</dt>
            <dd><?php echo isset($model -> bus_parking) ? (($model -> bus_parking) ? "Yes" : "No") : ""; ?></dd>

            <?php if(isset($model -> bus_parking)): ?>
            <?php if($model -> bus_parking): ?>
            <dt>Bus Name</dt>
            <dd><?php echo ($model -> bus_name); ?></dd>
            <?php endif; ?>
            <?php endif; ?>
        </dl>
        <div class="clear"></div>
    </div>

    <div class="demographics events">
        <h3>Contact information</h3>

        <dl>
            <dt>Name</dt>
            <dd><?php echo isset($model -> first_name) ? $model -> first_name . " " . $model -> last_name : ""; ?></dd>

            <dt>Email</dt>
            <dd><?php echo isset($model -> email) ? ($model -> email) : ""; ?></dd>

            <dt>Phone</dt>
            <dd><?php echo isset($model -> phone) ? ($model -> phone) : ""; ?></dd>

            <dt>Address</dt>
            <dd><?php echo isset($model -> address) ? ($model -> address) : ""; ?></dd>

            <dt>City</dt>
            <dd><?php echo isset($model -> city) ? ($model -> city) : ""; ?></dd>

            <dt>State and Zip</dt>
            <dd><?php echo (isset($model -> state) && isset($model -> zipcode))? ($model -> state." ".$model -> zipcode ) : ""; ?></dd>
        </dl>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
</div>

    <fieldset class="submitRow">
        <span id="cancelOption">
            <a id="formBackwardButton" href="index.php?r=groupReservation/create">Edit Your Info</a> or
        </span>
        <input type="submit" value="Submit" id="formForwardButton"/>
    </fieldset>

</form>

<?php if(isset($model -> name)): ?>
<form id="formBackward" class="registrationForm" method="post" style="display:none;" action="index.php?r=groupReservation/create" >
        <input type="text" name="GroupReservation[schedule_id]" value="<?php echo $model -> schedule_id; ?>" />
        <input type="text" name="GroupReservation[schedule_option_id]" value="<?php echo $model -> schedule_option_id; ?>" />
        <input type="text" name="GroupReservation[event_option_id]" value="<?php echo $model -> event_option_id; ?>" />
        <input type="text" name="GroupReservation[date]" value="<?php echo $model -> date; ?>" />
        <input type="text" name="GroupReservation[name]" value="<?php echo $model -> name; ?>" />
        <input type="text" name="GroupReservation[type_id]" value="<?php echo $model -> type_id; ?>" />
        <input type="text" name="GroupReservation[type_name]" value="<?php echo $model -> type_name; ?>" />
        <input type="text" name="GroupReservation[visitors_num]" value="<?php echo $model -> visitors_num; ?>" />
        <input type="text" name="GroupReservation[audits_num]" value="<?php echo $model -> audits_num; ?>" />
        <input type="text" name="GroupReservation[total_num]" value="<?php echo $model -> total_num; ?>" />        
        <input type="text" name="GroupReservation[lunch_payment]" value="<?php echo $model -> lunch_payment; ?>" />
        <input type="text" name="GroupReservation[bus_parking]" value="<?php echo $model -> bus_parking; ?>" />
        <input type="text" name="GroupReservation[bus_name]" value="<?php echo $model -> bus_name; ?>" />
        <input type="text" name="GroupReservation[first_name]" value="<?php echo $model -> first_name; ?>" />
        <input type="text" name="GroupReservation[last_name]" value="<?php echo $model -> last_name; ?>" />
        <input type="text" name="GroupReservation[email]" value="<?php echo $model -> email; ?>" />
        <input type="text" name="GroupReservation[email2]" value="<?php echo $model -> email2; ?>" />
        <input type="text" name="GroupReservation[phone]" value="<?php echo $model -> phone; ?>" />
        <input type="text" name="GroupReservation[address]" value="<?php echo $model -> address; ?>" />
        <input type="text" name="GroupReservation[city]" value="<?php echo $model -> city; ?>" />
        <input type="text" name="GroupReservation[state]" value="<?php echo $model -> state; ?>" />
        <input type="text" name="GroupReservation[zipcode]" value="<?php echo $model -> zipcode; ?>" />
</form>
<form id="formForward" class="registrationForm" method="post" style="display:none;" action="index.php?r=groupReservation/thankyou">
        <input type="text" name="GroupReservation[schedule_id]" value="<?php echo $model -> schedule_id; ?>" />
        <input type="text" name="GroupReservation[schedule_option_id]" value="<?php echo $model -> schedule_option_id; ?>" />
        <input type="text" name="GroupReservation[event_option_id]" value="<?php echo $model -> event_option_id; ?>" />
        <input type="text" name="GroupReservation[date]" value="<?php echo $model -> date; ?>" />
        <input type="text" name="GroupReservation[name]" value="<?php echo $model -> name; ?>" />
        <input type="text" name="GroupReservation[type_id]" value="<?php echo $model -> type_id; ?>" />
        <input type="text" name="GroupReservation[type_name]" value="<?php echo $model -> type_name; ?>" />
        <input type="text" name="GroupReservation[visitors_num]" value="<?php echo $model -> visitors_num; ?>" />
        <input type="text" name="GroupReservation[audits_num]" value="<?php echo $model -> audits_num; ?>" />
        <input type="text" name="GroupReservation[total_num]" value="<?php echo $model -> total_num; ?>" />        
        <input type="text" name="GroupReservation[lunch_payment]" value="<?php echo $model -> lunch_payment; ?>" />
        <input type="text" name="GroupReservation[bus_parking]" value="<?php echo $model -> bus_parking; ?>" />
        <input type="text" name="GroupReservation[bus_name]" value="<?php echo $model -> bus_name; ?>" />
        <input type="text" name="GroupReservation[first_name]" value="<?php echo $model -> first_name; ?>" />
        <input type="text" name="GroupReservation[last_name]" value="<?php echo $model -> last_name; ?>" />
        <input type="text" name="GroupReservation[email]" value="<?php echo $model -> email; ?>" />
        <input type="text" name="GroupReservation[email2]" value="<?php echo $model -> email2; ?>" />
        <input type="text" name="GroupReservation[phone]" value="<?php echo $model -> phone; ?>" />
        <input type="text" name="GroupReservation[address]" value="<?php echo $model -> address; ?>" />
        <input type="text" name="GroupReservation[city]" value="<?php echo $model -> city; ?>" />
        <input type="text" name="GroupReservation[state]" value="<?php echo $model -> state; ?>" />
        <input type="text" name="GroupReservation[zipcode]" value="<?php echo $model -> zipcode; ?>" />
</form>
<?php endif; ?>

