<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Autocomplete Textbox using jQuery AJAX in PHP MySql</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    ul{
      margin-top: 0px;
      background: #fff;
      color: #000;
    }
    li{
      padding: 12px;
      cursor: pointer;
      color: black;
    }
    li:hover{
      background: #f0f0f0;
    }
</style>
  <body style="background-color: #ebebeb">
    <div class="container" style="margin-top: 50px;">
      <h2 class="text-center">STOCKS</h2>
      <div class="row">
        <div class="col-md-3"></div>  
        <div class="col-md-6" style="margin-top:20px; margin-bottom:20px;">
          <form>
            <div class="form-group">
              <input type="text" class="form-control" name="cityname" id="city" placeholder="Search Stocks"> 
              <div id="citylist"></div>
              <p></p>
              <div id="detail"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<!--- Autocomplete textbox jquery ajax --->
<script type="text/javascript">
  $(document).ready(function(){
      $("#city").on("keyup", function(){
        var city = $(this).val();
        if (city !=="") {
          $.ajax({
            url:"action.php",
            type:"POST",
            cache:false,
            data:{city:city},
            success:function(data){
              $("#citylist").html(data);
              $("#citylist").fadeIn();
            }  
          });
        }else{
          $("#citylist").html("");  
          $("#citylist").fadeOut();
        }
      });

      // click one particular city name it's fill in textbox
      $(document).on("click","li", function(){
        $('#city').val($(this).text());
        $('#citylist').fadeOut("fast");
      });
  });

$(document).on('click','li',function(){

  //$('#city').val($(this).text());
//var name = $("#city").val();

  var name=$(this).text();
  $('#city').val(name);
  //alert("name");
 $.ajax({
            url:"action.php",
            type:"POST",
            cache:false,
            data:{name:name},
            success:function(data){
              $("#detail").html(data);
              
            }  
          });

});


</script>