    <!-- jQuery -->
    <script src="<?= base_url('assets/material/') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/material/') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/material/') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/material/') ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url('assets/material/') ?>/dist/js/demo.js"></script> -->
    <!-- Select2 -->
    <script src="<?= base_url('assets/material/') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    </body>

    </html>