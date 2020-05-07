<footer class="bg-dark">
    <div class="container-fluid">
      <div class="row  py-2">
        <div class="col-md-3">
          <h2 class="font-mono px-5 text-white text-info">FoodShala</h2>
        </div>
        <div class="col-md-9">
          <p class="text-right text-white pt-2 px-5">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
<script>
  $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d',
    todayHighlight: true,
    autoclose: true,
    orientation:'bottom right'
});

</script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
<script>
 
  //update product


  $('.viewProduct').on('click', function(event) {
    $('#updateproduct').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);
    $('#p_id').val(data['0']);
    $('#p_name').val(data['1']);
    $('#p_cat').val(data['2']);
    $('#p_sub').val(data['3']);
    $('#p_price').val(data['4']);
    $('#p_desc').val(data['5']);
    $('#p_size').val(data['6']);
    $('#p_image').val(data['7']);

  });

  $('.deletproduct').on('click', function(event) {
    $('#delproduct').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();
    console.log(data);
    $('#id').val(data['0']);
    $('#product_name').text(data[2]);
  });
</script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="include/js/bootstrap.js"></script>
  <script src="include/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

</body>
</html>
