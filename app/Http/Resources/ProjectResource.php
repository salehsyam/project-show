<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'area' => $this->area,
            'price' => $this->price,
            'contact' => $this->contact,
            'category' => $this->category,
            'qr_code' => base64_encode(QrCode::format('png')->size(100)->generate($this->id)),
            'category_formatted' => trans('projects.categories.'.$this->category),
            'images' => MediaResource::collection($this->media),
            'created_at' => $this->created_at,
            'created_at_formatted' => $this->created_at->diffForHumans(),
        ];
    }
}
