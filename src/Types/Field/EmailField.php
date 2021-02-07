<?php
/**
 * GraphQL Object Type - EmailField
 *
 * @see https://docs.gravityforms.com/gf_field_email/
 *
 * @package WPGraphQLGravityForms\Types\Field
 * @since   0.0.1
 */

namespace WPGraphQLGravityForms\Types\Field;

use WPGraphQLGravityForms\Types\Field\FieldProperty;

/**
 * Class - EmailField
 */
class EmailField extends Field {
	/**
	 * Type registred in WPGraphQL.
	 */
	const TYPE = 'EmailField';

	/**
	 * Type registered in Gravity Forms.
	 */
	const GF_TYPE = 'email';

	/**
	 * Register hooks to WordPress.
	 */
	public function register_hooks() {
		add_action( 'graphql_register_types', [ $this, 'register_type' ] );
	}

	/**
	 * Register Object type to GraphQL schema.
	 */
	public function register_type() {
		register_graphql_object_type(
			self::TYPE,
			[
				'description' => __( 'Gravity Forms Email field.', 'wp-graphql-gravity-forms' ),
				'fields'      => array_merge(
					$this->get_global_properties(),
					$this->get_custom_properties(),
					FieldProperty\DefaultValueProperty::get(),
					FieldProperty\DescriptionProperty::get(),
					FieldProperty\ErrorMessageProperty::get(),
					FieldProperty\InputNameProperty::get(),
					FieldProperty\IsRequiredProperty::get(),
					FieldProperty\NoDuplicatesProperty::get(),
					FieldProperty\PlaceholderProperty::get(),
					FieldProperty\SizeProperty::get(),
				),
			]
		);
	}
}
