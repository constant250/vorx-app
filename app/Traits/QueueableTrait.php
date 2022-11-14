<?php

namespace App\Traits;

use App\Models\Enums\CampaignInAppStatusEnum;

trait QueueableTrait
{
    public function setProcessToComplete(): void
    {
        $this->errored_at = null;
        $this->error_message = null;
        $this->save();
    }

    /**
     * @param string $message
     * @return void
     */
    public function setProcessToError(string $message, CampaignInAppStatusEnum $statusEnum = null): void
    {
        if ($statusEnum === null) {
            $statusEnum = CampaignInAppStatusEnum::DRAFT();
        }

        $this->status = $statusEnum;
        $this->errored_at = now();
        $this->error_message = $message;
        $this->save();
    }
}
