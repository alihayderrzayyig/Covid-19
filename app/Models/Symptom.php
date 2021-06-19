<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

class Symptom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
    ];


    
    public function deleteImage()
    {
        // Storage::delete($this->image);
        if (File::exists(public_path($this->image))) {
            File::delete(public_path($this->image));
        }
    }
}
