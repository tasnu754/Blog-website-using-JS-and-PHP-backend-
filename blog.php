<?php

include 'partials/header.php';

// fetch 9 posts from posts table

$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query($connection, $query);

?>



    <section class="search_bar">
        <form class="container search_bar-container" action="" method="GET">
          <div>
            <i class="uil uil-search"></i>
            <input type="search" name="" placeholder="Search">
          </div>
          <button type="submit" class="btn">Go</button>
        </form>
      </section>


<?php if (mysqli_num_rows($posts) > 0): ?>
<section class="posts">
  <div class="container posts_container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post_thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" alt="Blog Post Image">
        </div>

        <div class="post_info">
          <?php
          // fetch category from categories table using category_id of post

          $category_id = $post['category_id'];
          $category_query = "SELECT * FROM categories WHERE id=$category_id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          ?>

          <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category_button"><?= $category['title'] ?></a>

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

<?php else : ?>
<div class="alert_message error lg">
    <p>No posts found for this category.</p>
</div>
<?php endif ?>





<section class="category_buttons">
  <div class="container category_buttons-container">
    <?php
    $all_categories_query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $all_categories_query);
    ?>

    <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
      <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
    <?php endwhile ?>

  </div>
</section>


<?php

include 'partials/footer.php';

?>