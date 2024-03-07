<?php
namespace App\View\Components\Types;

use App\Enums\RoleEnum;

class AccordionLink {
    public function __construct(
        public string $title,
        public string $href,
        
        /**
         * @param RoleEnum[] $users
         */
        public ?array $allowed_roles = [],
    ) {}
}
?>