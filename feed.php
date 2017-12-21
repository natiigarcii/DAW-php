<?php


$link = @mysqli_connect('localhost','root','admin', 'pibd'); 
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
	exit;
} 

include_once("funciones.php");
if(isset($_GET["type"])){
    if(strtolower($_GET["type"])=="atom"){
        //Inicializamos el documento
        header('Content-Type: text/xml; charset=utf-8', true);
		$xml = new DOMDocument("1.0", "UTF-8");
        $rss = $xml->createElement("feed");
        // Nodo nvl 1 = atom
		$rss_node = $xml->appendChild($rss);
		$rss_node->setAttribute("xmlns","http://www.w3.org/2005/Atom");
		$rss_node->appendChild($xml->createElement("title", "Pickel"));
        $rss_node->appendChild($xml->createElement("subtitle", "Portal de fotos y álbumes."));
            // Nodo nvl 2 --> atom
            $link_node = $rss_node->appendChild($xml->createElement("link"));
            $link_node->setAttribute("href","feed.php?type=atom");
            $link_node->setAttribute("rel","self");
            // Nodo nvl 2 --> atom
            $link2_node = $rss_node->appendChild($xml->createElement("link"));
            $link2_node->setAttribute("href","inicio.php");
            // Unico ID para cada feed
            $rss_node->appendChild($xml->createElement("id", uuid("urn:uuid:")));           $rss_node->appendChild($xml->createElement("updated", gmdate(DATE_RFC3339, strtotime(date("D, d M Y H:i:s T", time())))));
        // Query para obtener ultimas 5 fotos
        $res = mysqli_query($link,"
        SELECT a.titulo, a.idAlbum, f.titulo as titulo, f.idFoto as id, f.descripcion as descripcion, f.fecha as fecha, p.nomPais, f.album, f.fRegistro, nomUsuario as nombre, email as email
        FROM albumes a, fotos f, usuarios u, paises p
        WHERE a.idAlbum = f.album AND a.usuario = u.idUsuario AND p.idPais = a.pais
        ORDER BY fRegistro DESC
        LIMIT 5
        ");
        if($res){
            while ($row = mysqli_fetch_assoc( $res)){
                // Nodo item nvl 2 --> atom
                $item_node = $rss_node->appendChild($xml->createElement("entry")); 
                    // Nodos titulos y link nvl 3 --> item           
                    $title_node = $item_node->appendChild($xml->createElement("title", $row["titulo"])); 
                    $link_node = $item_node->appendChild($xml->createElement("link"));
                    $link_node->setAttribute("href","detalle_imagen.php?id=".$row["id"]);
				    $link2_node = $item_node->appendChild($xml->createElement("link"));
				    $link2_node->setAttribute("rel","alternate");
				    $link2_node->setAttribute("type","text/html");
				    $link2_node->setAttribute("href","detalle_imagen.php?id=".$row["id"]);
                    // Unico ID para item
                $id_link = $xml->createElement("id", uuid("urn:uuid:"));
                    $id_node = $item_node->appendChild($id_link);
                    // Fecha publicacion
                    $date_rfc = gmdate(DATE_RFC3339, strtotime($row["fecha"]));
                $pub_date = $xml->createElement("updated", $date_rfc);
                    $pub_date_node = $item_node->appendChild($pub_date);
				    // Nodo descripcion nvl 3 --> item
				    $summary_node = $item_node->appendChild($xml->createElement("summary"));
				    // Lo rellenamos con valores de la query
				    $summary_contents = $xml->createCDATASection(htmlentities($row["descripcion"]));
				    $summary_node->appendChild($summary_contents);
					$author_node = $item_node->appendChild($xml->createElement("author"));
                        // Nodo autor y nombre nvl 4 --> autor
                        $name_node = $author_node->appendChild($xml->createElement("name", $row["nombre"]));
                        $email_node = $author_node->appendChild($xml->createElement("email", $row["email"]));
				//ToDo: content, author
			}
        }
        echo $xml->saveXML();
    }
    else if(strtoupper($_GET["type"])=="RSS"){
        header('Content-Type: text/xml; charset=utf-8', true);
		$xml = new DOMDocument("1.0", "UTF-8");
		$rss = $xml->createElement("rss");
		$rss_node = $xml->appendChild($rss);
		$rss_node->setAttribute("version","2.0");
		$rss_node->setAttribute("xmlns:atom","http://www.w3.org/2005/Atom");
		$channel = $xml->createElement("channel");
		$channel_node = $rss_node->appendChild($channel);
		$channel_node->appendChild($xml->createElement("title", "Pickel"));
		$channel_node->appendChild($xml->createElement("description", "Tus imagenes en la nube."));
		$channel_node->appendChild($xml->createElement("link", "http://127.0.0.1"));
		$channel_node->appendChild($xml->createElement("language", "es-es"));
		$channel_node->appendChild($xml->createElement("lastBuildDate", gmdate(DATE_RFC2822, strtotime(date("D, d M Y H:i:s T", time())))));
		$channel_node->appendChild($xml->createElement("generator", "PHP DOMDocument"));
		$channel_atom_link = $xml->createElement("atom:link");
		$channel_atom_link->setAttribute("href","feed.php?type=atom"); //url of the feed
		$channel_atom_link->setAttribute("rel","self");
		$channel_atom_link->setAttribute("type","application/rss+xml");
		$channel_node->appendChild($channel_atom_link);
		$image_node = $channel_node->appendChild($xml->createElement("image"));
		$title_node = $image_node->appendChild($xml->createElement("title", "Pickel"));
		$url_node = $image_node->appendChild($xml->createElement("url", "logo.jpg"));
		$lnk_node = $image_node->appendChild($xml->createElement("link", "http://127.0.0.1"));
		 $res = mysqli_query($link,"
        SELECT a.titulo, a.idAlbum, f.titulo as titulo, f.idFoto as id, f.descripcion as descripcion, f.fecha as fecha, p.nomPais, f.album, f.fRegistro, nomUsuario as nombre, email as email
        FROM albumes a, fotos f, usuarios u, paises p
        WHERE a.idAlbum = f.album AND a.usuario = u.idUsuario AND p.idPais = a.pais
        ORDER BY fRegistro DESC
        LIMIT 5
        ");
        if ($res){
			while ($row = mysqli_fetch_assoc($res)){
				$item_node = $channel_node->appendChild($xml->createElement("item")); //create a new node called "item"
			    $title_node = $item_node->appendChild($xml->createElement("title", $row["titulo"])); //Add Title under "item"
			    $link_node = $item_node->appendChild($xml->createElement("link", "detalle_foto.php?id=".$row["id"])); //add link node under "item"
				//Unique identifier for the item (GUID)
			    $guid_link = $xml->createElement("guid", "detalle_foto.php?id=".$row["id"]);
			    $guid_link->setAttribute("isPermaLink","false");
			    $guid_node = $item_node->appendChild($guid_link);
			    //create "description" node under "item"
			    $description_node = $item_node->appendChild($xml->createElement("description"));
			    //fill description node with CDATA content
			    $description_contents = $xml->createCDATASection(htmlentities($row["descripcion"]));
			    $description_node->appendChild($description_contents);
			    //Published date
			    $date_rfc = gmdate(DATE_RFC2822, strtotime($row["fecha"]));
			    $pub_date = $xml->createElement("pubDate", $date_rfc);
			    $pub_date_node = $item_node->appendChild($pub_date);
			}
		}
		echo $xml->saveXML();
	} else error("Ha habido un problema al obtener el feed RSS", $urlLocal."indice.php");
    
} else error("Introduce un modo correcto de FEED (atom o RSS)",$urlLocal."indice.php");

?>