<?php
/**
 * GraphQL Object Type - NameFieldValue
 * Values for an individual Name field.
 *
 * @package WPGraphQLGravityForms\Types\Field\FieldValue
 * @since   0.0.1
 */

namespace WPGraphQLGravityForms\Types\Field\FieldValue;

use GF_Field;
use WPGraphQLGravityForms\Interfaces\Hookable;
use WPGraphQLGravityForms\Interfaces\Type;
use WPGraphQLGravityForms\Interfaces\FieldValue;
use WPGraphQLGravityForms\Types\Field\NameField;

/**
 * Class - NameFieldValue
 */
class NameFieldValue implements Hookable, Type, FieldValue {
	/**
	 * Type registered in WPGraphQL.
	 */
	const TYPE = NameField::TYPE . 'Value';

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
				'description' => __( 'Name field values.', 'wp-graphql-gravity-forms' ),
				'fields'      => [
					'prefix' => [
						'type'        => 'String',
						'description' => __( 'Prefix, such as Mr., Mrs. etc.', 'wp-graphql-gravity-forms' ),
					],
					'first'  => [
						'type'        => 'String',
						'description' => __( 'First name.', 'wp-graphql-gravity-forms' ),
					],
					'middle' => [
						'type'        => 'String',
						'description' => __( 'Middle name.', 'wp-graphql-gravity-forms' ),
					],
					'last'   => [
						'type'        => 'String',
						'description' => __( 'Last name.', 'wp-graphql-gravity-forms' ),
					],
					'suffix' => [
						'type'        => 'String',
						'description' => __( 'Suffix, such as Sr., Jr. etc.', 'wp-graphql-gravity-forms' ),
					],
				],
			]
		);
	}

	/**
	 * Get the field value.
	 *
	 * @param array    $entry Gravity Forms entry.
	 * @param GF_Field $field Gravity Forms field.
	 *
	 * @return array Entry field value.
	 */
	public static function get( array $entry, GF_Field $field ) : array {
			return [
				'prefix' => $entry[ $field['inputs'][0]['id'] ] ?? null,
				'first'  => $entry[ $field['inputs'][1]['id'] ] ?? null,
				'middle' => $entry[ $field['inputs'][2]['id'] ] ?? null,
				'last'   => $entry[ $field['inputs'][3]['id'] ] ?? null,
				'suffix' => $entry[ $field['inputs'][4]['id'] ] ?? null,
			];
	}
}
