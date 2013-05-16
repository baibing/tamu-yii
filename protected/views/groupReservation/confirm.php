<?php 
/* @var $this GroupReservationController */
/* @var $model GroupReservation */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'js/group_registration.js');
?>
<!-- protected/views/groupReservation/confirm.phtml --> 
<h2>Review your planned visit to Texas A&amp;M</h2>

<form id="visitDateAndTime" class="registrationForm" method="post">

<div class="itinerary">

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
					echo $this -> getType($model -> type_id);
				}
                 ?></dd>

            <dt>Date</dt>
            <dd><?php echo isset($model -> date) ? (date('l, F j, Y', strtotime($model -> date))) : ""; ?></dd>

            <dt>Number of students</dt>
            <dd><?php echo isset($model -> visitors_num) ? ($model -> visitors_num) : ""; ?></dd>

            <dt>Number of adults</dt>
            <dd><?php echo isset($model -> audits_num) ? ($model -> audits_num) : ""; ?></dd>

            <dt>Size of Party</dt>
            <dd><?php echo isset($model -> total_num) ? ($model -> total_num) : ""; ?></dd>
        </dl>
        <div class="clear"></div>
    </div>

    <div class="events">
        <h3>Campus visit details</h3>
        <dl>
            <?php if(isset($model -> schedule_id)): ?>
            <?php if($model -> schedule_id > 6): ?>
            <dt><?php
				$visitType = "Tour Only";
            	switch (($model -> schedule_id)) {
					case '7' :
						$tourTime = "8:30 a.m.";
						break;
					case '8' :
						$tourTime = "9:30 a.m.";
						break;
					case '9' :
						$tourTime = "10:00 a.m.";
						break;
					case '10' :
						$tourTime = "11:30 a.m.";
						break;
					case '11' :
						$tourTime = "2:30 p.m.";
						break;
					default :
						echo "";
						break;
				} 
				echo $tourTime; ?></dt>
            <dd>Campus Tour</dd>

            <dt>Tour by</dt>
            <dd><?php echo ($this -> tourBy); ?></dd>
            <?php elseif ($model -> schedule_id <= 3): ?>

            <dt>9:15 a.m.</dt>
            <dd>Campus Tour</dd>

            <dt>11:15 a.m.</dt>
            <dd>Prospective Student Session</dd>

            <dt>12:30 p.m.</dt>
            <dd>Lunch</dd>

            <dt>Lunch Payment</dt>
            <dd><?php echo ($model -> lunch_payment); ?></dd>

            <dt>1:45 p.m.</dt>
            <dd><?php
				$visitType = "Schedule 1";
				switch ($model -> schedule_id) {
					case '1' :
						$additionTour = "Residence Life";
						break;
					case '2' :
						$additionTour = "Corps of Cadets";
						break;
					case '3' :
						$additionTour = "Bonfire Memorial";
						break;
					default :
						echo "";
						break;
				}
				echo $additionTour; ?></dd>

            <?php else: ?>

            <dt>11:15 a.m.</dt>
            <dd>Campus Tour</dd>

            <dt>01:00 p.m.</dt>
            <dd>Lunch</dd>

            <dt>Lunch Payment</dt>
            <dd><?php echo ($model -> lunch_payment); ?></dd>

            <dt>02:15 p.m.</dt>
            <dd>Prospective Student Session</dd>

            <dt>3:30 p.m.</dt>
            <dd><?php
				$visitType = "Schedule 2";
				switch ($model -> schedule_id) {
					case '4' :
						$additionTour = "Residence Life";
						break;
					case '5' :
						$additionTour = "Corps of Cadets";
						break;
					case '6' :
						$additionTour = "Bonfire Memorial";
						break;
					default :
						echo "";
						break;
				}
				echo $additionTour; ?></dd>

            <?php endif; ?>
            <?php endif; ?>

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
<form id="formBackward" class="registrationForm" method="post" style="display:block;" action="index.php?r=groupReservation/create" >
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
<form id="formForward" class="registrationForm" method="post" style="display:block;" action="index.php?r=groupReservation/thankyou">
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

