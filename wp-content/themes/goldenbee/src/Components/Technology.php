<?php

namespace App\Components;

use App\Base\ThemeComponentInterface;

class Technology implements ThemeComponentInterface
{
    public static function render()
    {
        $tech_stack = [
            "React",
            "TypeScript",
            "Next.js",
            "Node.js",
            "TailwindCSS",
            "PostgreSQL",
            "MongoDB",
            "Docker",
            "AWS",
            "Google Cloud",
            "Figma",
            "Framer Motion",
            "GraphQL",
            "Python",
            "Flutter"
        ];

        // Duplicate array for infinite scroll effect
        $scrolling_tech = array_merge($tech_stack, $tech_stack);
?>

        <div class="py-12 border-y border-zinc-800 overflow-hidden relative">
            <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-black to-transparent z-10"></div>
            <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-black to-transparent z-10"></div>

            <div class="flex animate-scroll w-max gap-8 md:gap-16 items-center">
                <?php foreach ($scrolling_tech as $index => $tech) : ?>
                    <span class="text-2xl md:text-4xl font-mono font-bold hover:text-brand-500 text-white transition-colors cursor-default uppercase whitespace-nowrap">
                        <?php echo esc_html($tech); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>

<?php
    }
}
?>