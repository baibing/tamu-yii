
$().ready(function(){
    $('#GroupReservation_bus_parking_0').click(function(){
        $('#bus_name').show();
    });
    $('#GroupReservation_bus_parking_1').click(function(){
        $('#bus_name').hide();
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

$(function() {
	$(".scheduleRadio").click(function(){
		//alert("schedule_ida");
		//$('#schedule1Div :input').attr('disabled', true);
	});
});
