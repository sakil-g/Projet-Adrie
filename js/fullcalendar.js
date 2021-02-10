// FULL CALENDAR
document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		headerToolbar: {
			center: 'dayGridMonth,timeGridFourDay' // buttons for switching between views
		  },
		  views: {
			timeGridFourDay: {
			  type: 'timeGrid',
			  duration: { days: 7 },
			  buttonText: 'Semaines'
			}
		  }
		  
		});
		calendar.setOption('locale', 'fr');
	calendar.render();
	
  });

  