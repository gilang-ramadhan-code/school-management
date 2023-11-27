<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            columnDefs: [{
                orderable: false,
                targets: -1
            }]
        });
    });
</script>