<section id='section-three'>
  <div id='sec-three-inner'>
    <h1 id='sec-three-title'><?php the_field('section_three_title');?></h1><!-- sec-three-title -->
    <span class='double-line'></span><!-- double-line -->
    <div id='sec-three-content' class='content'>
      <div class='sec-three-col'>
        <?php the_field('section_three_col_one');?>
      </div><!-- sec-three-col -->
      <div class='sec-three-col'>
        <?php the_field('section_three_col_two');?>
      </div><!-- sec-three-col -->
    </div><!-- sec-three-content -->
    <?php get_template_part('page-templates/includes/template', 'awards_component');?>
  </div><!-- sec-three-inner -->
</section><!-- section-three -->