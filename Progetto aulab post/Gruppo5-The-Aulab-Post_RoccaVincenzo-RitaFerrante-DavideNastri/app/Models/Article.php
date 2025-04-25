<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Calcola il tempo stimato di lettura dell'articolo
     *
     * @return int Minuti di lettura
     */
   

    // Relazioni esistenti...
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    // Nel modello Article
    public function toSearchableArray()
    {
        $array = $this->toArray();
        
        // Ensure all text fields are strings
        $array['title'] = (string)$this->title;
        $array['subtitle'] = (string)$this->subtitle;
        $array['body'] = (string)$this->body;
        
        // Aggiungi i dati relazionali
        $array['author_name'] = (string)$this->user->name;
        $array['category_name'] = (string)$this->category->name;
        
        // Aggiungi i tag come stringa
        $array['tags'] = implode(' ', $this->tags->pluck('name')->toArray());
        
        return $array;
    }
    
    // This method is defined twice in your file, which is causing the error
    // Make sure this is the only instance of getReadingTimeAttribute in the file
    public function getReadingTimeAttribute() {
        $paroleAlMinuto = 200; // Media delle parole lette al minuto
        $numeroParole = str_word_count(strip_tags($this->body)); // Conta le parole nel testo
        $minutiLettura = max(1, ceil($numeroParole/$paroleAlMinuto)); // Arrotonda per eccesso
        return $minutiLettura;
    }
}