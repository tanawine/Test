<?php
$access_token = 'ceGK7OfWVezIqmYA6vaT8yKWGjIh3cWxp85z3eVukYddzOY30HArqOogToB25slO0jxOPrvaub9OSpjWFoKi0Gnwu50eNK812DPPfPKTLsnP01GhMa2ZjffTGNFb/EkXo1xSLLsQq8AjPv5x6QOO6gdB04t89/1O/w1cDnyilFU=';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		 $textUser = $event['message']['text'];
		 $text1 = "ไร";
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && strpos( $textUser,"ไร") ) { //&& $event['message']['text'] == "ไร"
			// Get text sent
			$text = "วิธีใช้งาน คือ 1.  ";
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
		} else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "สวัสดี") {
			// Get text sent
			$text = "ดีครัชชชชชชชช " . $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
	
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
		}
			//$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
	}
}
//echo "OK111";
echo "OK222222";
