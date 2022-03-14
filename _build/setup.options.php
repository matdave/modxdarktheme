<?php
/**
 * Build the setup options form.
 *
 * @package modxdarktheme
 * @subpackage build
 */
$output = '
<style type="text/css">
	.setup-field { float: left; margin-top: 7px; }
	.setup-label { display: inline-block !important; margin: 6px 8px 0 !important; }
	.field-desc {
		color: #A0A0A0;
		font-size: 11px;
		font-style: italic;
		line-height: 1;
		margin: 5px -15px 0;
		padding: 0 15px;
	}
</style>';

$output .= '<input type="checkbox" name="set_default" id="set_default" class="setup-field" value="1" checked="checked"/><label class="setup-label" for="set_default">Set the theme as default for the manager.</label>
<div class="field-desc"> If checked, reload the page to see the theme after the install process.</div>';

return $output;
