<?php

namespace App;
use App\Exceptions\CantBuyPornException;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','type'];
	
	public function buy(){
		if($this->type == "porn" && auth()->user()->age < 18 ){
			throw new CantBuyPornException();
		}
		return true;
	}
}
