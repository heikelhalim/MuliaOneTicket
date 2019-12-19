<?php

namespace Kordy\Ticketit\Traits;

use Kordy\Ticketit\Models\Setting;
use Mews\Purifier\Facades\Purifier;

trait Purifiable
{
    /**
     * Updates the content and html attribute of the given model.
     *
     * @param string $rawHtml
     *
     * @return \Illuminate\Database\Eloquent\Model $this
     */
    public function setPurifiedContent($rawHtml)
    {
        $this->content = Purifier::clean($rawHtml, ['HTML.Allowed' => '']);
        $this->html = Purifier::clean($rawHtml, Setting::grab('purifier_config'));

        return $this;
    }

    public function setPurifiedReportDetails($rawHtml)
    {
        $this->report_details = Purifier::clean($rawHtml, ['HTML.Allowed' => '']);
        $this->report_details_html = Purifier::clean($rawHtml, Setting::grab('purifier_config'));

        return $this;
    }

    public function setPurifiedInProgress($rawHtml)
    {
        $this->in_progress_remarks = Purifier::clean($rawHtml, ['HTML.Allowed' => '']);
        $this->in_progress_html = Purifier::clean($rawHtml, Setting::grab('purifier_config'));

        return $this;
    }

    public function setPurifiedAfter($rawHtml)
    {
        $this->after_remarks = Purifier::clean($rawHtml, ['HTML.Allowed' => '']);
        $this->after_remarks_html = Purifier::clean($rawHtml, Setting::grab('purifier_config'));

        return $this;
    }


}
