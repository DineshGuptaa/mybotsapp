<?php
file_put_contents("fb_msg.txt", file_get_contents("php://input"));

$fb = file_get_contents("fb_msg.txt");
$fb = json_decode($fb);

$rid = $fb -> entry[0] ->messaging[0]-> sender-> id;

$token = "EAABpayZBvDXgBACMPV9KFmiqnAlZC0rH1nk7jkQ2iSZC2FgywCBmBbkjSgijdaroxmzPcJ472oWE6BqF0hzJRahNKkxpy5MR6nb6mreDObqioYv8eyWZBfjZAhEshUxK76tYBaw5Hii7n7s7lDWRUWuwjLhotwZBXrJtIZAGuUKXgZDZD";

$replies = array(
			"Hi Nice to meet you!",
			"How are you?",
			"Hope you enjoyed this!",
			"Like if you enjoyed this!"
			"Enjoy the BOT!:-)"
			);
$data = array(
		'recipient' => array('id' => "$rid"),
		'message' => array('text' => replies[rand(0,4)])
		);
$options = array(
			'http' => array(
						'method' => 'POST',
						'content' => json_encode($data),
						'header' => "Content-Type: application/json\n"
						)
			);
			
$context = stream_context_create($options);
file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$token");			