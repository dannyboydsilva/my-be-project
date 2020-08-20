<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>index.php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
      height: 100%;
}
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Shopping Center</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"></a>.</li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  
  <img src="img/shoppingcart.png" class="img-responsive margin" style="display:inline" alt="Bird" width="200" height="200">
  <h3 class="margin">Welcome to Shopping Center</h3>
    <h3>Please scan your card.</h3>
<br/><br/>
</div>

<script>
var cardCode = "";  

//RFID mappings
var cardToTrolleyId = {
    "0007644225": "1",
    "0007620516": "2",
    "???": "3"
};
//Scanning for cards
document.addEventListener('keypress', function(event) {
    var key = event.key;
    console.log(key);
    if (!isNaN(key)) {
        cardCode = cardCode + key;
    }
    if (key == "Enter" && cardCode != "") {
        document.location = "checkout.php?TrolleyNo=" + cardToTrolleyId[cardCode];
    }
});
</script>
</body>
</html>
