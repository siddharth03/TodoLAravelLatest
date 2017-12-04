<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=['title', 'description', 'reference', 'priority'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'pivot_table');
    }
}