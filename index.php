<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>User Dashboard</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Adamina&family=Bangers&family=Kaushan+Script&family=PT+Serif:ital@1&family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;1,100;1,300&family=Signika&display=swap");

body {
  background: url("https://images.pexels.com/photos/1028599/pexels-photo-1028599.jpeg")
    no-repeat;
  background-position: center;
  background-size: cover;
  padding-top: 50px;
}

.container {
  max-width: 400px;
  margin: 0 auto;
  background: white;
}

#result {
  font-size: 25px;
  font-weight: bold;
}
#netCalories {
        font-size: 2em;
        font-family: Arial, Helvetica, sans-serif;
      }

.box {
  height: 586px;
  box-shadow: 5px 7px 3px rgb(161, 155, 155);
  max-width: 500px;
}

.box1 {
  box-shadow: 5px 7px 3px rgb(161, 155, 155);
  max-width: 500px;
  padding-bottom: 23px;
  height: 157px;
  padding-top: 32px;
}

h1 {
  color: black;
  font-family: "Kaushan Script", cursive;
  text-align: center;
}

h2 {
  text-align: center;
}

.btn {
  width: 40%;
  border-radius: 20px;
  margin: auto;
}

.group {
  padding-left: 176px;
}

.foodTracker{
  margin-top: 20px;
  background: white;
  padding: 10px 20px
}
 .btn1{
  width: 10%;
  border-radius: 20px;
  margin: auto;
 }

 @media (max-width: 534px){
  .btn1 {
    width: 18%;
    border-radius: 20px;
    margin: auto;
}
 }

    </style>

</head>
<body>
    <div class="container box1">
        <h1>Welcome to CalorieCalc.in</h1>
        <div class="group">
        <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
    </div>

    <div class="container box">
        <h2>Calorie Calculator <i class="ri-calculator-fill"></i></h2>
        <div class="form-group">
            <label for="weight">Weight (in kg):</label>
            <input type="number" id="weight" class="form-control">
        </div>
        <div class="form-group">
            <label for="height">Height (in cm):</label>
            <input type="number" id="height" class="form-control">
        </div>
        <div class="form-group">
            <label for="age">Age (in years):</label>
            <input type="number" id="age" class="form-control">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="activity">Activity Level:</label>
            <select id="activity" class="form-control">
                <option value="1.2">Sedentary (little or no exercise)</option>
                <option value="1.375">Lightly active (light exercise/sports 1-3 days/week)</option>
                <option value="1.55">Moderately active (moderate exercise/sports 3-5 days/week)</option>
                <option value="1.725">Very active (hard exercise/sports 6-7 days/week)</option>
                <option value="1.9">Extra active (very hard exercise/sports & physical job or 2x training)</option>
            </select>
        </div>
        <div class="group">
        <button id="calculate" class="btn btn-primary">Calculate</button>
        </div>

        <div id="result" class="mt-3"></div>
    </div>
    <script src="script.js"></script>
<div class="foodTracker">
    <h1>Food Calorie Tracker</h1>

    <form id="foodForm" method="POST" action="caloriedata.php">
      <div class="form-group">
        <label for="foodName">Food Name:</label>
        <input type="text" class="form-control" id="foodName" required />
      </div>

      <div class="form-group">
        <label for="quantity">Quantity (grams):</label>
        <input type="number" class="form-control" id="quantity" required />
      </div>

      <div class="form-group">
        <label for="calorieContent">Calorie Content:</label>
        <input
          type="number"
          class="form-control"
          id="calorieContent"
          required
        />
      </div>
      <div class="note">
        <p>
         <i> (You can add your food manually if not mentioned into the below list.)</i>
        </p>
      </div>

      <button type="submit" class=" btn1 btn-primary">Add Food</button>
    </form>

    <br />

    <table id="foodTable" class="table table-striped">
      <thead>
        <tr>
          <th>Food Name</th>
          <th>Quantity (grams)</th>
          <th>Calorie Content</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example data -->

        <tr>
            <td>Milk (whole)</td>
            <td>100</td>
            <td>60</td>
            <td>
              <button class="btn btn-danger" onclick="deleteRow(this)">
                Delete
              </button>
            </td>
          </tr>
          <tr>
            <td>Eggs</td>
            <td>100</td>
            <td>143</td>
            <td>
              <button class="btn btn-danger" onclick="deleteRow(this)">
                Delete
              </button>
            </td>
          </tr>
        <tr>
          <td>Apple</td>
          <td>100</td>
          <td>52</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Chicken Breast</td>
          <td>150</td>
          <td>165</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Salmon (baked or grilled)</td>
          <td>100</td>
          <td>206</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        
       
        <tr>
          <td>Peanut butter</td>
          <td>100</td>
          <td>588</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>White rice (cooked)</td>
          <td>100</td>
          <td>131</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Oats (cooked)</td>
          <td>100</td>
          <td>71</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Broccoli</td>
          <td>100</td>
          <td>34</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Greek yogurt (plain, non-fat)</td>
          <td>100</td>
          <td>59</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Dark chocolate (70-85% cocoa)</td>
          <td>100</td>
          <td>604</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
        <tr>
          <td>Bananas</td>
          <td>100</td>
          <td>96</td>
          <td>
            <button class="btn btn-danger" onclick="deleteRow(this)">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <p id="netCalories">
      Net Calorie Content: <span id="totalCalories">0</span>
    </p>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
      // Calculate the net calorie content and update the total
      function calculateNetCalories() {
        var total = 0;
        var calorieCells = document.querySelectorAll(
          "#foodTable tbody tr td:nth-child(3)"
        );

        calorieCells.forEach(function (cell) {
          total += parseInt(cell.textContent);
        });

        document.getElementById("totalCalories").textContent = total;
      }

      // Add a new row to the table
      function addFood() {
        var foodName = document.getElementById("foodName").value;
        var quantity = document.getElementById("quantity").value;
        var calorieContent = document.getElementById("calorieContent").value;

        var tableBody = document
          .getElementById("foodTable")
          .getElementsByTagName("tbody")[0];
        var newRow = tableBody.insertRow();

        var nameCell = newRow.insertCell();
        nameCell.textContent = foodName;

        var quantityCell = newRow.insertCell();
        quantityCell.textContent = quantity;

        var calorieCell = newRow.insertCell();
        calorieCell.textContent = calorieContent;

        var actionsCell = newRow.insertCell();
        var deleteButton = document.createElement("button");
        deleteButton.classList.add("btn", "btn-danger");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", function () {
          deleteRow(this);
        });
        actionsCell.appendChild(deleteButton);

        calculateNetCalories();
      }

      // Delete a row from the table
      function deleteRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        calculateNetCalories();
      }

      // Submit form event listener
      document
        .getElementById("foodForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          addFood();

          // Send data to PHP script for database insertion
          var foodName = document.getElementById("foodName").value;
          var quantity = document.getElementById("quantity").value;
          var calorieContent = document.getElementById("calorieContent").value;

          var formData = new FormData();
          formData.append("foodName", foodName);
          formData.append("quantity", quantity);
          formData.append("calorieContent", calorieContent);

          fetch("insert_data.php", {
            method: "POST",
            body: formData,
          })
            .then(function (response) {
              if (response.ok) {
                console.log("Data inserted into the database.");
              } else {
                console.log("Failed to insert data into the database.");
              }
            })
            .catch(function (error) {
              console.log("Error:", error);
            });

          // Reset form fields
          document.getElementById("foodForm").reset();
        });
    </script>

</body>
</html>




