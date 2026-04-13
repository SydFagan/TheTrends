<?php get_header(); ?>
<main>

<?php
$count = 0;
if (have_posts()) :
  while (have_posts()) : the_post();
    $count++;

    if ($count === 1) {
        echo '<article class="featured">';
    } else {
        echo '<article class="small">';
    }
?>

    <h2><?php the_title(); ?></h2>
    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
    <a href="<?php the_permalink(); ?>">Read →</a>

</article>

<?php endwhile; endif; ?>

</main>
<?php get_footer(); ?>