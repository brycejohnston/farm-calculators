<?php
/*
Plugin Name: Farm Calculators

Plugin URI: http://wordpress.org/plugins/farm-calculators/

Description: Add farm calculators to your website to help users determine various farming and crop related information.

Version: 0.6
Author: Bryce Johnston
Author URI: https://github.com/CropQuest/farm-calculators

******************************************************************************************
  Copyright (C) 2016 Bryce Johnston (email: johnstonbrc@gmail.com)

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************************/

$fc_version = '0.6';
$fc_dirname = plugin_basename(dirname(__FILE__));

function farming_calc_scripts() {
  global $fc_dirname;
  wp_enqueue_script('farming_calculators', '/' . PLUGINDIR . '/'.$fc_dirname.'/js/calculators.js', array('jquery') );
}
add_action('wp_print_scripts', 'farming_calc_scripts');

function farming_calc_styles() {
  global $fc_dirname;
  wp_register_style('farming_calculator_style', '/' .PLUGINDIR . "/$fc_dirname/css/calculators.css");
  wp_enqueue_style('farming_calculator_style');
}
add_action('wp_print_styles', 'farming_calc_styles');

function farming_calc_crop_population_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Crop Population</h4>
  <p>
    <label for="stand_count">Stand Count:</label><br />
    <input name="stand_count" id="stand_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="row_length">Length of Row in Feet:</label><br />
    <input name="row_length" id="row_length" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="row_spacing">Row Spacing in Inches:</label><br />
    <input name="row_spacing" id="row_spacing" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" name="calculateCropPopulation" id="calculateCropPopulation">Calculate</button>
  </p>
  <p>
    <label>Population (Plants/Acre):</label><br />
    <input name="crop_population" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_crop_population_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Crop Population</legend>';
$code .='
  <label for="stand_count">Stand Count:</label>
  <input name="stand_count" id="stand_count" type="number" step="any" class="input-medium" />
  <label for="row_length">Length of Row in Feet:</label>
  <input name="row_length" id="row_length" type="number" step="any" class="input-medium" />
  <label for="row_spacing">Row Spacing in Inches:</label>
  <input name="row_spacing" id="row_spacing" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateCropPopulation" id="calculateCropPopulation">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Population (Plants/Acre):</label>
  <input name="crop_population" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_crop_population_hoop_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Crop Population (Hoop Method)</h4>
  <p>
    <label for="stand_count">Stand Count:</label><br />
    <input name="stand_count" id="stand_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="hoop_size">Hoop Diameter in Inches:</label><br />
    <input name="hoop_size" id="hoop_size" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" class="btn" name="calculateCropPopulationHoop" id="calculateCropPopulationHoop">Calculate</button>
  </p>
  <p>
    <label>Population (Plants/Acre):</label><br />
    <input name="crop_population" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_crop_population_hoop_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Crop Population (Hoop)</legend>';
$code .='
  <label for="stand_count">Stand Count:</label>
  <input name="stand_count" id="stand_count" type="number" step="any" class="input-medium" />
  <label for="hoop_size">Hoop Diameter in Inches:</label>
  <input name="hoop_size" id="hoop_size" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateCropPopulationHoop" id="calculateCropPopulationHoop">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Population (Plants/Acre):</label>
  <input name="crop_population" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_wheat_harvest_yield_loss_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Wheat Harvest Loss</h4>
  <p><i>Also recommended to check standing crop for pre-harvest losses.</i></p>
  <p>
    <label for="kernels_count">Kernels Counted on Ground:</label><br />
    <input name="kernels_count" id="kernels_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="kernels_area">Area Kernels were Counted (ft<sup>2</sup>):</label><br />
    <input name="kernels_area" id="kernels_area" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" class="btn" name="calculateWheatHarvestYieldLoss" id="calculateWheatHarvestYieldLoss">Calculate</button>
  </p>
  <p>
    <label>Estimated Yield Loss (bu/ac):</label><br />
    <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_wheat_harvest_yield_loss_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Wheat Harvest Loss</legend>';
$code .='
  <label for="kernels_count">Kernels Counted on Ground:</label>
  <input name="kernels_count" id="kernels_count" type="number" step="any" class="input-medium" />
  <label for="kernels_area">Area Kernels were Counted (ft<sup>2</sup>):</label>
  <input name="kernels_area" id="kernels_area" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateWheatHarvestYieldLoss" id="calculateWheatHarvestYieldLoss">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Estimated Yield Loss (bu/ac):</label>
  <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_sorghum_harvest_yield_loss_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Grain Sorghum Harvest Loss</h4>
  <p><i>Also recommended to check standing crop for pre-harvest losses.</i></p>
  <p>
    <label for="kernels_count">Kernels Counted on Ground:</label><br />
    <input name="kernels_count" id="kernels_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="kernels_area">Area Kernels were Counted (ft<sup>2</sup>):</label><br />
    <input name="kernels_area" id="kernels_area" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" class="btn" name="calculateSorghumHarvestYieldLoss" id="calculateSorghumHarvestYieldLoss">Calculate</button>
  </p>
  <p>
    <label>Estimated Yield Loss (bu/ac):</label><br />
    <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_sorghum_harvest_yield_loss_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Grain Sorghum Harvest Loss</legend>';
$code .='
  <label for="kernels_count">Kernels Counted on Ground:</label>
  <input name="kernels_count" id="kernels_count" type="number" step="any" class="input-medium" />
  <label for="kernels_area">Area Kernels were Counted (ft<sup>2</sup>):</label>
  <input name="kernels_area" id="kernels_area" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateSorghumHarvestYieldLoss" id="calculateSorghumHarvestYieldLoss">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Estimated Yield Loss (bu/ac):</label>
  <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_soybean_harvest_yield_loss_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Soybean Harvest Loss</h4>
  <p><i>Also recommended to check standing crop for pre-harvest losses.</i></p>
  <p>
    <label for="beans_count">Beans Counted on Ground:</label><br />
    <input name="beans_count" id="beans_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="beans_area">Area Beans were Counted (ft<sup>2</sup>):</label><br />
    <input name="beans_area" id="beans_area" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" class="btn" name="calculateSoybeanHarvestYieldLoss" id="calculateSoybeanHarvestYieldLoss">Calculate</button>
  </p>
  <p>
    <label>Estimated Yield Loss (bu/ac):</label><br />
    <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_soybean_harvest_yield_loss_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Soybean Harvest Loss</legend>';
$code .='
  <label for="beans_count">Beans Counted on Ground:</label>
  <input name="beans_count" id="beans_count" type="number" step="any" class="input-medium" />
  <label for="beans_area">Area Beans were Counted (ft<sup>2</sup>):</label>
  <input name="beans_area" id="beans_area" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateSoybeanHarvestYieldLoss" id="calculateSoybeanHarvestYieldLoss">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Estimated Yield Loss (bu/ac):</label>
  <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_sunflower_harvest_yield_loss_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='
  <h4>Sunflower Harvest Loss</h4>
  <p><i>Also recommended to check standing crop for pre-harvest losses.</i></p>
  <p>
    <label for="seeds_count">Seeds Counted on Ground:</label><br />
    <input name="seeds_count" id="seeds_count" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <label for="seeds_area">Area Seeds were Counted (ft<sup>2</sup>):</label><br />
    <input name="seeds_area" id="seeds_area" type="number" step="any" class="input-medium" />
  </p>
  <p>
    <button type="submit" class="btn" name="calculateSunflowerHarvestYieldLoss" id="calculateSunflowerHarvestYieldLoss">Calculate</button>
  </p>
  <p>
    <label>Estimated Yield Loss (bu/ac):</label><br />
    <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
  </p>
</form>';
$code .= '
</div>';

   return $code;
}

function farming_calc_sunflower_harvest_yield_loss_bs_shortcode() {
   extract( shortcode_atts( array(
      'class' => 'farmCalculator span3',
      ), $atts ) );

$class = esc_attr($class);

$code = '<div class="'.$class.'">
<form>
<div class="errors"></div>';
$code .='<fieldset>
<legend>Sunflower Harvest Loss</legend>';
$code .='
  <label for="seeds_count">Seeds Counted on Ground:</label>
  <input name="seeds_count" id="beans_count" type="number" step="any" class="input-medium" />
  <label for="seeds_area">Area Seeds were Counted (ft<sup>2</sup>):</label>
  <input name="seeds_area" id="seeds_area" type="number" step="any" class="input-medium" /><br />
  <button type="submit" class="btn" name="calculateSunflowerHarvestYieldLoss" id="calculateSunflowerHarvestYieldLoss">Calculate</button>
</fieldset>';
$code .= '<br />
  <label>Estimated Yield Loss (bu/ac):</label>
  <input name="yield_loss" type="text" class="input-medium" readonly="readonly" />
</form>';
$code .= '
</div>';

   return $code;
}

add_shortcode('farming_calc_crop_population', 'farming_calc_crop_population_shortcode');
add_shortcode('farming_calc_crop_population_bs', 'farming_calc_crop_population_bs_shortcode');
add_shortcode('farming_calc_crop_population_hoop', 'farming_calc_crop_population_hoop_shortcode');
add_shortcode('farming_calc_crop_population_hoop_bs', 'farming_calc_crop_population_hoop_bs_shortcode');
add_shortcode('farming_calc_wheat_harvest_yield_loss', 'farming_calc_wheat_harvest_yield_loss_shortcode');
add_shortcode('farming_calc_wheat_harvest_yield_loss_bs', 'farming_calc_wheat_harvest_yield_loss_bs_shortcode');
add_shortcode('farming_calc_sorghum_harvest_yield_loss', 'farming_calc_sorghum_harvest_yield_loss_shortcode');
add_shortcode('farming_calc_sorghum_harvest_yield_loss_bs', 'farming_calc_sorghum_harvest_yield_loss_bs_shortcode');
add_shortcode('farming_calc_soybean_harvest_yield_loss', 'farming_calc_soybean_harvest_yield_loss_shortcode');
add_shortcode('farming_calc_soybean_harvest_yield_loss_bs', 'farming_calc_soybean_harvest_yield_loss_bs_shortcode');
add_shortcode('farming_calc_sunflower_harvest_yield_loss', 'farming_calc_sunflower_harvest_yield_loss_shortcode');
add_shortcode('farming_calc_sunflower_harvest_yield_loss_bs', 'farming_calc_sunflower_harvest_yield_loss_bs_shortcode');

?>
