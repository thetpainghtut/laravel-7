<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PtypeResource;
use App\Ptype;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'project';

    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'project_id' => $this->id,
            'project_title' => $this->title,
            'project_photo' => url($this->photo),
            'project_url' => $this->url,
            'project_viewer' => $this->viewer,
            'project_ptype' => new PtypeResource(Ptype::find($this->ptype_id)),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
