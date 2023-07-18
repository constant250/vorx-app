<?php

namespace App\Models\Services;

use App\Models\Agent;
use App\Traits\ImageModelServiceTrait;

class AgentService extends ModelService
{
    use ImageModelServiceTrait;
    
    /**
     * @var Agent
     */
    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
        $this->model = $agent;
    }

    public static function create()
    {
        
    }
   
    public function update()
    {
        
    }

}
