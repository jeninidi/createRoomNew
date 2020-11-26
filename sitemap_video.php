<?php
define('WP_USE_THEMES', false);
require('./wp-blog-header.php');

header("content-type: text/xml");
header("HTTP/1.1 200 OK");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"> 
<?php
	
$args = array(
'post_type'		=> 'video',
'numberposts'	=> -1,
'post_status'	=> 'publish' );
$myposts = get_posts( $args );

if(!empty($myposts))
{
	foreach($myposts as $mypost)
	{
		$video_url=get_post_meta($mypost->ID,'video_url',true);
		if(empty($video_url)) continue;
		$video_thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id($mypost->ID), "video-thumbnail");
	
		?>
		   <url> 
		     <loc><?=get_permalink($mypost->ID);?></loc>
		     <video:video>
		       <video:thumbnail_loc><?=$video_thumbnail[0];?></video:thumbnail_loc> 
		       <video:title><?=$mypost->post_title;?></video:title>
		       <video:description><?=htmlspecialchars(wp_strip_all_tags(apply_filters('the_content',$mypost->post_content)));?></video:description>
		       <video:content_loc><?=htmlspecialchars($video_url);?></video:content_loc>
		       <video:player_loc allow_embed="yes" autoplay="ap=1"><?=htmlspecialchars($video_url);?></video:player_loc>
		       <video:publication_date><?=date('c',strtotime($mypost->post_date));?></video:publication_date>
		       <video:requires_subscription>no</video:requires_subscription>
		       <video:uploader info="https://vimeo.com/hamstodk">Hamsto Official</video:uploader>
		     </video:video> 
		   </url>
		<?php
		
	}
}
?>
</urlset>
