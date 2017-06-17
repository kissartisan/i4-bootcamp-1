<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'news_id';

    protected $fillable = ['title', 'permalink', 'content', 'status', 'created_by', 'updated_by'];

    /**
     * Mutator for title
     * Append every title a "Part 1"
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return "Part 1 " . $value;
    }

    /**
     * Change what column to bind using implicit binding
     * @return column name
     */
    public function getRouteKeyName()
    {
        return 'permalink';
    }
}
