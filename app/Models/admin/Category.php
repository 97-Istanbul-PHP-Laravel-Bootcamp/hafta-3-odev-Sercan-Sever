<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['title', 'description', 'slug', 'status'];

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
}
