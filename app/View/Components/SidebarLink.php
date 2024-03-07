<?php 

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Link {
    public string $title;
    public string $href;
}

class SidebarLink extends Component {
    public function __construct(
        public string $href,
        public string $icon,
        public string $title,
    ) {}

    public function render(): View {
        return view("components.sidebar_link");
    }
}

?>