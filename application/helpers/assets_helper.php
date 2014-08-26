<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if (!function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/js/' . $nom . '.js';
	}
}

if (!function_exists('image_url'))
{
	function image_url($nom)
	{
		return base_url() . 'assets/image/' . $nom;
	}
}

if (!function_exists('image'))
{
	function image($nom, $alt = '')
	{
	return '<img src="' . image_url($nom) . '" alt="' . $alt . '" />';
	}
}
