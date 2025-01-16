<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("event.get-json") }}',
            type: 'GET',
            success: function(response) {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: response,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    editable: true,
                    eventClick: function(info) {
                        var eventObj = info.event;
                        
                        if (eventObj.backgroundColor === '#2196F3') {  
                            $('#edit_id').val(eventObj.id);
                           
                            var eventName = eventObj.title.split('(')[0].trim();
                            $('#edit_name').val(eventName);
                            $('#edit_start').val(moment(eventObj.start).format('YYYY-MM-DD'));
                            $('#edit_end').val(moment(eventObj.end).format('YYYY-MM-DD'));
                            $('#editModal').modal('show');
                        } else {
                            
                            alert('Anda hanya dapat mengedit jadwal yang Anda buat');
                        }
                    },
                    eventDidMount: function(info) {
                        
                        $(info.el).tooltip({
                            title: info.event.title,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'
                        });
                    }
                });
                calendar.render();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching events:', error);
                alert('Terjadi kesalahan saat mengambil data jadwal');
            }
        });
    });
</script>