<?php
   session_start();
   include "db.php";
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OQP-Home</title>
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
            <!--?php 
                $page1 = $_GET['page'];
                if($page1=="" ||  $page1==1){
                $page1 = 0;
                echo "page1 = ".$page1;
            }
            else{
            $page1 = (($page1 * 1)-1);
            }
            ?-->
            <form action="checked.php" method="post">
            <?php
                for($i=1;$i<=25;$i++){
                $l = 1;
                                    
                $ansid = $i;

                $sql1 = "SELECT * FROM `questions` WHERE `qid` = $i ";
                $result1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
            ?>
                <div class="accordion" id="accordionExample">
                    <div class="">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo $i ." : ". $row1['question']; ?>
                                    <?php
                                        $sql = "SELECT * FROM answers WHERE ans_id = '$i'";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <input type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" > <?php echo $row['answer']; ?>
                            </div>
                            <?php
                                        }
                                            }
                                            $ansid = $ansid + $l;
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" />
            </form>
            <p id="letc"></p>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>