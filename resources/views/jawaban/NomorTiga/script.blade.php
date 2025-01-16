<script type="text/javascript">
    $(document).ready(function() {
        $('.table-schedule').DataTable({
            language: {
                paginate: {
                    next: '<i class="bi bi-arrow-right"></i>',
                    previous: '<i class="bi bi-arrow-left"></i>'
                },
                emptyTable: "Data tidak ditemukan",
                search: "Pencarian:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data"
            },
            responsive: true,
            order: [[0, 'asc']],
            pageLength: 5, 
            lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]], 
            scrollY: '400px', 
            scrollCollapse: true, 
        });

        $(document).on('click', '.edit-btn', function(e) {
            e.preventDefault();
            console.log('Edit button clicked'); 
            
            const id = $(this).data('id');
            console.log('ID:', id); 
        
            $(this).prop('disabled', true);
            
            $.ajax({
                url: '{{ route("event.get-selected-data") }}',
                type: 'GET',
                data: { id: id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Success Response:', response); 

                    $('#edit_id').val(response.id);
                    $('#edit_name').val(response.name);
                    $('#edit_start').val(response.start);
                    $('#edit_end').val(response.end);
                    
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText); 
                    console.error('Status:', status);
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data');
                },
                complete: function() {
                    $('.edit-btn').prop('disabled', false);
                }
            });
        });

        window.testModal = function() {
            $('#editModal').modal('show');
        }
    });
</script>