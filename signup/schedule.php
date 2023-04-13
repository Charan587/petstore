<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// booking 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$pet_name = $_POST['pet_name'];
		$pet_type = $_POST['pet_type'];
		$service_type = $_POST['service_type'];
		$date = $_POST['date'];
		$time = $_POST['time'];

		$con = mysqli_connect("localhost", "root", "", "signup");
		$query = "INSERT INTO schedule (name,email,phone,pet_name,pet_type,service_type,date,time)
		 		  VALUES('$name','$email','$phone','$pet_name','$pet_type','$service_type','$date','$time')";
		$result = mysqli_query($con, $query);
		if ($result) {
			echo ("Scheduled");
			header("location:home.php");
		} else {
			echo ("Schedule Failed");
		}
	}
	?>

<!DOCTYPE html>
<html>
  <head>
    <title>pet leaving ceremony</title>
    
    <link rel="stylesheet" type="text/css" href="walking.css">
    <style>
        /* Center the form using flexbox */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Set height of the container to the full viewport height */
            flex-direction: column; /* Set flex-direction to column to stack elements vertically */
            background-image: url('https://www.insidedogsworld.com/wp-content/uploads/2016/03/Dog-Pictures.jpg'); /* Add the path to your dog image here */
            background-size: cover; /* Set background size to cover to fill the container */
            background-position: center; /* Set background position to center */
        }
        h1 {
            margin-bottom: 20px; /* Add margin bottom to create space between business name and form */
        }
        form {
            width: 300px; /* Set width of the form as desired */
            padding: 20px;
            border: 1px solid #ccc;
            background-color: rgba(249, 249, 249, 0.8); /* Add a background color with opacity to create a blur effect */
            backdrop-filter: blur(5px); /* Apply a blur effect to the form */
            display: flex; /* Set display to flex to align items properly */
            flex-direction: column; /* Set flex-direction to column to stack items vertically */
            align-items: center; /* Center align items horizontally */
        }
        label, input {
            margin-bottom: 10px; /* Add margin bottom to create space between label and input */
            width: 100%; /* Set width of label and input to 100% */
        }
        input[type="submit"] {
            width: auto; /* Set width of submit button to auto to fit content */
        }
    </style>
  </head>

  <body>
  <a href="home.php" style="text-decoration:none; color: inherit;">
  <h1>Dodgy House</h1>
    </a>
    
    
<form action="" method="POST">
					<h3>The time and date to leave Your pet here</h3>
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name" placeholder="Enter your full name" required><br>
						<label for="email">Email</label>
						<input type="text" id="email" name="email" placeholder="Enter you Email Address" required><br>
						<label for="phone">Contact Number</label>
						<input type="text" id="phone" name="phone" placeholder="Enter your Phone number" required><br>
						<label for="pet_name">Pet's Name</label>
						<input type="tel" id="pet_name" name="pet_name" placeholder="What is our furry friend's name? " required><br>
						<label for="pet-select">What Type of Pet it is?</label>
						<select id="pet-select" name="pet_type">
							<option value="Dog">Dog</option>
							<option value="Cat">Cat</option>
							<option value="Bird">Bird</option>
							<option value="Fish">Fish</option>
							<option value="Rabbit">Rabbits</option>
						</select><br>
						<label for="service_type">Which service you want to avail?</label>
						<select id="service_type" name="service_type" placeholder="Choose service">
							<option value="Spa & Grooming">Spa & Grooming</option>
							<option value="Pool Sessions">Pool Sessions</option>
							<option value="Dog Boarding"> Dog Boarding</option>
							<option value="Cat Boarding"> Cat Boarding</option>
							<option value="Healthy Meal">Healthy Meal</option>
							<option value="Day Out">Activity services</option>
							<option value="Health care">Health care</option>
						</select><br>
						<label for="date">Choose a date:</label>
						<input type="date" id="date" name="date"><br>
						<label for="time">Choose a time:</label>
						<input type="time" id="time" name="time"><br>
					<button type="submit">SUBMIT</button>
				</form>
                
                </body>
</html>
