<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

    
        return [
            'idUser'=>$this->id_user,
            'username'=>$this->username,
            'email'=>$this->email,
            'password'=>$this->password,
            'idRole'=>$this->id_role,
            'roles'=> RoleResource::collection($this->whenLoaded('roles'))
        ];
    }
}
