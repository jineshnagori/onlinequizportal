<?php
session_start();
include "db.php";
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>OQP-Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
   </head>
   <body>
        <!-- Header -->
            <header id="header">
                <nav class="left">
                    <a href="#menu"><span>Menu</span></a>
                </nav>
                <a href="index.html" class="logo">Online Quiz Portal</a>
                        <!-- <nav class="right">
                            <a href="login.html" class="button alt">Log in</a>
                            <a href="signup.html" class="button alt">Sign up</a>
                        </nav> -->
            </header>
        <!-- Menu -->
            <nav id="menu">
                <ul class="links">
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="contactus.html">Contact us</a></li>
                </ul>
            </nav>
        <!-- Section -->
            <section>
                <div class="container text-center" >
                    <table class="table text-center table-bordered table-hover">
                        <tr>
                            <th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
                        </tr>
                        <tr>
                            <td>
                                Questions Attempted
                            </td>
                            <?php
                                $counter = 0;
                                $Resultans = 0;
                                    if(isset($_POST['submit'])){
                                        if(!empty($_POST['quizcheck'])) {
                                            $checked_count = count($_POST['quizcheck']);
                                            //echo "checked_count: ".$checked_count;
                            ?>
                            <td>
                                <?php
                                    echo "Out of 20, You have attempt ".$checked_count." option."; ?>
                                </td>
                            <?php
                            // Loop to store and display values of individual checked checkbox.
                                $selected = $_POST['quizcheck'];
                                $q1= " select ans_id from questions ";
                                $ansresults = mysqli_query($con,$q1);
                                $i = 1;
                                while($rows = mysqli_fetch_array($ansresults)) {
                                $flag = $rows['ans_id'] == $selected[$i];
                                    if($flag){
                                        // echo "correct ans is ".$rows['ans']."<br>";				
                                        $counter++;
                                        $Resultans++;
                                        // echo "Well Done! your ". $counter ." answer is correct <br><br>";
                                    }else{
                                        $counter++;
                                        // echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
                                    }					
                                    $i++;		
                                }
                            ?>
                            <tr>
                                <td>
                                    Your Total score
                                </td>
                                <td colspan="2">
                                    <?php 
                                            echo " Your score is ". $Resultans.".";
                                            }
                                            else{
                                            echo "<b>Please Select Atleast One Option.</b>";
                                            }
                                        } 
                                    ?>
                                </td>
                            </tr>
                            <?php 

                            $name = $_SESSION['username'];
                            $finalresult = " insert into user(username, totalques, correctans) values ('$name','$checked_count','$Resultans') ";
                            $queryresult= mysqli_query($con,$finalresult); 
                            if($queryresult){
                            // echo "successssss";
                            }
                            ?>
                    </table>
                </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            </section>
        <!-- Footer -->
            <footer id="footer">
                <div class="inner">
                    <h2>Get In Touch</h2>
                    <ul class="actions">
                        <li><span class="icon fa-phone"></span> <a href="#">+91 0000000000</a></li>
                        <li><span class="icon fa-envelope"></span> <a href="#">jineshn21@gmail.com</a></li>
                        <li><span class="icon fa-map-marker"></span>Somewhere in Jaipur.</li>
                    </ul>
                </div>
                <div class="copyright">
                    &copy; By JHcube.
                </div>
            </footer>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
    </body>
</html>