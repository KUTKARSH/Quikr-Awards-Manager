<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $( "#div1" ).load( "test.php #abc" );
    //$("#div1").load("demo_test.txt");
  });
});
</script>
</head>
<body>

<div id="div1"><h2 id="abc">Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

</body>
</html>


