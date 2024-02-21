<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-AU-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- Our custom css -->
    <link rel="styleseet" href="asset/css/custom.css" />

</head>

<body>

    <!-- container -->
    <div class="container">

        <?php
        // Show page title
        echo "<div class='page-header'>
                <h1>{$page_title}</h1>
                </div>";
        ?>
</body>

</html>