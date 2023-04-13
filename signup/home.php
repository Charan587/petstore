<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "signup";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT email FROM tbl_member WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the row data and store email in session
    $row = $result->fetch_assoc();
    $email = $row["email"];
    $_SESSION["email"] = $email;
} else {
    // Handle case where no results found, e.g. set default value for email or show error message
    $_SESSION["email"] = "No email found";
    // or echo "Error: No email found";
}
    
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    // Insert form data into MySQL database
    $conn = new mysqli("localhost", "root", "", "signup");
    
    $sql = "INSERT INTO contact (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo ("Message sent successfully!");
        header("location:home.php");

    } else {
        echo ("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodgy House</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-paw"></i> Dodgy House </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#shop">shop</a>
        <a href="#services">services</a>
        <a href="#plan">plan</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <a href="#" class="fas fa-shopping-cart"></a>
        <div class="fas fa-user" id="login-btn"></div>
    </div>
     
    <form action="" class="login-form">
        <h3>User Details</h3>
        <h3> <span>hi</span> welcome to our pet shop - Dodgy House   Welcome <?php echo $_SESSION["username"];?></h3>
        
    </div>
    </form>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3> <span>hi</span> welcome to our pet shop - Dodgy House</h3>
        <a href="#" class="btn">Read More</a>
    </div>

    <img src="image/bottom_wave.png" class="wave" alt="">

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="image/about_img.png" alt="">
    </div>

    <div class="content">
        <h3>premium <span>pet food</span> manufacturer</h3>
        
        <a href="#" class="btn">Get Directly From Our Dodgy shop</a>
    </div>

</section>

<!-- about section ends -->

<!-- dog and cat food banner section starts -->

<div class="dog-food">

    <div class="image">
        <img src="image/dog_food.png" alt="">
    </div>

    <div class="content">
        <h3> <span>air dried</span> dog food </h3>
        
        <div class="amount">$15.00 - $30.00</div>
        <a href="#"> <img src="image/shop_now_dog.png" alt=""> </a>
    </div>

</div>

<div class="cat-food">

    <div class="content">
        <h3> <span>air dried</span> cat food </h3>
        
        <div class="amount">$15.00 - $30.00</div>
        <a href="#"> <img src="image/shop_now_cat.png" alt=""> </a>
    </div>

    <div class="image">
        <img src="image/cat_food.png" alt="">
    </div>

</div>

<!-- dog and cat food banner section ends -->

<!-- shop section starts  -->

<section class="shop" id="shop">

    <h1 class="heading"> our <span> products </span> </h1>
    <h1 class="heading"> Available only on  <span> Dodgy House  </span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_01.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_02.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_03.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_04.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_05.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product_06.jpg" alt="">
            </div>
            <div class="content">
                <h3>air-dried food</h3>
                <div class="amount"> $15.00 - $30.00 </div>
            </div>
        </div>

    </div>

</section>

<!-- shop section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> our <span>services</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-dog"></i>
            <h3>dog boarding</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

        <div class="box">
            <i class="fas fa-cat"></i>
            <h3>cat boarding</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

        <div class="box">
            <i class="fas fa-bath"></i>
            <h3>spa & grooming</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

        <div class="box">
            <i class="fas fa-drumstick-bite"></i>
            <h3>healthy meal</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

        <div class="box">
            <i class="fas fa-baseball-ball"></i>
            <h3>activity exercise</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>health care</h3>
            <a href="schedule.php" class="btn">Book Now</a>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- plan section starts  -->

<section class="plan" id="plan">

    <h1 class="heading"> choose a <span>plan</span> </h1>

    <div class="box-container">

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 1 day </h3>
            <i class="fas fa-bicycle icon"></i>
            <div class="list">
                <p> pet room <span class="fas fa-check"></span> </p>
                <p> pet grooming <span class="fas fa-check"></span> </p>
                <p> pet exercise <span class="fas fa-check"></span> </p>
                <p> pet meals <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>50</div>
            <a href="plan.php" class="btn"> choose plan </a>
        </div>

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 10 days </h3>
            <i class="fas fa-motorcycle icon"></i>
            <div class="list">
                <p> pet room <span class="fas fa-check"></span> </p>
                <p> pet grooming <span class="fas fa-check"></span> </p>
                <p> pet exercise <span class="fas fa-check"></span> </p>
                <p> pet meals <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>350</div>
            <a href="plan.php" class="btn"> choose plan </a>
        </div>

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 30 days </h3>
            <i class="fas fa-car-side icon"></i>
            <div class="list">
                <p> pet room <span class="fas fa-check"></span> </p>
                <p> pet grooming <span class="fas fa-check"></span> </p>
                <p> pet exercise <span class="fas fa-check"></span> </p>
                <p> pet meals <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>650</div>
            <a href="plan.php" class="btn"> choose plan </a>
        </div>

    </div>

</section>

<!-- plan section ends -->

<section class="contact" id="contact">


    <div class="image">
        <img src="image/contact_img.png" alt="">
    </div>

    <form action="" method="post">
    <h3>contact us/ review us</h3>
    <input type="text" name="name" placeholder="your name" class="box">
    <input type="email" name="email" placeholder="your email" class="box">
    <input type="number" name="number" placeholder="your number" class="box">
    <textarea name="message" placeholder="your message" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="send message" class="btn">
</form>

</section>

<section class="footer">

    <img src="image/top_wave.png" alt="">

    <div class="share">
        <a href="https://www.bing.com/ck/a?!&&p=ba376fc66af041c1JmltdHM9MTY4MTI1NzYwMCZpZ3VpZD0zODcwNGJlNi1iNjYzLTYzMTAtMjMyMy01YmY3YjdjZTYyYjMmaW5zaWQ9NTE5NQ&ptn=3&hsh=3&fclid=38704be6-b663-6310-2323-5bf7b7ce62b3&psq=facebook+login&u=a1aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2xvZ2luLnBocC8&ntb=1" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="credit"> created by <span> Charan Teju </span> | all rights reserved! </div>

</section>















<span class="login-signup btn btn-warning"><a href="logout.php" style="color:white">Logout</a></span>




<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>