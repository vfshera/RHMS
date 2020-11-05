<?php

namespace App\Http\Resources;

use App\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class FindProjectsResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
           'image' =>  $this->image,
            'title' =>  $this->title,
            'engineer_id' =>  $this->engineer_id,
            'contractor_id' =>  $this->contractor_id,
            'starting_date' =>  $this->starting_date,
            'project_span' =>  $this->project_span,
            'location' =>  $this->location,
            'date_finished' =>  $this->date_finished,
           'progress' =>  $this->progress,
           'applied' =>  Application::where('project_id', $this->id)->where('user_id', auth()->user()->id)->get()->count(),
        ];
    }
}
