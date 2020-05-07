<footer class="bg-dark">
    <div class="container-fluid">
      <div class="row  py-2">
        <div class="col-md-3">
          <h2 class="font-mono px-5 text-white text-info setfont">FoodShala</h2>
        </div>
        <div class="col-md-9">
          <p class="text-right text-white pt-2 px-5 setwidth">Copyright &copy; 2020</p>
        </div>
      </div>
    </div>
  </footer>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });

  </script>

  <script>
    //readmore option for product
    $(document).ready(function() {
      var showChar = 75;
      var ellipsestext = "...";
      var moretext = "more";
      var lesstext = "less";
      $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

          var c = content.substr(0, showChar);
          var h = content.substr(showChar-1, content.length - showChar);

          var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

          $(this).html(html);
        }

      });

      $(".morelink").click(function(){
        if($(this).hasClass("less")) {
          $(this).removeClass("less");
          $(this).html(moretext);
        } else {
          $(this).addClass("less");
          $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
      });

    });


    $(document).ready(function(){

       load_data();

       function load_data(query)
       {
        $.ajax({
         url:"filter.php",
         method:"POST",
         data:{query:query},
         success:function(data)
         {
          $('#result').html(data);
         }
        });
       }
       $('#search_text').keyup(function(){
        var search = $(this).val();
        alert(search)
        if(search != '')
        {
         load_data(search);
        }
        else
        {
         load_data();
        }
       });
      });

  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="include/js/shorten.js"></script>
  <script src="include/js/bootstrap.js"></script>
  <script src="include/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>
