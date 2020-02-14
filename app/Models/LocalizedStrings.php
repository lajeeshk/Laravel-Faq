<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalizedStrings extends Model
{
    protected $fillable = ['string', 'count'];

    public static function track($key) {

        $localisedString = self::where('string',$key)->first();
        if($localisedString){
            
            $localisedString->count = $localisedString->count +1 ;
        }
        else {

            $localisedString = new LocalizedStrings();
            $localisedString->string = $key;      
        }

        $localisedString->save();

    }
}
