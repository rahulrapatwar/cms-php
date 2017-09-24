<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
      </h1>

      <?php

      // testing the input of search bar
      if (isset($_POST['submit'])){
        $search = $_POST['search'];
        //echo $_POST['search'];

        // fetching posts from database on the basis of tags and displaying them
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $select_all_posts = mysqli_query($connection,$query);

        // iterating through the query result
        while ($row=mysqli_fetch_assoc($select_all_posts)) {
          //fetching details from each post
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];

          echo "<!-- First Blog Post -->";
          echo "<h2>";
          echo "<a href='#'>{$post_title}</a>";
          echo "</h2>";
          echo "<p class='lead'>";
          echo "by <a href='index.php'>{$post_author}</a>";
          echo "</p>";
          echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date} at 10:00 PM</p>";
          echo "<hr>";
          echo "<img class='img-responsive' src='{$post_image}' alt=''>";
          echo "<hr>";
          echo "<p>{$post_content}</p>";
          echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";

          echo "<hr>";

        }

      }


       ?>


    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?php include "includes/sidebar.php" ?>

  </div>
  <!-- /.row -->

  <hr>

  <!-- Footer -->
  <?php include "includes/footer.php" ?>
