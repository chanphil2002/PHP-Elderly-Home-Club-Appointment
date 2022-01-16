<style>
    aside{
    background-image: linear-gradient(#fbbee0, #ffc7c7);
    position: relative;
    width: 300px;
    height: 625px;
    margin-left: 225px;
    margin-top: 30px;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;    
    }
    aside .profile{
        margin-top: 1em;
        margin-bottom: 1em;
        text-align: center;
    }
    aside .profile img{
        display: block;
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto;
    }

    aside ul{    
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    aside ul li a{
        display: block;
        padding: 13px 0;
        border-bottom: 1px solid rgb(255, 143, 143);
        color: black;
        font-size: 30px;
        position: relative;
        text-decoration: none;
        text-align: center;
    }
    aside ul li a:hover,
    aside ul li a.active{
        background-color: #F8584D;
        color: white;
        text-decoration: none;
    }
</style>

<aside>    
    <?php
    if ($page_id < 3) 
    {        
        $stmt = $conn->prepare("SELECT profile_picture FROM tbl_senior WHERE senior_IC = ?");
        $stmt->bind_param("s", $_SESSION['seniorlogin']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
    ?>
    <div class="profile">
        <img src="../img_upload/senior/<?php echo $row['profile_picture'];?>" alt = "Profile Image">
    </div>
        <ul>    
            <li>
                <a class="<?php echo ($page_id == "1" ? "active" : "")?>" href="senior_profile.php">My Profile</a>
            </li>
            <li>
                <a class="<?php echo ($page_id == "2" ? "active" : "")?>" href="senior_appointment.php">My Appointment</a>
            </li>
        </ul>
    <?php } else 
    { $stmt = $conn->prepare("SELECT profile_picture FROM tbl_handyman WHERE handyman_IC = ?");
        $stmt->bind_param("s", $_SESSION['handymanlogin']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
    ?>
    <div class="profile">
        <img src="../image/handyman/<?php echo $row['profile_picture'];?>" alt = "Profile Image">
    </div>
    <ul>
        <li>
            <a class="<?php echo ($page_id == "3" ? "active" : "")?>" href="handyman_profile.php" >My Profile</a>
        </li>
        <li>
            <a class="<?php echo ($page_id == "4" ? "active" : "")?>" href="handyman_timetable.php">My Timetable</a>
        </li>
    </ul>
    <?php } ?>           
</aside>