<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PtypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'ptype';

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'ptype_id' => $this->id,
            'ptype_name' => $this->name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
