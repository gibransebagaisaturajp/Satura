<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['nama','slug'];
    public $timestamps = true;

    public function artikel()
    {
        return $this->belongsToMany('App\artikel','artikel_tag','id_tag','id_artikel');
}
 public static function boot()
    {
        parent::boot();
        self::deleting(function ($tag) {
            // mengecek apakah penulis masih punya buku
            if ($tag->artikel->count() > 0) {
                //menyiapkan pesan error
                $html = 'tag tidak bisa dihapus karena masih digunakan oleh artikel: ';
                $html .= '<ul>';
                foreach ($tag->artikel as $data) {
                    $html .= "<li>$data->judul<li>";
                }
                $html .= '<ul>';
                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html
                ]);
                //membatalkan proses penghapusan
                return false;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($tag) {
    //         // mengecek apakah penulis masih punya buku
    //         if ($tag->artikel->count() > 0) {
    //             //menyiapkan pesan error
    //             $html = 'tag tidak bisa dihapus karena masih digunakan oleh artikel: ';
    //             $html .= '<ul>';
    //             foreach ($tag->artikel as $data) {
    //                 $html .= "<li>$data->judul<li>";
    //             }
    //             $html .= '<ul>';
    //             Session::flash("flash_notification", [
    //                 "level" => "danger",
    //                 "message" => $html
    //             ]);
    //             //membatalkan proses penghapusan
    //             return false;
    //         }
    //     });
    // }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
