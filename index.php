<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?php

function filenameToProper ($filename) {
	// incoming filename is probably like 'the_only_thread'
	// we want to turn it into 'The Only Thread' and return that
	
	// init what we are going to return
	$res = "";
	
	// break up the word based on underscores (_)
	$words = explode ("_", $filename);
	
	// for each word change the first letter to uppercase and add it to the result
	foreach ($words as &$iter) {
		$blah = ucfirst ($iter);
		$res .= $blah . " ";
	}
	
	// return the result
	return $res;
}

?>

<html>

	<head>
		<?php
			if ( isset( $_GET[ "p" ] ) ) {
				//ADD STRING CORRECTING
				$page = $_GET[ "p" ];
				$formatted = filenameToProper ($page);
				echo "<title>ZardWars Revival - {$formatted}</title>";
			} else {
				echo "<title>ZardWars Revival - For all your ZardWars needs!</title>";
			}
		?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="description" content="ZardWars Revival provides great information and a fabulous Encyclopedia for Artix Entertainment's ZardWars.">
		<meta name="keywords" content="zardwars,zard,wars,encyclopedia,community,weapons,armour,armor,zardbane,revival">
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-19813272-1']);
			_gaq.push(['_trackPageview']);

			(function() {
    			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	
	<body>
		<div id="container">
	        <div id="header">
	        	<div id="title">ZardWars Revival</div>
				<div id="subtitle">For all your ZardWars needs!</div>
			</div>
			<div class="hseperator"></div>
			<table id="mainTable">
				<tr>
					<?php include("sidebar.html"); ?>
					<td id="vseperator"></td>
					<td id="main">
						<?php
							$base = "pages/";
							$home = "default";
							$index = "{$base}{$home}.html";
							if ( isset ( $_GET[ "p" ] ) ) {
								$page = $_GET[ "p" ];
								$page = "{$base}{$page}.html";
								if ( file_exists ( $page ) != true ) {
									$page = $index;
								}
							} else {
								$page = $index;
							}
							include( $page );
						?>
					</td>
				</tr>
			</table>
			<div class="hseperator"></div>
			<div id="footer">Fork me on GitHub: <a href="https://github.com/footballhead/zardwars-revival">@footballhead/zardwars-revival</a></div>
		</div>
	</body>
	
</html>
