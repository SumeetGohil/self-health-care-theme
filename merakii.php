<?php
function self_health_care_shortcode(){
  ?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <form  action="" method="post">
    <b>Name</b></br>
    <input type="text" name="name" placeholder="Enter Name" id="name"></br>
    <b>Mobile Number</b></br>
    <input type="text" name="contact"  placeholder="Enter Mobile Number"id="contact"></br>
    <b>Email</b></br>
    <input type="email" name="email"  placeholder="Enter Email"id="email"></br>
    <b>Occupation</b></br>
    <input type="text" name="occupation"  placeholder="Enter Occupation"id="occupation"></br>
    <b>Age</b></br>
    <input type="text" name="age"  placeholder="Enter age"id="age">yrs</br>
    <b>Gender</b></br>
    <input type="radio" name="gender" id="gender" value="male" checked> Male<br>
    <input type="radio" name="gender" id="gender" value="female"> Female<br>
    <b>Smoking</b></br>
    <input type="radio" name="smoking" id="smoking" value="yes" checked> Yes<br>
    <input type="radio" name="smoking" id="smoking" value="no"> No<br>
    <b>Alcohol Intact</b></br>
    <input type="radio" name="alcohol" id="alcohol" value="no"> No<br>
    <input type="radio" name="alcohol" id="alcohol" value="30-60ml">30ml - 60ml per day<br>
    <input type="radio" name="alcohol" id="alcohol" value="100ml">100ml per week<br>
    <b>Height</b></br>
      <input type="text" name="height"  placeholder="Enter height"id="height">
    <select name="height-unit">
    <option value="fts">fts</option>
    <option value="cms">cms</option>
  </select></br>
  <b>Weight</b></br>
    <input type="text" name="weight"  placeholder="Enter weight"id="weight">
  <select name="height-unit">
  <option value="fts">fts</option>
  <option value="cms">cms</option>
</select></br>
<input type="submit" value="submit" name="submit" id="submit">
  </form>
</body>
</html>
<?php
}
add_shortcode('self-health-care-info','self_health_care_shortcode');
