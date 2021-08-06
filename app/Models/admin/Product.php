<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['category_id', 'user_id', 'unicode', 'slug', 'title', 'description', 'order', 'status', 'prc', 'cid'];

    public function statusCode()
    {
        $data_ = [
            'a' => [
                'name' => 'Aktif',
                'class' => 'bg-success'
            ],

            'p' => [
                'name' => 'Pasif',
                'class' => 'bg-secondary'
            ]
        ];
        $html = '<span class="badge {{class}}">{{name}}</span>';
        $html = str_replace('{{class}}', $data_[$this->status]['class'], $html);
        $html = str_replace('{{name}}', $data_[$this->status]['name'], $html);
        return $html;
    }

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
        $html = str_replace('{{name}}', $rate_[$this->cid ]['name'], $html);
        return $html;
    }

    public function categoryName()
    {
        $categoryName = Category::where('id', $this->category_id)->get('title');
        return $categoryName[0]['title'];
    }
    public function userName()
    {
        $userName = User::where('id', $this->user_id)->get('uname');
        return $userName[0]['uname'];
    }
}
