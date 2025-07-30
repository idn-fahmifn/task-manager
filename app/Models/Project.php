<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{

    use HasSlug;

    protected $table = 'project';
    

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('project_name')
            ->saveSlugsTo('slug');
    }
    

    public function getRouteKeyName(): string // 3. Tambahkan method ini
    {
        return 'slug';
    }


    protected $fillable = [
        'project_name', 'project_desc', 'priority', 'due_task', 'status', 'slug','user_id'
    ];
}
