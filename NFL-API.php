<?php
/*
headlines;
http://api.espn.com/v1/sports/football/nfl/news/headlines/top/?teams=49er&limit=1&_accept=text%2Fxml&apikey=bpe3uy6pf2yt5dm2ph9ekn9v
http://api.espn.com/v1/sports/football/nfl/news/headlines/top/?teams=chicago+bears&limit=1&_accept=text%2Fxml&apikey=bpe3uy6pf2yt5dm2ph9ekn9v



video:
http://api.espn.com/v1/now/?leagues=nfl&content=video&teams=10&_accept=text%2Fxml&apikey=bpe3uy6pf2yt5dm2ph9ekn9v
http://api.espn.com/v1/now/?leagues=nfl&content=video&teams=10&_accept=text%2Fxml&apikey=bpe3uy6pf2yt5dm2ph9ekn9v

http://api.espn.com/v1/now/
?leagues=nfl
&content=video
&teams=10
&_accept=text%2Fxml
&apikey=bpe3uy6pf2yt5dm2ph9ekn9v

@Author Prince Adeyemi
*/


$response = _getSports();
echo '<pre>' . print_r($response) . '</pre>';

function _getSports(){

$url 	 = 'http://api.espn.com/v1/now/';
$data	 = '?leagues=nfl';
$data	.= '&content=video';
$data	.= '&teams=10';
$data	.= '&_accept=text/xml';
$data  	.= '&apikey=bpe3uy6pf2yt5dm2ph9ekn9v';

$postData = "$url$data";
$xmlObject = simplexml_load_file($postData);	

	
	foreach($xmlObject->feed->feedItem as $f){
		
echo '<pre>' . print_r($xmlObject, 1) . '</pre>'; exit();
	
		$headline 		= $f->headline;
		$mDate 			= $f->lastModified;
		$shortLink 		= $f->links->web->short->href;
		$videoLinkid	= $f->links->id;
		$description 	= $f->links->description;
		
		$imageName	 	= $f->images->imagesItem->name;
		$imageUrl		 	= $f->images->imagesItem->url;
		
		$caption		= $f->images->imagesItem->caption;
		$published		= $f->published;
		
		$videoId		= $f->video->videoItem->id;
		$videoIdTitle	= $f->video->videoItem->title;
		$videoHeadline	= $f->video->videoItem->headline;
		$videoDesc		= $f->video->videoItem->description;
		//$videoSource	= $f->links->source->mezzanine->href;
		$videoLink		= $f->links->web->href;
		
		
		$catID			= $f->categories->categoriesItem->id;
		$teamID			= $f->categories->categoriesItem->teamId;
		$teamDesc		= $f->categories->categoriesItem->description;
	
		//$defaultImg		= $f->posterImages->default->href;
		
		?>
			<div id="vegasnews09" style="width:70%">
				<h1 style="background:cyan;text-align:center; font: times; font-size: 1.2em; color:DarkSlateGray; border:1px dotted blue; border-radius:5px; width: 65%;"> <?php echo $headline; ?> </h1>
				<p><?php echo $videoLink; ?> </p>
				<p style="width:60%"><?php echo $videoDesc; ?> </p>
				<p style="width:60%;"><img src="<?php echo $imageUrl; ?>" alt="<?php echo $headline; ?>" width="90%" align="center"> </p>
				<p style="width:60%">Team: <?php echo $shortLink; ?> </p>
				<p style="width:60%">Team Desc: <?php echo $teamDesc; ?> </p>
				<video width="75%" controls">
					<source src="<?php echo $videoSource;?>" type="video/mp4">
					<source src="<?php echo $videoSource;?>" type="video/ogg">
					Your browser does not support the player, sorry
				</video>
				<p style="width:60%">Team Desc: <?php echo $videoLink; ?> </p>
				
				<p style="width:60%">Published :<em><?php echo $published; ?> </em></p>
			
			</div>
		<?php
	}	

}
?>
