<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = ['user_id', 'orid', 'product_id', 'code', 'prc', 'cid', 'sale_date'];

    public function rateCode()
    {
        $rate_ = [
            '1' => [
                'name' => 'TL',
            ],

            '2' => [
                'name' => 'Dolar',
            ],

            '3' => [
                'name' => 'Euro',
            ]
        ];
        $html = '{{name}}';
        $html = str_replace('{{name}}', $rate_[$this->cid]['name'], $html);
        return $html;
    }

    public function userName()
    {
        $user = User::where('id', $this->user_id)->get(['uname']);

        return $user[0]['uname'];
    }

    public function productName()
    {
        $product = Product::where('id', $this->product_id)->get(['title']);

        return $product[0]['title'];
    }

    public function products()
    {
        //Satın Alınan Kullanıcıya Göre Satın Aldıklarını Döner...
        $products = Product::where('user_id', $this->user_id)->get();
        return $products;
    }
}
