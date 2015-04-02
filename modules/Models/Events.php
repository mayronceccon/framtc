<?php

namespace Models;

use Library\Model\Model;

class Events extends Model
{	
	protected $_table 	 = "eventos";
	protected $_database = "framtc";
	protected $_model_row = "\Models\Row\EventsRow";
	protected $_primary_key = "id_evento";
	
	protected $_referenceMap = array(
		'pessoa' => array(
            'columns'           => 'pessoa',
            'refTableClass'     => 'Models\Pessoas',
            'refColumns'        => 'pessoa_id'
        ),
	);
}