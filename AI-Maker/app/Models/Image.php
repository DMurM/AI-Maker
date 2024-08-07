<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_images');
    }

    public static function getInitialImages($limit = 21)
    {
        $images = self::orderBy('created_at', 'desc')->take($limit)->get();

        if ($images->count() < $limit) {
            $remaining = $limit - $images->count();
            $publicImages = File::files(public_path('images/styles'));

            foreach ($publicImages as $file) {
                if ($remaining <= 0) {
                    break;
                }
                $images->push((object) [
                    'url' => asset('images/styles/' . $file->getFilename())
                ]);
                $remaining--;
            }
        }

        return $images;
    }

    public static function getRecentImages($limit = 21)
    {
        return self::orderBy('created_at', 'desc')->take($limit)->get();
    }
}
