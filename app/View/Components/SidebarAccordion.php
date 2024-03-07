<?php 

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use App\View\Components\Types\AccordionLink;

class SidebarAccordion extends Component {
    public function __construct(
        public string $icon,
        public string $title,

        /**
         * @param AccordionLink[] $users
         */
        public array $links,

        public string $userRole,
    ) {}

    public function render(): View {
        return view("components.sidebar_accordion");
    }
}

?>