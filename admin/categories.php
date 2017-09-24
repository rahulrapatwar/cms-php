<?php ob_start(); ?>
<!-- including admin_header.php -->
<?php include "includes/admin_header.php" ?>
<div id="wrapper">

  <!-- Navigation -->
  <!-- including admin_navigation.php -->
  <?php include "includes/admin_navigation.php" ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to ADMIN
            <small>Author</small>
          </h1>
          <!-- add category form -->
          <div class="col-xs-6">
            <!-- code for adding the category received from the form to the database -->
            <?php
              //checking if category received from the form
              if(isset($_POST['submit'])){
                $category_title = $_POST['category'];
                //echo "category received from the form";
                //echo $category_title;
                if ($category_title=="" || empty($category_title)) {
                  echo "This field should not be empty";
                } else {
                  $query = "INSERT INTO categories(cat_title) ";
                  $query .= "VALUES ('{$category_title}')";
                  echo $query;
                  $result = mysqli_query($connection, $query);
                  //checking query submission status
                  if (!$result) {
                    die("Submission Failed" . mysqli_error($connection));
                  }
                }

              }


             ?>
            <form action="" method="post">
              <div class="form-group">
                <label for="categoryTitle">Add Category</label>
                <input type="text" name="category" class="form-control" id="categoryTitle" placeholder="Add Category">
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <hr>
            <!-- form for updating the category -->
            <?php
            if (isset($_GET['edit'])) {
              $category_id = $_GET['edit'];

              $query = "SELECT cat_title FROM categories ";
              $query .= "WHERE cat_id='{$category_id}'";
              $result = mysqli_query($connection,$query);
              while ($row=mysqli_fetch_assoc($result)) {
                $category_title = $row['cat_title'];
                echo "<form action='' method='post'>";
                  echo "<div class='form-group'>";
                    echo "<label for='categoryTitle'>Edit Category</label>";
                    ?>
                    <input type='text' name='category' value='<?php if(isset($category_title)){echo $category_title;} ?>' class='form-control' id='categoryTitle' placeholder='Edit Category'>
                    <?php
                  echo "</div>";
                echo "<button type='submit' class='btn btn-primary' name='submit'>Edit</button>";
                echo "</form>";
              }
            }

             ?>
          </div>
          <!-- add category form end -->
          <!-- displaying categories -->
          <div class="col-xs-6">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category Title</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //printing the categories from the database
                  $query = "SELECT * FROM categories";
                  $select_all_categories = mysqli_query($connection,$query);

                  while ($row=mysqli_fetch_assoc($select_all_categories)) {
                    $category_id = $row['cat_id'];
                    $category_title = $row['cat_title'];

                    echo "<tr>";
                    echo "  <td>{$category_id}</td>";
                    echo "  <td>{$category_title}</td>";
                    echo "  <td><a href='categories.php?delete={$category_id}'>DELETE</a></td>";
                    echo "  <td><a href='categories.php?edit={$category_id}'>EDIT</a></td>";
                    echo "</tr>";
                  }

                  //checking if delete functionality envoked and deleting the category
                  if (isset($_GET['delete'])) {
                    $delete_cat_id = $_GET['delete'];

                    // deleting the category from the database
                    if ($delete_cat_id=="" || empty($delete_cat_id)) {
                      echo "No category id received";
                    } else {
                      $query = "DELETE FROM categories ";
                      $query .= "WHERE cat_id='{$delete_cat_id}'";
                      echo $query;
                      $result = mysqli_query($connection, $query);
                      //checking query submission status
                      if (!$result) {
                        die("Deletion Failed" . mysqli_error($connection));
                      }else {
                        header("Location: categories.php");
                      }
                    }
                  }
                 ?>
              </tbody>
            </table>
          </div>
          <!-- displaying categories end -->
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- including admin_footer.php -->
<?php include "includes/admin_footer.php" ?>
