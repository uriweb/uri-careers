<?php
get_header();
?>

<main id="main">
	<article>

		<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if ( get_field( 'careers_advising_link' ) ) {
			$advising = get_field( 'careers_advising_link' );
		}
				echo do_shortcode( '[uri-careers-toggle advising_link="' . $advising . '"]' );
		?>

			<div class="career-data">

				<h2 class="jobs">Top Careers for URI Graduates in <?php the_title(); ?> </h2>
				<p>What can you do with this major? We gathered data from our past graduates and found that most URI alumni with this major go on to work in these industries: </p>

				<?php
				if ( function_exists( 'uri_cl_shortcode_tabs' ) ) {
					if ( get_field( 'industry_a_name' ) ) {
						$industry_a = get_field( 'industry_a_name' );

						if ( get_field( 'industry_a_entry_jobs' ) || get_field( 'industry_a_experienced_jobs ' ) ) {
							$industry_a_jobs = uri_careers_table_template( 'industry_a_entry_jobs', 'industry_a_experienced_jobs' );
						}
						$build_shortcode = '[cl-tab]<h2 class="career-name">' . $industry_a . '</h2>' . $industry_a_jobs . '[/cl-tab]';
					}
					if ( get_field( 'industry_b_name' ) ) {
						$industry_b = get_field( 'industry_b_name' );

						if ( get_field( 'industry_b_entry_jobs' ) || get_field( 'industry_b_experienced_jobs ' ) ) {
							$industry_b_jobs = uri_careers_table_template( 'industry_b_entry_jobs', 'industry_b_experienced_jobs' );
						}
						$build_shortcode .= '[cl-tab]<h2 class="career-name">' . $industry_b . '</h2>' . $industry_b_jobs . '[/cl-tab]';
					}
					if ( get_field( 'industry_c_name' ) ) {
						$industry_c = get_field( 'industry_c_name' );

						if ( get_field( 'industry_c_entry_jobs' ) || get_field( 'industry_c_experienced_jobs ' ) ) {
							$industry_c_jobs = uri_careers_table_template( 'industry_c_entry_jobs', 'industry_c_experienced_jobs' );
						}
						$build_shortcode .= '[cl-tab]<h2 class="career-name">' . $industry_c . '</h2>' . $industry_c_jobs . '[/cl-tab]';
					}
					echo do_shortcode( '[cl-tabs]' . $build_shortcode . '[/cl-tabs]' );
				}
				?>
			</div>


			<?php
			if ( get_field( 'employers' ) || ( get_field( 'grad_schools' ) ) ) {
				if ( function_exists( 'uri_cl_shortcode_breakout' ) ) {
					$alumni_content = uri_careers_render_alumni_data();
					echo do_shortcode( '[cl-breakout]' . $alumni_content . '[/cl-breakout]' );
				}
			}
			?>


			<?php if ( get_field( 'skills' ) ) { ?>
				<div class="skills-panel">
					<div class="skills-list">
						<h2 class="bigger-header">What Employers Look For in a Candidate</h2>
						<?php
						$all_skills = uri_careers_render_skills();
						echo $all_skills;
						?>
					</div>
				</div>
				<?php
			}
			?>




			<?php
			if ( function_exists( 'uri_cl_shortcode_breakout' ) ) {
				if ( get_field( 'featured_story' ) ) {
					$story = get_field( 'featured_story' );

					echo do_shortcode( '[cl-breakout]<h2 class="bigger-header">Student/Alumni Story</h2>' . $story . '[/cl-breakout]' );
				}
			}
			?>

			<?php
			if ( function_exists( 'uri_cl_shortcode_card' ) && function_exists( 'uri_cl_shortcode_breakout' ) ) {
				$cards = uri_careers_render_cards();
				echo do_shortcode( '[cl-breakout]' . $cards . '[/cl-breakout]' );
			}
			?>
	</article>
</main>

<?php get_footer(); ?>
