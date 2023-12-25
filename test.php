<?php
// header('Content-Type: text/html;charset=utf-8');
//error_reporting(E_ERROR | E_PARSE);
$database_username = 'register_office';
$database_password = 'Al8Lye7PDJ}[';
 $pdo_conn = new PDO('mysql:host=localhost;dbname=register_office',$database_username,$database_password);
 //echo $pdo_conn;
 if($pdo_conn)
 {
	// echo "ok";
 }
 else
 {
	 // echo "nok";
 }
?>
<?php 

 $token_name = "";
 $token_name_tamil = "";
 $toke_no = "";
    $pdo_statement = $pdo_conn->prepare("SELECT * FROM register_details where id!=''   ORDER BY id DESC limit 1");
        $pdo_statement->execute();
        $token_details=$pdo_statement->fetch(PDO::FETCH_ASSOC);
            $token_name = $token_details['token_name'];
            $token_name_tamil = $token_details['token_name_tamil'];
            $toke_no = $token_details['token_no'];
        if($token_details['speak_status'] == 1){
            $tk_no = $token_details['token_no'];
            
            $token_no = "Your        Token       Number     is         ". join(" ", str_split($tk_no, 1)) ."     Your            Name          ". $token_details['token_name'];
        }else{
            $token_no = '-';
        }
        
    
            



?>
<html >
<head>
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Department</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    
   
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!--<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;400&display=swap" rel="stylesheet">-->
</head>  
<!--<style>body{font-family: 'Catamaran', sans-serif;}</style>-->

<body>
<div class="hole-hed">
       <div class="container-fluid">
       <div class="row hed">
           <div class="col-md-2"></div>
           <div class="col-md-8  align-self-center" style="text-align: center;">
               <img src="img/logo-ref.png">
               <h3>தமிழ்நாடு பதிவு துறை<br>
திருப்பூர் சார் பதிவாளர்  அலுவலகம் </h3>
           </div>
           <div class="col-md-2"></div>
       </div>
       <hr class="no-bre">
       <div class="boc">
       <div class="row">
           <div class="col-md-1"></div>
           <div class="col-md-10 col-12 nos">
               <div class="box tab1 overflow-hidden">
              <p>Token Number / பதிவு எண்  </p>
               <h3 class="count23 number"><?php echo $toke_no;?></h3>
               <textarea hidden id="token_no" ><?php echo $token_no;?></textarea>
               
               <hr class="du">
               <p>Name / பெயர் </p>
   <h3 class="drop-in" ><?php echo $token_name;?> - <span lang="ta"><?php echo $token_name_tamil;?></span></h3>
  
  
  
  
   </div> 
   <div class="time-zone">
  <div class="row date">
      <div class="col-md-6 col-6">
         <p><?php echo date('h:i A');?></p> 
      </div>
      <div class="col-md-6  col-6">
          <p><?php echo date("l");?> - <?php echo date('d-m-Y');?></p>
      </div>
  </div>
  
  </body></html>