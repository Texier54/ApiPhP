<?php
/**
 * File:  Categorie.php
 * Creation Date: 09/11/2017
 * description:
 *
 * @author: canals
 */

namespace catawich\models;


/**
 * Class Categorie
 * @package catawish\models
 */
class Categorie extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
