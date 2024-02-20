<?php
get_header();
?>

<main id="main">
	<article>

		<?php the_title( '<div class="title"><h1>', '</h1></div>' ); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="toggle">
				<?php
				if ( get_field( 'careers_advising_link' ) ) {
					$advising = get_field( 'careers_advising_link' );
				}
				echo do_shortcode( '[uri-careers-toggle advising_link="' . $advising . '"]' );
				?>
			</div>

			<div class="banner-area">
				<div class="banner-background use-banner-width">
					<div class="banner-text">
						<h2>Connect With Your Career Advisor</h2>
						<p class="banner-p">At the <a href="https://web.uri.edu/career/">Center for Career and Experiential Education (CCEE)</a>, your Career Education Specialist can introduce you to career paths and offer strategies to achieve your goals. To make an appointment, <a href="https://web.uri.edu/starfish/resources-for-students/">login to Starfish</a>.</p>

						<?php
						if ( get_field( 'advisor_page' ) ) {
							?>
							<span class="banner-button">
								<a href="<?php $advisor_page; ?>">MEET YOUR CAREER EDUCATION SPECIALIST</a>
							</span>
							<?php
						}
						?>

					</div>
				</div>
			</div>

			<?php
			if ( get_field( 'industry_a_name' ) || get_field( 'industry_b_name' ) || get_field( 'industry_c_name' ) ) {
				?>

			<div class="career-data">

				<h2 class="jobs">What Can You Do With This Major?</h2>
				<p>We gathered data from our past graduates and found that most URI alumni who majored in <?php the_title(); ?> go on to work in these industries among others. </p>

				<?php
				if ( function_exists( 'uri_cl_shortcode_tabs' ) ) {
					if ( get_field( 'industry_a_name' ) ) {
						$industry_a = get_field( 'industry_a_name' );

						if ( get_field( 'industry_a_entry_jobs' ) ) {
							$industry_a_jobs .= uri_careers_table_template_entry( 'industry_a_entry_jobs' );
						}
						if ( get_field( 'industry_a_experienced_jobs' ) ) {
							$industry_a_jobs .= uri_careers_table_template_experienced( 'industry_a_experienced_jobs' );
						}
						$build_shortcode = '[cl-tab]<h2 class="career-name">' . $industry_a . '</h2>' . $industry_a_jobs . '[/cl-tab]';
					}
					if ( get_field( 'industry_b_name' ) ) {
						$industry_b = get_field( 'industry_b_name' );

						if ( get_field( 'industry_b_entry_jobs' ) ) {
							$industry_b_jobs = uri_careers_table_template_entry( 'industry_b_entry_jobs' );
						}
						if ( get_field( 'industry_b_experienced_jobs' ) ) {
							$industry_b_jobs .= uri_careers_table_template_experienced( 'industry_b_experienced_jobs' );
						}

						$build_shortcode .= '[cl-tab]<h2 class="career-name">' . $industry_b . '</h2>' . $industry_b_jobs . '[/cl-tab]';
					}
					if ( get_field( 'industry_c_name' ) ) {
						$industry_c = get_field( 'industry_c_name' );

						if ( get_field( 'industry_c_entry_jobs' ) ) {
							$industry_c_jobs .= uri_careers_table_template_entry( 'industry_c_entry_jobs' );
						}
						if ( get_field( 'industry_c_experienced_jobs' ) ) {
							$industry_c_jobs .= uri_careers_table_template_experienced( 'industry_c_experienced_jobs' );
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
			}
			?>

			<?php // if ( get_field( 'skills' ) ) { ?>
				<div class="skills-panel">
					<div class="skills-list">
						<h2 class="bigger-header" id="skills">What Do Employers Look for in a Candidate?</h2>
						<?php
						$all_skills = uri_careers_render_skills();
						echo $all_skills;
						?>
					</div>
				</div>
				<?php
				// }
				?>

			<?php
			if ( function_exists( 'uri_cl_shortcode_breakout' ) ) {
				if ( get_field( 'featured_story' ) ) {
					$story = get_field( 'featured_story' );

					echo do_shortcode( '[cl-breakout]<h2 class="bigger-header">Student/Alumni Story</h2>' . $story . '[/cl-breakout]' );
				}
			}
			?>

			<div class="banner-area">
				<div class="banner-background use-banner-width">
					<div class="banner-text">
						<h2>Connect With LinkedIn</h2>
						<p class="banner-p">More than 100,000 URI students and alumni have a profile on LinkedIn, which is the largest professional networking platform online. To find URI alumni in your target field, use the Alumni Finder.</p>
						<span class="banner-button">
							<a href="https://www.linkedin.com/">Join LinkedIn</a>
						</span>
					</div>
				</div>
			</div>
	</article>
</main>

<?php get_footer(); ?>
