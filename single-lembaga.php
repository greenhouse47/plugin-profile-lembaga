<?php
/*
* Single Template Profile Lembaga
* Author: Albert Sukmono
* Description: "Template Plugin Lembaga" for view content post profile
*/

get_header(); ?>

<div class="container">
        <div class="row">
            <div class="span12">
                <?php if (function_exists('bootstrapwp_breadcrumbs_staff')) {
                bootstrapwp_breadcrumbs_staff();
                } ?>
            </div><!--/.span12 -->
        </div><!--/.row -->
		<div class="row content">
		<!-- Cycle through all posts -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- Display featured image in right-aligned floating div -->
			<div class="pic-profile">
				<div class="image-post-single"><?php the_post_thumbnail('full', array('class' => 'profile')); ?></div>
			</div>
			<div class="isi-profile">
			<!-- Display Title and Metabox -->
				<div class="deskripsi-profile"><?php the_title(); ?></div>
				<table>
					<tr>
						<td style="width: 47%">Nama Ketua</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'nama', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Tahun Jabatan/ Periode</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'tahun_jabatan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Universitas</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'universitas', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Jurusan</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'jurusan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Angkatan Mahasiswa</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'angkatan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Komisariat</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'komisariat', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Alamat Kantor</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'alamat_sekarang', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Kontak/ Telp</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kontak', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Email</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'email', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Facebook</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'facebook', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Twitter</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'twitter', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Website/ Blog</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'website', true ) ); ?></td>
					</tr>
				<!-- Display yellow stars based on rating -->
					<tr>
						<td style="width: 47%">Work Rating</td>
						<td>: <?php
								$nb_stars = intval( get_post_meta( get_the_ID(), 'user_rating', true ) );
								for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
									if ( $star_counter <= $nb_stars ) {
										echo '<img src="' . plugins_url( 'lembaga/images/icon.png' ) . '" />';
									} else {
										echo '<img src="' . plugins_url( 'lembaga/images/grey.png' ). '" />';
									}
								}
								?>
						</td>
					</tr>
				</table>
				<br />
				<!-- Display description "lembaga" contents -->
				<div class="deskripsi-profile">Sekilas</div>
				<div class="entry-content"><?php the_content(); ?></div>
				<br />
			</div><!--- /.isi-profile --->
			<?php endwhile; ?>
		</div><!-- .row content -->
</div><!--/.container -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
