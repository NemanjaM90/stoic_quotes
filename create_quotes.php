<?php

//includ database and object files
include_once 'configuration/database.php';
include_once 'objects/quote.php';
include_once 'objects/category.php';

//get database connection
$database = new Database();
$db = $database->getConnection();

//pass connection to objects
$quotes = new Quote($db);
$philosophers = new Category($db);

//set page header
$page_title = "Create Quotes";
include_once "layout_header.php";

// Contents will be here


// this code will render a button
echo "<div class='right-button-margine'>
        <a href='index.php' class='btn btn-pull-right'>Read Quotes</a>
        <?div>";

?>
<?php
//When user enter values and when enter submit button values will be sent via POST request, and the code will save it to database
if ($_POST) {

    //set quote values
    $quote->quote = $_POST['quote'];
    $quote->philosopher = $_POST['philosopher'];
    $quote->category_id = $_POST['category_id'];

    //Create quote
    if ($quote->create()) {
        echo "<div class='alert alert-success'>Quote is created!</div>";
    }


    //if unable to create quote tell user
    else {
        echo "<div class='alert alert-danger'>Unable to create quote!</div>";
    }
}
?>

<!-- HTML form for creating quotes -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" metod="post">
    <table class='table table-hover table-responsive table-boarded'>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" class="form-control"></td>
        </tr>
        <tr>
            <td>Quote</td>
            <td><textarea name="quote" id="" cols="30" rows="10" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <?php
                //read the quote categories from database
                $stmt = $category->read();

                // put them in a select drop-down
                echo "<select class='form-control' name='category_id'>";
                echo "<option>Select category...</option>";

                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_category);
                    echo "<option value='{$id}'>{$name}</option>";
                }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

    </table>
</form>

<?php

//set page footer
include_once "layout_footer.php";

?>