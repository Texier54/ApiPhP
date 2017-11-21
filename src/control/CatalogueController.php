<?php

	namespace lbs\control;

	class CatalogueController {

	private $container;

		public function  __construct(\Slim\Container $c)
		{
			$this->container = $c;
		}

		public function getCategorie($req, $resp, $args) {

			// ajoute ou remplace
			$rs= $resp->withHeader( 'Content-type', "application/json;charset=utf-8");

			$arr = new \lbs\models\Sandwich();

			$arr = array('type' => 'collection', 'meta' => [ 'count' => 3, 'locale' => 'fr-FR'], 'categorie' => $arr->get());
			$rs->getBody()->write(json_encode($arr));

			return $rs;
		}

		public function getDesc($req, $resp, $args) {

			// ajoute ou remplace
			$rs= $resp->withHeader( 'Content-type', "application/json;charset=utf-8");

			$arr = new \lbs\models\Sandwich();

			try {
				$arr = $arr->where('id', '=', $args['id'])->firstOrFail();
				$temp = array('type' => 'collection', 'meta' => ['locale' => 'fr-FR'], 'categorie' => $arr);
			}
			catch(\Exception $e)
			{
				$url = $this->container['router']->pathFor('catid', [ 'id' => $args['id'] ]);

				$temp = array("type" => "error", "error" => '404', "message" => "ressource non disponible : ".$url);
			}
			
			$rs->getBody()->write(json_encode($temp));

			return $rs;


		}
	}