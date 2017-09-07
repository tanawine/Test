<?php
$access_token = 'ceGK7OfWVezIqmYA6vaT8yKWGjIh3cWxp85z3eVukYddzOY30HArqOogToB25slO0jxOPrvaub9OSpjWFoKi0Gnwu50eNK812DPPfPKTLsnP01GhMa2ZjffTGNFb/EkXo1xSLLsQq8AjPv5x6QOO6gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
