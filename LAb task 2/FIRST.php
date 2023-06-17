<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodGroupErr = "";
    $name = $email = $dob = $gender = $degree = $bloodGroup = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Name validation
        if (empty($_POST["name"])) {
            $nameErr = "Name field is required.";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z][a-zA-Z. -]+$/", $name)) {
                $nameErr = "Name is invalid. It must start with a letter and can contain only letters, period, and dash.";
            } else if (str_word_count($name) < 2) {
                $nameErr = "Name must contain at least two words.";
            }
        }

        // Email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email field is required.";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email is invalid. Please enter a valid email address.";
            }
        }

        // Date of birth validation
        if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth field is required.";
        } else {
            $dob = test_input($_POST["dob"]);
            if (!preg_match("/^(0?[1-9]|1[0-2])\/(0?[1-9]|[12][0-9]|3[01])\/(19[5-9][0-9]|199[0-8])$/", $dob)) {
                $dobErr = "Date of Birth is invalid. Please enter a valid date in the format dd/mm/yyyy.";
            }
        }

        // Gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "Please select a gender.";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        // Degree validation
        if (empty($_POST["degree"]) || count($_POST["degree"]) < 2) {
            $degreeErr = "Please select at least two degrees.";
        } else {
            $degree = $_POST["degree"];
        }

        // Blood group validation
        if (empty($_POST["bloodGroup"])) {
            $bloodGroupErr = "Please select a blood group.";
        } else {
            $bloodGroup = test_input($_POST["bloodGroup"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h1>Registration Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class="error">* Required fields</span><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy" value="<?php echo $dob; ?>">
        <span class="error">* <?php echo $dobErr; ?></span><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="genderMale" name="gender" value="male" <?php if ($gender === "male") echo "checked"; ?>> Male
        <input type="radio" id="genderFemale" name="gender" value="female" <?php if ($gender === "female") echo "checked"; ?>> Female
        <input type="radio" id="genderOther" name="gender" value="other" <?php if ($gender === "other") echo "checked"; ?>> Other
        <span class="error">* <?php echo $genderErr; ?></span><br><br>

        <label for="degree">Degrees:</label>
        <input type="checkbox" id="degree1" name="degree[]" value="SSC" <?php if (in_array("SSC", $degree)) echo "checked"; ?>> SSC
        <input type="checkbox" id="degree2" name="degree[]" value="HSC" <?php if (in_array("HSC", $degree)) echo "checked"; ?>> HSC
        <input type="checkbox" id="degree3" name="degree[]" value="BSc" <?php if (in_array("BSc", $degree)) echo "checked"; ?>> BSc
        <input type="checkbox" id="degree4" name="degree[]" value="MSc" <?php if (in_array("MSc", $degree)) echo "checked"; ?>> MSc
        <span class="error">* <?php echo $degreeErr; ?></span><br><br>

        <label for="bloodGroup">Blood Group:</label>
        <select id="bloodGroup" name="bloodGroup">
            <option value="" <?php if ($bloodGroup === "") echo "selected"; ?>>Select</option>
            <option value="A+" <?php if ($bloodGroup === "A+") echo "selected"; ?>>A+</option>
            <option value="A-" <?php if ($bloodGroup === "A-") echo "selected"; ?>>A-</option>
            <option value="B+" <?php if ($bloodGroup === "B+") echo "selected"; ?>>B+</option>
            <option value="B-" <?php if ($bloodGroup === "B-") echo "selected"; ?>>B-</option>
            <option value="AB+" <?php if ($bloodGroup === "AB+") echo "selected"; ?>>AB+</option>
            <option value="AB-" <?php if ($bloodGroup === "AB-") echo "selected"; ?>>AB-</option>
            <option value="O+" <?php if ($bloodGroup === "O+") echo "selected"; ?>>O+</option>
            <option value="O-" <?php if ($bloodGroup === "O-") echo "selected"; ?>>O-</option>
        </select>
        <span class="error">* <?php echo $bloodGroupErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
