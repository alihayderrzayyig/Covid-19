<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'specialty',
        'location',
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
