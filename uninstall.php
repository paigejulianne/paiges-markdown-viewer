<?php
/**
 * Uninstall script for Paige's Markdown Viewer
 * Removes the MU-plugin and cleans up transients
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Remove the MU-plugin
$mu_plugin_file = WPMU_PLUGIN_DIR . '/paiges-markdown-viewer-info.php';
if (file_exists($mu_plugin_file)) {
    unlink($mu_plugin_file);
}

// Clean up any cached transients
global $wpdb;
$wpdb->query(
    "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_paiges_markdown_viewer_%'"
);
$wpdb->query(
    "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_paiges_markdown_viewer_%'"
);
