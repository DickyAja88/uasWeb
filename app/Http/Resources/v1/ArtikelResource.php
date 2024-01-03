<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'judul'=>$this->judul,
            'gambar'=>$this->gambar,
            'konten'=>$this->konten,
            'tanggal'=>$this->tanggal,
            'idTopik'=>$this->id_topik,
            'idUser'=>$this->id_user,
        ];
    }
}
