<?

$menuAr = [
	'holod' => [
		'link'  => '/serv/rental-of-commercial-equipment/holod/',
		'title' => 'Аренда холодильного оборудования',
	],
	'tech'  => [
		'link'  => '/serv/rental-of-commercial-equipment/tech',
		'title' => 'Аренда технологического оборудования',
	],
	'warm'  => [
		'link'  => '/serv/rental-of-commercial-equipment/warm',
		'title' => 'Аренда теплового оборудования',
	],
	'expo'  => [
		'link'  => '/serv/rental-of-commercial-equipment/expo',
		'title' => 'Аренда выставочного оборудования',
	],
];

if(!isset($currPage)) {
	$currPage = null;
}
?>
<ul class="important-ul custom-ul_red-dot"><?
	foreach ($menuAr as $key => $item) {
		if($currPage == $key) {
			continue;
		}
		?>
        <li><a href="<?=$item['link']?>"><?=$item['title']?></a></li>
		<?
	}
	?>
</ul>


