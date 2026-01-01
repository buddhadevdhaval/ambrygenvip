<?php
/**
 * Testimonial shared ACF fields.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\ACF;

defined( 'ABSPATH' ) || exit;

use Ambrygen\Theme\ACF\Field_Factory;

return array(
	Field_Factory::text(
		'field_testimonial_name',
		'testimonial_name',
		'Name',
		'Full name of the person',
		true
	),
	Field_Factory::text(
		'field_testimonial_organization',
		'testimonial_organization',
		'Organization',
		'Company or organization name'
	),
	Field_Factory::image(
		'field_testimonial_company_logo',
		'testimonial_company_logo',
		'Company Logo',
		'Upload company logo'
	),
);
