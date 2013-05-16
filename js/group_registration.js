
$().ready(function(){
    $('#GroupReservation_bus_parking_0').click(function(){
        $('#bus_name').show();
    });
    $('#GroupReservation_bus_parking_1').click(function(){
        $('#bus_name').hide();
    });
});

$(function(){
	$("#scheduleRadioGroup").click(function(){
		alert("schedule_id");
		var schedule_id = $('input:radio[name=ModelName[schedule_id]]:checked').val();
		
		alert(schedule_id);
	});
});

$(function() {
        $("#formBackwardButton").click(function(event){
                event.preventDefault();
                $('#formBackward').submit();
        });
        $("#formForwardButton").click(function(event){
                event.preventDefault();
                $('#formForward').submit();
        });
});