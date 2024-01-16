<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Task */
class TaskResource extends JsonResource
{
    public static $wrap = 'tasks';

    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
            'name' => $this->name,
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'user' => [
                    'id' => (string)$this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ],
            ]
        ];
    }
}
