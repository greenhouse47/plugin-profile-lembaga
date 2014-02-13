<?php
/*
Plugin Name: Profile Lembaga
Plugin URI: http://www.greenboxindonesia.com/
Description: Create profile lembaga with custom field post and metabox
Version: 1.0
Author: Albert Sukmono
Author URI: http://www.albert.sukmono.web.id
License: GPLv2
*/

add_action( 'init', 'create_lembaga' );

function create_lembaga() {
register_post_type( 'lembaga',
array(
	'labels' => array(
	'name' => 'Lembaga',
	'singular_name' => 'Lembaga',
	'add_new' => 'Add New',
	'add_new_item' => 'Add Lembaga',
	'edit' => 'Edit',
	'edit_item' => 'Edit Lembaga',
	'new_item' => 'New Lembaga',
	'view' => 'View',
	'view_item' => 'View Lembaga',
	'search_items' => 'Search Lembaga',
	'not_found' => 'No Lembaga found',
	'not_found_in_trash' =>
	'No Lembaga found in Trash',
	'parent' => 'Parent Lembaga'
	),
	
	'public' => true,
	'publicly_queryable' => true,
	'rewrite' => true,
	'show_ui' => true,
	'query_var' => true,
	'capability_type' => 'post',
	'menu_position' => 10,
	'supports' => array( 'title', 'editor', 'comments',	'thumbnail',  ),
	'taxonomies' => array( 'category', 'post_tag' ),
	'hierarchical' => true,
	'register_meta_box_cb' => 'lembaga_meta_box',
	'menu_icon' => plugins_url( 'images/favicon.png', __FILE__ ),
	'has_archive' => true	
)
);
}

add_action( 'admin_init', 'my_admin' );

function my_admin() {
add_meta_box( 
	'lembaga_meta_box',
	'Lembaga Details',
	'display_lembaga_meta_box',
	'lembaga', 'normal', 'high' 
	);
}

function display_lembaga_meta_box( $lembaga ) {
// metabox show on each post
$nama = esc_html( get_post_meta( $lembaga->ID, 'nama', true ) );
$tahun_jabatan = esc_html( get_post_meta( $lembaga->ID, 'tahun_jabatan', true ) );
$universitas = esc_html( get_post_meta( $lembaga->ID, 'universitas', true ) );
$jurusan = esc_html( get_post_meta( $lembaga->ID, 'jurusan', true ) );
$angkatan = esc_html( get_post_meta( $lembaga->ID, 'angkatan', true ) );
$komisariat = esc_html( get_post_meta( $lembaga->ID, 'komisariat', true ) );
$kota_asal = esc_html( get_post_meta( $lembaga->ID, 'kota_asal', true ) );
$alamat_sekarang = esc_html( get_post_meta( $lembaga->ID, 'alamat_sekarang', true ) );
$kontak = esc_html( get_post_meta( $lembaga->ID, 'kontak', true ) );
$email = esc_html( get_post_meta( $lembaga->ID, 'email', true ) );
$facebook = esc_html( get_post_meta( $lembaga->ID, 'facebook', true ) );
$twitter = esc_html( get_post_meta( $lembaga->ID, 'twitter', true ) );
$website = esc_html( get_post_meta( $lembaga->ID, 'website', true ) );

$user_rating = intval( get_post_meta( $lembaga->ID, 'user_rating', true ) );
?>
<table>
	<tr>
	<td style="width: 100%">Nama Lengkap</td>
	<td><input type="text" size="80" name="lembaga_nama" value="<?php echo $nama; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Tahun Jabatan/Periode</td>
	<td><input type="text" size="80" name="lembaga_tahun_jabatan" value="<?php echo $tahun_jabatan; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Universitas</td>
	<td><input type="text" size="80" name="lembaga_universitas" value="<?php echo $universitas; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Jurusan</td>
	<td><input type="text" size="80" name="lembaga_jurusan" value="<?php echo $jurusan; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Angkatan Mahasiswa</td>
	<td><input type="text" size="80" name="lembaga_angkatan" value="<?php echo $angkatan; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Asal Komisariat</td>
	<td><input type="text" size="80" name="lembaga_komisariat" value="<?php echo $komisariat; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Kota Asal</td>
	<td><input type="text" size="80" name="lembaga_kota_asal" value="<?php echo $kota_asal; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Alamat Sakarang</td>
	<td><input type="text" size="80" name="lembaga_alamat_sekarang" value="<?php echo $alamat_sekarang; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Kontak/ HP</td>
	<td><input type="text" size="80" name="lembaga_kontak" value="<?php echo $kontak; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Email</td>
	<td><input type="text" size="80" name="lembaga_email" value="<?php echo $email; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Facebook</td>
	<td><input type="text" size="80" name="lembaga_facebook" value="<?php echo $facebook; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Twitter</td>
	<td><input type="text" size="80" name="lembaga_twitter" value="<?php echo $twitter; ?>" /></td>
	</tr>
	<tr>
	<td style="width: 100%">Website</td>
	<td><input type="text" size="80" name="lembaga_website" value="<?php echo $website; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 150px">Rating</td>
		<td>
			<select style="width: 100px" name="lembaga_rating">
				<?php
				// Generate all items of drop-down list
				for ( $rating = 5; $rating >= 1; $rating -- ) {
				?>
				<option value="<?php echo $rating; ?>"
				<?php echo selected( $rating,
				$user_rating ); ?>>
				<?php echo $rating; ?> stars
				<?php } ?>
			</select>
		</td>
	</tr>
</table>
<?php }

add_action( 'save_post',
'add_lembaga_fields', 10, 2 );

function add_lembaga_fields( $lembaga_id,
$lembaga ) {
// Check post type for User Profile
if ( $lembaga->post_type == 'lembaga' ) {
// Store data in post meta table if present in post data

if ( isset( $_POST['lembaga_nama'] ) &&
$_POST['lembaga_nama'] != '' ) {
update_post_meta( $lembaga_id, 'nama',
$_POST['lembaga_nama'] );
}// Field nama lengkap
if ( isset( $_POST['lembaga_tahun_jabatan'] ) &&
$_POST['lembaga_tahun_jabatan'] != '' ) {
update_post_meta( $lembaga_id, 'tahun_jabatan',
$_POST['lembaga_tahun_jabatan'] );
}// Field tahun jabatan/ periode jabatan
if ( isset( $_POST['lembaga_universitas'] ) &&
$_POST['lembaga_universitas'] != '' ) {
update_post_meta( $lembaga_id, 'universitas',
$_POST['lembaga_universitas'] );
}// Field universitas
if ( isset( $_POST['lembaga_jurusan'] ) &&
$_POST['lembaga_jurusan'] != '' ) {
update_post_meta( $lembaga_id, 'jurusan',
$_POST['lembaga_jurusan'] );
}// Field jurusan
if ( isset( $_POST['lembaga_angkatan'] ) &&
$_POST['lembaga_angkatan'] != '' ) {
update_post_meta( $lembaga_id, 'angkatan',
$_POST['lembaga_angkatan'] );
}// Field angkatan
if ( isset( $_POST['lembaga_komisariat'] ) &&
$_POST['lembaga_komisariat'] != '' ) {
update_post_meta( $lembaga_id, 'komisariat',
$_POST['lembaga_komisariat'] );
}// Field komisariat
if ( isset( $_POST['lembaga_kota_asal'] ) &&
$_POST['lembaga_kota_asal'] != '' ) {
update_post_meta( $lembaga_id, 'kota_asal',
$_POST['lembaga_kota_asal'] );
}// Field kota asal
if ( isset( $_POST['lembaga_alamat_sekarang'] ) &&
$_POST['lembaga_alamat_sekarang'] != '' ) {
update_post_meta( $lembaga_id, 'alamat_sekarang',
$_POST['lembaga_alamat_sekarang'] );
}// Field alamat sekarang
if ( isset( $_POST['lembaga_kontak'] ) &&
$_POST['lembaga_kontak'] != '' ) {
update_post_meta( $lembaga_id, 'kontak',
$_POST['lembaga_kontak'] );
}// Field kontak
if ( isset( $_POST['lembaga_email'] ) &&
$_POST['lembaga_email'] != '' ) {
update_post_meta( $lembaga_id, 'email',
$_POST['lembaga_email'] );
}// Field email
if ( isset( $_POST['lembaga_facebook'] ) &&
$_POST['lembaga_facebook'] != '' ) {
update_post_meta( $lembaga_id, 'facebook',
$_POST['lembaga_facebook'] );
}// Field email
if ( isset( $_POST['lembaga_twitter'] ) &&
$_POST['lembaga_twitter'] != '' ) {
update_post_meta( $lembaga_id, 'twitter',
$_POST['lembaga_email'] );
}// Field email
if ( isset( $_POST['lembaga_website'] ) &&
$_POST['lembaga_website'] != '' ) {
update_post_meta( $lembaga_id, 'website',
$_POST['lembaga_website'] );
}// Field website

if ( isset( $_POST['lembaga_rating'] ) &&
$_POST['lembaga_rating'] != '' ) {
update_post_meta( $lembaga_id, 'user_rating',
$_POST['lembaga_rating'] );
}
}
}

add_filter( 'template_include',
'include_template_function', 1 );

// Load Template from themes
function include_template_function( $template_path ) {
if ( get_post_type() == 'lembaga' ) {
if ( is_single() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'single-lembaga.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/single-lembaga.php';
}
}
if ( is_archive() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'archive-lembaga.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/archive-lembaga.php';
}
}
}
return $template_path;
}

?>
