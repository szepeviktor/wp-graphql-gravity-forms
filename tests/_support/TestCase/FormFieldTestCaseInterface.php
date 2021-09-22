<?php
/**
 * Interface for FormFieldTestCase.
 *
 * @package Tests\WPGraphQL\Gravity\GravityForms
 */

namespace Tests\WPGraphQL\GravityForms\TestCase;

interface FormFieldTestCaseInterface {
	/**
	 * Sets the correct Field Helper.
	 */
	public function field_helper();

	/**
	 * Generates the form fields from factory. Must be wrappend in an array.
	 */
	public function generate_fields() : array;

	/**
	 * The value as expected in GraphQL.
	 */
	public function field_value();

	/**
	 * The graphql field value input.
	 */
	public function field_value_input();

	/**
	 * The value as expected in GraphQL when updating from field_value().
	 */
	public function updated_field_value();

	/**
	 * The graphql field value input.
	 */
	public function updated_field_value_input();

	/**
	 * Thehe value as expected by Gravity Forms.
	 */
	public function value();

	/**
	 * The GraphQL query string.
	 *
	 * @return string
	 */
	public function field_query() : string;

	/**
	 * SubmitForm mutation string.
	 */
	public function submit_form_mutation() : string;

	/**
	 * Returns the UpdateEntry mutation string.
	 */
	public function update_entry_mutation() : string;

	/**
	 * Returns the UpdateDraftEntry mutation string.
	 */
	public function update_draft_entry_mutation() : string;

	/**
	 * The expected WPGraphQL field response.
	 *
	 * @param array $form the current form instance.
	 */
	public function expected_field_response( array $form ) : array;

	/**
	 * The expected WPGraphQL mutation response.
	 *
	 * @param string $mutationName .
	 * @param mixed  $value .
	 * @return array
	 */
	public function expected_mutation_response( string $mutationName, $value) : array;

	/**
	 * Checks if values submitted by GraphQL are the same as whats stored on the server.
	 *
	 * @param array $actual_entry .
	 * @param array $form .
	 */
	public function check_saved_values( $actual_entry, $form ) : void;
}
