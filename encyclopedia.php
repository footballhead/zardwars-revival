<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?php
function printXML( $xml ) {
	foreach ( $xml->children() as $levOneChild ) { // get level one children from xml, store in $levOneChild
		$levOneChildName = $levOneChild->getName( ); // get the node name

		if ( $levOneChildName == "name" ) { // page title
			echo "\n<div class=\"pagehead\">" . $levOneChild . "</div>\n";
		} else if ( $levOneChildName == "description" ) { // description
			echo "<p>" . $levOneChild . "</p>\n";
		} else if ( $levOneChildName == "image" ) { // floating image
			if ( isset( $levOneChild[ "thumbnail" ] ) ) { // is there a thumbnail?
				echo "<div style=\"text-align:center; float:right; padding-right: 10px;\">";
				echo "<a href=\"http://www.majhost.com/gallery/Hooh251/Michael/ZardWars-Revival/" . $levOneChild . "\">";
				echo "<img src=\"images/" . $levOneChild[ "thumbnail" ] . "\">";
				echo "</a>";
				echo "<br>";
				echo "<span style=\"font-size:80%;\">Click to enlarge</span>";
				echo "</div>\n";
			} else if ( isset( $levOneChild[ "trigger" ] ) ) {
				echo "<img src=\"images/" . $levOneChild . "\" style=\"float:right;padding-right: 10px;\" >\n";
			} else { // just load the image
				echo "<img src=\"images/" . $levOneChild . "\" style=\"float:right;padding-right: 10px;\" >\n";
			}
		} else { // everything else
			$numOfChildren = $levOneChild->count();
			$index = 1;

			echo "<p>";
			if ( isset( $levOneChild["num"] ) ) {
				// num property used on attacks + specials to differentiate
				echo "<span class=\"b\">" . strtoupper( $levOneChildName ) . " #" . $levOneChild["num"] . "</span><br>\n";
			} else {
				// print the name as usual
				echo "<span class=\"b\">" . strtoupper( $levOneChildName ) . "</span><br>\n";
			}

			foreach ( $levOneChild->children() as $levTwoChild ) { // get leveel two nodes, from level one nodes, store in $levTwoChild
			    $levTwoChildName = "";
			    if ( isset( $levTwoChild["text"] ) ) {
			        $levTwoChildName = $levTwoChild["text"];
			    } else {
    				$levTwoChildName = $levTwoChild->getName();
    		    }

				//if ( $levTwoChildName == "Element" && $levOneChildName != "SPECIAL" && $levTwoChild != "Neutral" && $levOneChildName != "ATTACK" ) {
                if ( $levTwoChildName == "Element" ) {
                    // element coloring for non-special and non-attack related categories
                    $tmptxt = "<span class=\"b\">" . $levTwoChildName . ":</span> " . $levTwoChild . "\n";

                    $tmptxt = str_replace( "Fire", "<span class=\"Fire\">Fire</span>", $tmptxt );
                    $tmptxt = str_replace( "Water", "<span class=\"Water\">Water</span>", $tmptxt );
                    $tmptxt = str_replace( "Wind", "<span class=\"Wind\">Wind</span>", $tmptxt );
                    $tmptxt = str_replace( "Ice", "<span class=\"Ice\">Ice</span>", $tmptxt );
                    $tmptxt = str_replace( "Earth", "<span class=\"Earth\">Earth</span>", $tmptxt );
                    $tmptxt = str_replace( "Energy", "<span class=\"Energy\">Energy</span>", $tmptxt );
                    $tmptxt = str_replace( "Light", "<span class=\"Light\">Light</span>", $tmptxt );
                    $tmptxt = str_replace( "Darkness", "<span class=\"Darkness\">Darkness</span>", $tmptxt );

                    echo $tmptxt;
				} else if ( $levTwoChildName == "HP" || $levTwoChildName == "Base HP" || $levTwoChildName == "MP" || $levTwoChildName == "Base MP" ) {
					// HP + MP coloring
					echo "<span class=\"b\">" . $levTwoChildName . ":</span> <span class=\"" . $levTwoChildName . "\">" . $levTwoChild . "</span>\n";
				} else if ( $levOneChildName == "ELEMENTAL" ) {
					// element coloring for elemental defence list
					echo "<span class=\"" . $levTwoChildName . "\">" . $levTwoChildName . ":</span> " . $levTwoChild . "\n";
				} else {
					// just print the node name and value
					echo "<span class=\"b\">" . $levTwoChildName . ":</span> " . $levTwoChild . "\n";
				}

				if ( $numOfChildren != $index ) echo "<br>";
				$index = $index + 1;
			}

			echo "</p>\n";
		}
	}
}

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
			if( isset( $_GET[ "e" ] ) ) {
				$page = $_GET[ "e" ];

				// only keep what's after the final '/'
				$spot = strrpos( $page, "/" );
				if( $spot !== false ) {
					$page = substr( $page, $spot + 1 );
				}

				$page = filenameToProper( $page );
				echo "<title>ZardWars Revival Encyclopedia - {$page}</title>";
			} else {
				echo "<title>ZardWars Revival Encyclopedia</title>";
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
							$base = "encyclopedia/";
							$index = "{$base}_index.html";
							$error = "{$base}ERROR.html";
							$loadxml = false;

							if ( isset ( $_GET[ "e" ] ) ) {
								$page = $_GET[ "e" ];

								$xmlpath = "{$base}{$page}.xml"; //$page is defined line 5
								$page = "{$base}{$page}.html";
								if ( file_exists ( $xmlpath ) ) {
									$xmlfile = simplexml_load_file( $xmlpath );
									printXML( $xmlfile );
									$loadxml = true;
								} elseif ( file_exists ( $page ) != true ) {
									$page = $error;
								}
							} else {
								$page = $index;
							}

							if ( $loadxml != true ) include( $page );
						?>
					</td>
				</tr>
			</table>
			<div class="hseperator"></div>
			<div id="footer">Optimized for pretty much every recent browser.</div>
		</div>
	</body>
</html>
