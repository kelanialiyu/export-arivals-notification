<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\IsoTypeResource;
use App\Http\Resources\OperatorResource;

class ContainerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "containerNo" => $this->container_no,
            "bookingNo" => $this->booking_no,
            "vessel" => $this->vessel,
            "portOfDischarge" => $this->port_of_discharge,
            "commodity" => $this->commodity,
            "shipper" => $this->shipper,
            "vgm" => $this->vgm,
            "iso" => $this->iso->name." ".$this->iso->code,
            "operator" => $this->operator->name,
        ];
    }
}
