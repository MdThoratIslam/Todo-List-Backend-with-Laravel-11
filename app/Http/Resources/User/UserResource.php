<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'email_verified_at' => $this->email_verified_at,
            'role'              => $this->role,
            'status_active'     => $this->status_active ? 1== 'Active' : 0 == 'Inactive',
            'is_delete'         => $this->is_delete ? 1 == 'Deleted' : 0 == 'Not Deleted',
        ];
    }
}
