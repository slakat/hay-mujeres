<div class="row social-box">
  <!--Facebook-->
  <div class="col-md-4 col-xs-4 col-facebook text-center">
    <a href="https://www.facebook.com/HayMujeresCL/">
    <p>Facebook</p>
    <i class="fa fa-facebook-official fa-2x wh"></i>
    <p><?php echo fbLikeCount('HayMujeresCL','1712946555617769','84653297841996e49267b666813c4075'); ?></p>
    </a>
  </div>
  <!--Twitter-->
  <div class="col-md-4 col-xs-4 col-twitter text-center">
    <a href="https://twitter.com/Hay_Mujeres">
    <p>Twitter</p>
    <i class="fa fa-twitter-square fa-2x wh"></i>
    <p><?php echo getTwitterFollowers('hay_mujeres'); ?></p>
    </a>
  </div>
  <!--YouTube-->
  <div class="col-md-4 col-xs-4 col-youtube text-center">
    <a href="https://www.youtube.com/channel/UCAX9s24yLwmStMidXvXJl2g">
    <p>YouTube</p>
    <i class="fa fa-youtube-play fa-2x wh"></i>
    <p><?php echo getYouTubeSubscribers(); ?></p>
    </a>
  </div>

</div>

<?php
//Get Twitter followers
function getTwitterFollowers($screenName = 'hay_mujeres')
{
    // some variables
    $consumerKey = 'pKaSBHPiuTch44wgUOXUyZzPw';
    $consumerSecret = '1SFDQn7OXGSIMCgchrdR41lEcDDgBw7cIkOqqJYsE0HfXzXyEu';
    $token = get_option('cfTwitterToken');
 
    // get follower count from cache
    $numberOfFollowers = get_transient('cfTwitterFollowers');
 
    // cache version does not exist or expired
    if (false === $numberOfFollowers) {
        // getting new auth bearer only if we don't have one
        if(!$token) {
            // preparing credentials
            $credentials = $consumerKey . ':' . $consumerSecret;
            $toSend = base64_encode($credentials);
 
            // http post arguments
            $args = array(
                'method' => 'POST',
                'httpversion' => '1.1',
                'blocking' => true,
                'headers' => array(
                    'Authorization' => 'Basic ' . $toSend,
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );
 
            add_filter('https_ssl_verify', '__return_false');
            $response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
 
            $keys = json_decode(wp_remote_retrieve_body($response));
 
            if($keys) {
                // saving token to wp_options table
                update_option('cfTwitterToken', $keys->access_token);
                $token = $keys->access_token;
            }
        }
        // we have bearer token wether we obtained it from API or from options
        $args = array(
            'httpversion' => '1.1',
            'blocking' => true,
            'headers' => array(
                'Authorization' => "Bearer $token"
            )
        );
 
        add_filter('https_ssl_verify', '__return_false');
        $api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
        $response = wp_remote_get($api_url, $args);
 
        if (!is_wp_error($response)) {
            $followers = json_decode(wp_remote_retrieve_body($response));
            $numberOfFollowers = $followers->followers_count;
        } else {
            // get old value and break
            $numberOfFollowers = get_option('cfNumberOfFollowers');
            // uncomment below to debug
            //die($response->get_error_message());
        }
 
        // cache for an hour
        set_transient('cfTwitterFollowers', $numberOfFollowers, 1*60*60);
        update_option('cfNumberOfFollowers', $numberOfFollowers);
    }
 
    return $numberOfFollowers;
}

//Get Facebook Likes Count of a page
function fbLikeCount($id,$appid,$appsecret){
  //Construct a Facebook URL
  $json_url ='https://graph.facebook.com/'.$id.'?access_token='.$appid.'|'.$appsecret.'&fields=likes';
  $json = file_get_contents($json_url);
  $json_output = json_decode($json);
 
  //Extract the likes count from the JSON object
  if($json_output->likes){
    return $likes = $json_output->likes;
  }else{
    return 0;
  }
}
function getYouTubeSubscribers(){
  $params = array('sslverify' => false,'timeout' => 60);
  $yt_data = wp_remote_get('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=UCAX9s24yLwmStMidXvXJl2g&key=AIzaSyD62FL53XDz8dGRfWj_bleuNekfNQuV0iU', $params);
  if (is_wp_error($yt_data) || '400' <= $yt_data['response']['code'] ) {
    echo ':C';
  } else {
  $response = json_decode( $yt_data['body'], true );
  $count = intval($response['items'][0]['statistics']['subscriberCount']);
  return $count;
  }
}
?>
