<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form class="" action="search.php" method="post">
          <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                  <?php
                    //printing the categories from the database
                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection,$query);

                    while ($row=mysqli_fetch_assoc($select_all_categories)) {
                      $category_title = $row['cat_title'];

                      echo "<li>";
                      echo "<a href='#'>{$category_title}</a>";
                      echo "</li>";
                    }

                   ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

</div>
