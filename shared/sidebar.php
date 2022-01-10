<style>
    aside{
    background-image: linear-gradient(#ff9898, #ffc7c7);
    position: relative;
    width: 300px;
    height: 625px;
    margin-left: 225px;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;    
    }
    aside .profile{
        margin-bottom: 30px;
        text-align: center;
    }
    aside .profile img{
        padding-top: 10px;
        display: block;
        width: 200px;
        height: 200px;
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
    }
</style>

<aside>
    <div class="profile">
        <img src="profile_pic.png">
    </div>
    <?php if ($page_id < 4) { ?>
        <ul>    
            <li>
                <a class="<?php echo ($page_id == "1" ? "active" : "")?>" href="senior_profile.php">My Profile</a>
            </li>
            <li>
                <a class="<?php echo ($page_id == "2" ? "active" : "")?>" href="senior_appointment.php">My Appointment</a>
            </li>
            <li>
                <a class="<?php echo ($page_id == "3" ? "active" : "")?>" href="senior_notification.php">Notifications</a>
            </li>
        </ul>
    <?php } else { ?>
    <ul>
        <li>
            <a class="<?php echo ($page_id == "4" ? "active" : "")?>" href="handyman_profile.php" >My Profile</a>
        </li>
        <li>
            <a class="<?php echo ($page_id == "5" ? "active" : "")?>" href="handyman_timetable.php">My Timetable</a>
        </li>
        <li>
            <a class="<?php echo ($page_id == "6" ? "active" : "")?>" href="handyman_notification.php">Notifications</a>
        </li>
    </ul>
    <?php } ?>           
</aside>