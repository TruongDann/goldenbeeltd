<?php
namespace App\base;

/**
 * Interface ThemeComponentInterface
 * Defines the contract for rendering theme components in the Genesis Framework.
 */
interface ThemeComponentInterface {
    /**
     * Render the component's output for Genesis hooks.
     * @return void
     */
    public static function render();
}
?>