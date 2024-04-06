<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    protected $table = 'markers';
    protected $fillable = ['name', 'latitude', 'longitude', 'Keterangan', 'kategori'];

    public function getAllData()
    {
        return self::all();
    }

    public function addMarker($data)
    {
        return self::create($data);
    }

    public function editMarker($id, $data)
    {
        $marker = self::find($id);
        if ($marker) {
            $marker->update($data);
            return $marker;
        }
        return null;
    }

    public function deleteMarker($id)
    {
        $marker = self::find($id);
        if ($marker) {
            $marker->delete();
            return true;
        }
        return false;
    }
}