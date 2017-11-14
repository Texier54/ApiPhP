<?php

	namespace lbs\control;

	class CatalogueController {


		public function getCategorie($req, $resp, $args) {

			// ajoute ou remplace
			$rs= $resp->withHeader( 'Content-type', "application/json;charset=utf-8") ;

			$arr = array('type' => 'collection', 'meta' => [ 'count' => 3, 'locale' => 'fr-FR'], 'categorie' => [ ['id' => 1, 'nom' => 'tradi', 'desc' => "le sandwish classique"], ['id' => 2, 'nom' => 'bio', 'desc' => "le sandwish bio et local"], ['id' => 3, 'nom' => 'veggie', 'desc' => "le sandwish végétal"] ]);

			$rs->getBody()->write(json_encode($arr));

			return $rs;
		}

		public function getDesc($req, $resp, $args) {

			// ajoute ou remplace
			$rs= $resp->withHeader( 'Content-type', "application/json;charset=utf-8") ;

			$arr = array('type' => 'collection', 'meta' => [ 'count' => 3, 'locale' => 'fr-FR'], 'categorie' => [ ['id' => 1, 'nom' => 'tradi', 'desc' => "le sandwish classique"], ['id' => 2, 'nom' => 'bio', 'desc' => "le sandwish bio et local"], ['id' => 3, 'nom' => 'veggie', 'desc' => "le sandwish végétal"] ]);

			$id = $args['id'];
			$temp = array('type' => 'collection', 'meta' => ['locale' => 'fr-FR'], 'categorie' => $arr['categorie'][$id -1]);

			$rs->getBody()->write(json_encode($temp));

			return $rs;


		}
	}