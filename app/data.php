<?php
require_once('content.php');

$explain = array(
  '慶長7年(1602年)に築かれた現存12天守の
  一つ。城からは松山の町並みが一望できます。',
  '日本三古湯の１つで、万葉集にも記載されています。道後温泉周辺の町並みも風情があり松山の有名な観光地です。',
  '愛媛と広島をつなぐ7つの橋梁からなる海道です。瀬戸内海の潮風を浴びながらサイクリングができ、人気のサイクリングスポット
  です。',
  '夏目漱石の小説「坊っちゃん」の主人公が
  作中で乗っていたことから、この名前が命名されました。
  当時のデザインを復元し、現在も松山市内を走っています。',
  '愛媛は鯛の産地として有名で、松山鯛めしと宇和島鯛めしの2種類があります。
  訪れた際はぜい食べてほしい料理です。',
  '愛媛の郷土料理の一つ。ジャコをすり身にし、油で揚げたものです。できたてが熱々でおいしくおすすめです。',
  '愛媛の食べ物と言えばまず先に思い浮かべるのがみかんです。紅まどんな等の高級みかんの生産にも力を入れています。',
  '愛媛北部の今治市は国内最大規模のタオル生産地です。ブランド品として高い評価を得ています。',
  '発祥は江戸時代にまでさかのぼる松山の伝統菓子です。栗入りや抹茶味などいくつかの
  種類があります。',
  '坊ちゃん列車と同様に夏目漱石の小説「坊っちゃん」から命名された、愛媛の定番のお土産です。'
);

$matsuyama_castle = new content('松山城', '../../image/img1.png', '松山のシンボル', $explain[0], 'matsuyama_castle');
$dogo_onsen = new content('道後温泉', '../../image/img2.png', '日本最古の温泉', $explain[1], 'dogo_onsen');
$shimanami_kaido = new content('しまなみ海道', '../../image/img3.png', 'サイクリングにうってつけ', $explain[2], 'shimanami_kaido');
$botchan_train = new content('坊ちゃん列車', '../../image/img4.png', '特別な機関車', $explain[3], 'botchan_train');
$tai_meshi = new content('鯛めし', '../../image/img5.png', '愛媛といったら鯛', $explain[4], 'tai_meshi');
$jakoten = new content('じゃこ天', '../../image/img6.png', '愛媛の郷土料理', $explain[5], 'jakoten');
$orange = new content('みかん', '../../image/img7.png', '生産量日本2位', $explain[6], 'orange');
$imabari_towel = new content('今治タオル', '../../image/img8.png', '日本を代表するタオル', $explain[7], 'imabari_towel');
$tart = new content('タルト', '../../image/img9.png', '定番の土産', $explain[8], 'tart');
$botchan_dumpling = new content('坊ちゃん団子', '../../image/img10.png', '愛媛を代表する銘菓', $explain[9], 'botchan_dumpling');

$contents = array($matsuyama_castle, $dogo_onsen, $shimanami_kaido, $botchan_train, $tai_meshi, $jakoten, $orange, $imabari_towel, $tart, $botchan_dumpling);

