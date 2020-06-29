<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Edocument extends Model
{



    protected $table = 'edocuments';

    public function SubstringName($name,$extension)
    {
    	
    }

    public function CountNameDuplicate($name)
    {

    		$new_name=substr($name, 9, -3);

    		$docs_existing = DB::table('edocuments')->get();
    		$nbr_duplicate = 0;

    		foreach ($docs_existing as $doc_existing) {
    			$old_name = substr($doc_existing, 9, 3);
    			$check = DB::table('edocuments')->where($old_name,'=',$new_name)->exist();

    			if ($check) {
    				$nbr_duplicate++;
    			}
    		}
    		
    		return $nbr_duplicate;
    	

    	

    }
}
