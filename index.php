<!DOCTYPE html>
<html>
<head>
<title>LINK24.life : URL Shortener</title>
<body>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    
    
    <style>
    #rcorners2 {
      border-radius: 10px;
      border: 2px solid grey;
      padding: 7px;
      width: 200px;
    }
    #u_profile {
      padding: 7px;
      border-width: 10px;
    }
    #u_profile  p {
      padding: 15px;
      margin: 0px;
    }
    
    
    
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    </style>
    </head>
    
    <body>
      <div class="jumbotron text-center">
        <h1>LINK24.<i style=\'font-family: "Sofia";\'>life</i></h1>
        <p>------ Free URL Shortener ------</p>
      </div>
    
      <div class="container">
        <div class="row">
          <div class="col-sm">
                    <input type="text" id="url_input" placeholder="Paste Your URL to Short" required>
                    <center><input type="submit" onclick="action1()" value="Short URL"></center>
                  <center><div id="server-results"></div></center>
            </div>
          </div>
    
    <script>
    
    function action1() {
      var r1=Math.floor(Math.random() * 1000000) + 1;
      var link1=document.getElementById("url_input").value;
      document.getElementById("url_input").value="";
      $.ajax({
        url : '/api/'+r1,
        type: 'get',
        data : {link:link1}
      }).done(function(response){ 
        if(response!='false')
        {
            var link2 = response;
            var img='<br><br><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='+link2+' width="150" height="150"><br>QR Code'
            document.getElementById("server-results").innerHTML='<br><br>Your Original Link : <a href="'+link1+'">'+link1+'</a><br>Your Shorted Link : <a href="'+link2+'">'+link2+'</a>'+img;
        }
      });
    }
    
    </script>
    </body>
    </html>