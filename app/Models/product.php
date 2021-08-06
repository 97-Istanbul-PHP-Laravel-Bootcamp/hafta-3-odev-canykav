<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function category() { // ürünün bir kategorisi vardır. vt ilişki fonksiyonu
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function user() { // ürünü ekleyen bir kullanıcı vardır. vt ilişki fonksiyonu
        return $this->hasOne(user::class, 'id', 'user_id');
    }
}
