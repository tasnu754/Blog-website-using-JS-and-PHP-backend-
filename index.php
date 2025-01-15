<?php
include 'partials/header.php';

// fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// fetch 9 posts from posts table

$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);

?>

<style>
  .cont{
    width: 74%;
    max-width: 1800px;
    margin: 0 auto;
  }

  .header-slider {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 700px;
    border-radius: 22%;
    border: 10px solid white;
    margin-top: 100px;
    z-index: 10;

    
  }

  .header-slider .slides {
    display: flex;
    width: 100%;
    height: 100%;  
    animation: slide 10s infinite;
  }

  .header-slider .slide {
    min-width: 100%;
    height: 100%;
  }

  .header-slider img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  @keyframes slide {
    0% {
      transform: translateX(0);
    }

    25% {
      transform: translateX(-100%);
    }

    50% {
      transform: translateX(-200%);
    }

    75% {
      transform: translateX(-300%);
    }

    100% {
      transform: translateX(0);
    }
  }
</style>


<section class="cont">
<header class="header-slider ">
  <div class="slides container">
    <div class="slide">
      <img src="images/1698160099473.jfif" alt="Photo 1">
    </div>
    <div class="slide">
      <img src="images/blogging-SMB.png.png" alt="Photo 2">
    </div>
    <div class="slide">
      <img src="images/blog3.png" alt="Photo 3">
    </div>
    <div class="slide">
      <img src="images/9841150-15911700.jpg" alt="Photo 4">
    </div>
  </div>
</header>
</section>


<?php if (mysqli_num_rows($featured_result) == 1): ?>
  <section class="featured">
    <div class="container featured_container">
      <div class="post_thumbnail">
        <img src="./images/<?= $featured['thumbnail'] ?>">
      </div>
      <div class="post_info">
        <?php
        // fetch category from categories table using category_id of post

        $category_id = $featured['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        ?>

        <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>"
          class="category_button"><?= $category['title'] ?></a>

        <h2 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>">
            <?= $featured['title'] ?>
          </a></h2>
        <p class="post_body"> <a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>">
            <?= substr($featured['body'], 0, 300) ?>...</a></p>

        <div class="post_author">
          <?php
          // fetch author from users table using author_id

          $author_id = $featured['author_id'];
          $author_query = "SELECT * FROM users WHERE id=$author_id";

          $author_result = mysqli_query($connection, $author_query);
          $author = mysqli_fetch_assoc($author_result);
          ?>
          <div class="post_author-avatar">
            <img src="./images/<?= $author['avatar'] ?>">
          </div>
          <div class="post_author-info">
            <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
            <small>
              <?= date("M d, Y H:i", strtotime($featured['date_time'])) ?>
            </small>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>


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