<?php

namespace App;

use App\Scope\ArticleScope;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    // 不可以注入的字段
    // protected $guarded = [];
    // 可以注入的字段
    // protected $fillable;
    //
    //
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    //  protected static function boot()
    //  {
    //     //  parent::boot();
 
    //     //  static::addGlobalScope(new ArticleScope());
    //  }
}
