$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			
			defaultDate: '2015-10-29',
			//editable: true,
			eventLimit: true, 
			events: [
				
				{	
					//an example
					title: 'room 101',
					start: '2015-10-29T15:30:00',
					end: '2015-10-29T16:00:00'
				},
				
			]
		});
		
	});