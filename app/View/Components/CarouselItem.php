<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarouselItem extends Component
{

    public $active;
    public $imageUrl;
    public $imageAlt;
    public $title;
    public $description;
    public $btnLink;
    public $btnText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $active = false,
        $imageUrl = '',
        $imageAlt = '',
        $title = '',
        $description = '',
        $btnLink = '#',
        $btnText = 'Learn More'
    ) {
        $this->active = $active;
        $this->imageUrl = $imageUrl;
        $this->imageAlt = $imageAlt;
        $this->title = $title;
        $this->description = $description;
        $this->btnLink = $btnLink;
        $this->btnText = $btnText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.carousel-item');
    }
}
