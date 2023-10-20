<?php
session_start();
if ($_SESSION['status'] == 'loggedin') {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Travelscapes</title>
    <link rel="shortcut icon" href="download.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="override.css">
    <link rel="stylesheet" type="text/css" href="join.css">
    <style>
      .navbar {
        background-color: #e84393 !important;
      }
    </style>
    <style>
      table thead-dark {
        background-color: #e84393;
      }
    </style>
  </head>



  <script>
    // This is the original price
    var originalPrice = <?php echo $baseprice; ?>;
    var passengers = 1; // Initialize with 1 passenger

    document.addEventListener("DOMContentLoaded", function() {
      // Update total cost when the DOM is ready
      updateTotalCost();

      // Add an event listener to the input field for the number of passengers
      document.getElementById('Pcount').addEventListener("input", updateTotalCost);
    });

    function updateTotalCost() {
      // Get the number of passengers from the input field
      passengers = parseInt(document.getElementById("Pcount").value, 10);

      // Calculate the total cost by multiplying the original price with the number of passengers
      var totalCost = originalPrice * passengers;

      // Display the total cost in the HTML element with the id "total"
      document.getElementById("total").innerHTML = "Total cost: ₹" + totalCost;
    }
  </script>

  <body class="bg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand heading" href="home.php">Travelscapes</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://www.google.com">FAQ</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
          <?php
          $servername = 'localhost';
          $username = 'root';
          $password = '';
          $db = 'travelscapes';
          $conn = mysqli_connect($servername, $username, $password, $db);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          //$email=$_SESSION['user_email'];
          //$sql="SELECT FirstName FROM user WHERE Email='".$email."'";
          //$fname = mysqli_query($conn,$sql);                                
          //while ($row=$fname->fetch_assoc()) {                            	
          //echo $row['FirstName'];
        }

        //$_SESSION['tripid']=$_POST['tripid'];
        //echo $_SESSION['tripid'];                                                     
          ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!--             <a class="dropdown-item" href="#">Edit Profile</a> -->
          </div>
          </li>
        </ul>
      </div>
    </nav>

    <form action="upload.html" method="POST">
      <div class="joinForm">
        <div class="topButtons">
          <label class="form-check-label" for="Pcount">Number of Passengers</label>
          <input type="number" name="passengerCount" min="1" id="Pcount" value="1" required>
          <button type="button" onclick="calculatePrice()">Go!</button>
    </form>
    <p id="result"></p>
    </div>
    <script>
      function calculatePrice() {
        const passengerCount = parseInt(document.getElementById("Pcount").value);
        const ticketPrice = passengerCount * 15000;
        document.getElementById("total").textContent = ticketPrice; // Replace "15000*" content
      }
    </script>
    <table class="table" id="passengertable">

      <thead style="background-color: #e84393;">
        <tr>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">Contact</th>
        </tr>
      </thead>
      <tbody>


        <td><input type="text" name="fname0" required></td>
        <td><input type="text" name="lname0" required></td>
        <td><input name="age0" type="number" min="1" required></td>
        <td>
          <select name="gender0" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </td>

        <td><input type="text" name="contact0" maxlength="10" pattern="([0-9]{10})"></td>
      </tbody>
    </table>
    <div class="form-group row">
      <label class="col-xl-3 col-form-label">From : Mumbai</label>
      <label for="Locations" class="col-xl-1 col-form-label">To :</label>
      <div class="col-xl-6">
        <select name="from_loc" class="form-control selectloc" id="Locations" width="9" onchange="javascript:getdata()">
          <option selected="" disabled>Select Location</option>
          <option value="ladakh">Ladakh</option>
          <option value="manali">Manali</option>
          <option value="chennai">Chennai</option>
          <option value="sikkim">Sikkim</option>
          <option value="rajasthan">Rajasthan</option>
          <option value="bhopal">Bhopal</option>
          <option value="pune">Pune</option>
        </select>
      </div>
    </div>


    <div class="form-group row ">
      <label for="travelpref" class="col-xl-3 col-form-label">Travel time preference</label>
      <div id="travelpref" class="col-xl-9">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="travelpref" id="day" value="day">
          <label class="form-check-label" for="day">Day</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="travelpref" id="night" value="night">
          <label class="form-check-label" for="night">Night</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="travelpref" id="any" value="any">
          <label class="form-check-label" for="any">Any</label>
        </div>
      </div>
    </div>
    <div class="form-group row price">
      <div class="totalCost" style="padding: 0%; margin: 0;">
        <div class="cost-wrapper">
          <p class="centre-text">Total Cost:
          <p id="total">15000*</p>
          </p>
        </div>
      </div>
    </div>

    <div class="tnc" style="display: block;">
      <p id="tncText" style="padding: 0%; margin: 0; margin-bottom: 1%;">*The above price is inclusive of travelling, accomodation, taxes and trip cost.</p>
    </div>
    </div>

    <div class="form-group row">
      <div class="col-xl-10" id="tncCheck">
        <input class="" type="checkbox" name="tncCheck" value="agreed" required>
        <label>I have read the <a href="example.html">terms and conditions</a> and accept them</label>
      </div>
    </div>
    <!--style>
      .confirmBtn {
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
      }

      .confirmBtn input[type="submit"] {
        padding: 5px 10px;
        /* You can adjust the padding to change the button size */
      }
    </style-->

    <!--form action="upload.html" method="post">
      <div class="form-check form-check-inline col-md-5 confirmBtn">
        <input type="hidden" name="cost" id="costforpayment">
        <input type="hidden" name="tripKaID" id="tripIdForMail" value="//
        <input type="hidden" name="email" id="UseremailForMail" value="//
        <input class="form-check-input yellowBtn" type="submit" name="JoinTrip" value="Proceed">
      </div>
    </form-->

    <style>
      .proceed-button {
        position: fixed;
        bottom: 10px;
        right: 10px;
      }
    </style>


    <a class="btn btn-primary proceed-button" style="background-color: #e84393;" href="upload.html">Proceed</a>





    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
      var passengers = parseInt(document.getElementById("Pcount").value, 10);
      var cost2 = 0;
      var cost1 = 0;
      var cost3 = <?php echo $baseprice; ?>;
      document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
      document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;
      document.getElementById("price").style.display = "block";
      window.onload = function() {

        document.getElementById('addbtn').style.display = "none";
        document.getElementById('tncText').style.display = "none";
      }

      function tablerows() {
        var count = document.getElementById('Pcount').value;
        var j = parseInt(count);
        for (var i = 1; i < j; i++) {
          var row = document.getElementById('passengertable').insertRow();
          var firstname = row.insertCell(0);
          var lastname = row.insertCell(1);
          var age = row.insertCell(2);
          var gender = row.insertCell(3);
          var contact = row.insertCell(4);
          var aadhar = row.insertCell(5);
          var deleteRow = row.insertCell(6);
          firstname.innerHTML = "<input type='text' name='fname" + i + "'>";
          lastname.innerHTML = "<input type='text' name='lname" + i + "'>";
          age.innerHTML = "<input type='number' name='age" + i + "' min='1'>";
          gender.innerHTML = "<select name='gender" + i + "'><option>Select</option><option>Male</option><option>Female</option></select>";
          contact.innerHTML = "<input type='text' name='contact" + i + "' maxlength='10' pattern='([0-9]{10})'>";

        }
        document.getElementById("iniPCount").style.display = "none";
        document.getElementById("Pcount").readOnly = "true";
        document.getElementById("addbtn").style.display = "inline";
        passengers = parseInt(document.getElementById("Pcount").value, 10);
        document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
        document.getElementById("Pcount").value = passengers;
        document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;

      }

      function addRow() {
        var row1 = document.getElementById('passengertable').insertRow();
        var firstname1 = row1.insertCell(0);
        var lastname1 = row1.insertCell(1);
        var age1 = row1.insertCell(2);
        var gender1 = row1.insertCell(3);
        var contact1 = row1.insertCell(4);
        var deleteRow1 = row1.insertCell(5);
        firstname1.innerHTML = "<input type='text' name='fname" + (passengers) + "'>";
        lastname1.innerHTML = "<input type='text' name='lname" + (passengers) + "'>";
        age1.innerHTML = "<input type='number' name='age" + (passengers) + "' min='1'>";
        gender1.innerHTML = "<select name='gender" + (passengers) + "'><option>Select</option><option>Male</option><option>Female</option></select>";
        contact1.innerHTML = "<input type='text' name='contact" + (passengers) + "' maxlength='10' pattern='([0-9]{10})'>";
        var cnt = document.getElementById("Pcount").value;
        var newcnt = parseInt(cnt) + 1;
        passengers = newcnt;
        document.getElementById("Pcount").value = passengers;
        document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
        document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;
      }

      function delRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("passengertable").deleteRow(i);
        var cnt = document.getElementById("Pcount").value;
        var newcnt = parseInt(cnt) - 1;
        passengers = newcnt;
        document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
        document.getElementById("Pcount").value = passengers;
        document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;
      }

      function getdata() {

        var selected_locn = document.getElementById("Locations").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            var jsobj = JSON.parse(xhttp.response);
            for (var i = 0; i < jsobj.length; i++) {
              if (selected_locn == jsobj[i].City) {
                cost1 = parseInt(jsobj[i].<?php echo $startloc; ?>, 10);
                cost1 = cost1 * 2;
                console.log(cost1);
                document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
              }
            }

          }
        };
        xhttp.open("GET", "distance.json", true);
        xhttp.send();
        document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;
      }

      function getcost() {
        var acc_pref = "3star";
        var meal_pref = "veg";
        if (document.getElementById("3star").checked) {
          acc_pref = document.getElementById("3star").value;
        }
        if (document.getElementById("5star").checked) {
          acc_pref = document.getElementById("5star").value;
        }
        if (document.getElementById("veg").checked) {
          meal_pref = document.getElementById("veg").value;
        }
        if (document.getElementById("nonveg").checked) {
          meal_pref = document.getElementById("nonveg").value;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            var jsobj = JSON.parse(xhttp.response);
            for (var i = 0; i < jsobj.length; i++) {
              if ((meal_pref == jsobj[i].meal_pref) && (acc_pref == jsobj[i].acc_pref)) {
                cost2 = parseInt(jsobj[i].cost, 10);
                console.log(cost2);
                document.getElementById("total").innerHTML = "Total cost ₹" + (cost1 + cost2 + cost3) * passengers + "*";
              }
            }

          }
        };
        xhttp.open("GET", "cost.json", true);
        xhttp.send();
        document.getElementById("costforpayment").value = (cost1 + cost2 + cost3) * passengers;

      }
    </script>
  </body>

  </html>
  <?php


  mysqli_close($conn);
  ?>
