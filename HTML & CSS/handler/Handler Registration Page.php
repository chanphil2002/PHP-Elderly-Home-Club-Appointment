<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=>
     <style>
        body {margin:0;}

        .navbar {
        overflow: hidden;
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
        height: 108.33px;
        }

        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
}

        .navbar a:hover {
        background: #ddd;
        color: black;
}

        .paragraph {
            position: absolute;
            width: 1074.07px;
            height: 80.97px;
            left: 492px;
            top: 347px; 

            font-family: Roboto;
            font-style: normal;
            font-weight: normal;
            font-size: 60px;
            line-height: 70px;
            letter-spacing: -0.02em;
            color: #000000;
        }
        </style> 
</head>
<body>
    <div class="navbar">
        <a href="#home">Handler Dashboard</a>
        <a href="#timetable">Timetable</a>
        <a href="#servicestatus">Service Status</a>
        <a href="#incomingrequest">Incoming Request</a>
        <a href="#registration">Registration</a>
        <a href="#manageprofile">Manage Profile</a>
    </div><br><br><br><br><br>
    <h1>Add Student</h1>
    <h2>Please fill in all * required field and double check before submitting the registration form<h2>
    <form action="" method="post">
        <table>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="txtFName"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="txtLName"></td>
        </tr> 
        <tr>
            <td>Gender</td>
            <td><input type="gender" name="txtGender"></td>
        </tr>
        <tr>
            <td>Identity Card No.</td>
            <td><input type="text" name="txtICNo"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="txtICNo"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="txtICNo"></td>
        </tr>
        <tr>    
            <td>Specialized skill<br></td></table>
            <td><select name="skill" id="skill">
                <option value="skillA">SkillA</option>
                <option value="skillB">SkillB</option>
                <option value="skillC">SkillC</option>
            </select>
            </td> <br><br>
        </tr>
        <tr>
             <td><input type="submit" name="txtSubmit"></td>
            </tr>