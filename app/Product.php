<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\CurrencyController as Converter;

use Request;
use Cookie;


class Product extends Model
{
    protected $table = "products";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name','slug','description','price','image'
    ];
    
    public function getPriceAttribute($value)
    {
        if(isset($_COOKIE['CURRENCY']))
        {
        $curr = $_COOKIE['CURRENCY'];
        }
        else {
        $curr = '';    
        }
        //$curr = Cookie::get('CURRENCY');
        if($curr != 'CAD' && $curr != '')
        {
        $currency = new Converter();
        $to = $_COOKIE['CURRENCY'];
        $result = $currency->initiateSmsGuzzle($value, $to);
        return $this->attributes['price'] = $result['value'];
        }
        else
        {
         return $this->attributes['price'] = $value;   
        }
    }
}
