<script type="text/javascript">
  
  let calendar;

  $(document).ready(function(){
      var calendarEl = document.getElementById('calendar');
      calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            right   : 'prev,next',
            center  : 'title', 
            left    : null,
          },
          locale: 'id',
          initialView: 'dayGridMonth',
          events: [],
      });
      calendar.render();
  });

	@if (session('success'))
		Swal.fire({
			icon: 'success',
			title: 'Sukses!',
			text: '{{ session('success') }}',
			showConfirmButton: false,
			timer: 3000 
		});
	@endif

	@if ($errors->any())
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: '{{ $errors->first() }}',
			showConfirmButton: false,
			timer: 3000 
		});
	@endif
</script>