<?php
include "database.php";
$query = "SELECT * FROM shout ORDER BY id DESC";
$shouts= mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <ul>
                    <?php while($row=mysqli_fetch_assoc($shouts)): ?>
                    <div>
                        <strong><?php echo ucwords(strtolower($row["user"]))?></strong>
                        <p><?php echo $row['message']?><small><?php echo $row["time"]?></small></p>


                    </div>


                    <!--
                    <table>
                        <tr>
                            <td><?php echo $row["user"]?> <p><?php echo $row['message']?></p> <span><?php echo $row["time"]?></span></td>
                        </tr>
                    </table>
-->
                    <!--
                    <table>
                        <th><?php echo $row["time"]?>-</th>
                        <th><?php echo $row["user"]?></th>:<?php echo $row['message']?>
                    </table>
-->
                    <?php endwhile;?>
                </ul>
                <!--
                <ul>
                    <?php while($row=mysqli_fetch_assoc($shouts)): ?>
                    <li><span><?php echo $row["time"]?>-</span> <strong>
                            <?php echo $row["user"]?>
                        </strong>:<?php echo $row['message']?></li>
                    <?php endwhile;?>
                </ul>
-->

            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-8 mt-2">
                   <hr>
                <div>
                    <?php if(isset($_GET['error'])): ?>
                    <div><?php echo $_GET['error']; ?></div>
                    <?php endif;?>
                    <form method="post" action="process.php">

                        <input class="mb-3" spellcheck="false" type="text" name="user" placeholder="Enter Your Name" />
                        <!--                        <input type="text" spellcheck="false" name="message" placeholder="Enter A Message" />-->
                        <br>
                        <textarea class="comment" spellcheck="true" name="message"
                        placeholder="Enter Your Message"></textarea>
                        <input class="shout-btn" type="submit" name="submit" value="Shout Now" />
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>

</html>
