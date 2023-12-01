<?php
/**
 * @package Desarrollo_VictorLastra
 * 
 */
class AdminCdlmActive {
    public static function activate() {
        flush_rewrite_rules();
        // Activation logic
    }
}

class AdminCdlmDeactivate {
    public static function deactivate() {
        // Deactivation logic
        flush_rewrite_rules();
    }
}

