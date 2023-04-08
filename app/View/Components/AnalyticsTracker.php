<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class AnalyticsTracker extends Component
{
    public string $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request, $page)
    {
        $this->page = $page;
        if ($request->source_id ?? null) {
            $this->page .= "#{$request->source_id}";
            $request->session()->put('source_id', $request->source_id);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.snipets.analytics-tracker');
    }
}
