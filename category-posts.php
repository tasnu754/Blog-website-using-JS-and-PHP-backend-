<?php

include 'partials/header.php';

// fetch posts if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $result = mysqli_query($connection, $query);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>


    <header class="category_title">
    <h2>
    <?php
          // fetch category from categories table using category_id of post

          $category_id = $id;
          $category_query = "SELECT * FROM categories WHERE id=$id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          echo $category['title'];
          ?>
        </h2>
      </header>



      <section class="posts">
  <div class="container posts_container">
    <?php while ($post = mysqli_fetch_assoc($result)) : ?>
      <article class="post">
        <div class="post_thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" alt="Blog Post Image">
        </div>

        <div class="post_info">


          <h3><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" class="post_title"><?= $post['title'] ?></a></h3>

          <p class="post_body"> <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" class="post_title"><?= substr($post['body'], 0, 150) ?>...</a></p>

          <div class="post_author">
            <?php
            // fetch author from users table using author_id

            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";

            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            ?>
            <div class="post_author-avatar">
              <img src="./images/<?= $author['avatar'] ?>" alt="Author Avatar">
            </div>

            <div class="post_author-info">
              <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
              <small><?= date("M d, Y H:i", strtotime($post['date_time'])) ?></small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile ?>


  </div>
</section>




<?php

include 'partials/footer.php';

?>