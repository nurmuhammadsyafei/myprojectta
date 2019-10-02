  </main>
  

  <!--include javascript file-->

<script src="<?php echo base_url('assets/bootstrap/js/popper.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js')?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?= base_url('assets/datatables/datatables.js') ?>"></script>

  <script>
  	$(document).ready( function () {
  		$('#myTable').DataTable();
  	} );
  </script>
</body>
</html>
