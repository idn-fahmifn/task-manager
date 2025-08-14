<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{

    use HasSlug; // Gunakan Trait

    protected $table = 'project';

    protected $fillable = [
        'project_name',
        'project_desc',
        'priority',
        'due_task',
        'status',
        'slug',
        'user_id'
    ];

    // protected $guarded;

    /**
     * Dapatkan opsi untuk men-generate slug.
     */
    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('project_name') // Sumber slug (dari kolom 'title')
            ->saveSlugsTo('slug');      // Kolom untuk menyimpan slug
    }

    /**
     * Beritahu Laravel untuk menggunakan 'slug' saat mencari model di route.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        // Sebuah Post dimiliki oleh (belongsTo) seorang User
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $casts = ['created_at' => 'datetime'];

}
