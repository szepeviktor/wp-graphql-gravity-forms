<?php
/**
 * DataLoader - Forms
 *
 * Loads Models for Gravity Forms Forms.
 *
 * @package WPGraphQL\GF\Data\Loader
 * @since 0.0.1
 */

namespace WPGraphQL\GF\Data\Loader;

use WPGraphQL\Data\Loader\AbstractDataLoader;
use WPGraphQL\GF\DataManipulators\FormDataManipulator;
use WPGraphQL\GF\Utils\GFUtils;

/**
 * Class - FormsLoader
 */
class FormsLoader extends AbstractDataLoader {
	/**
	 * Loader name.
	 *
	 * @var string
	 */
	public static string $name = 'gravityFormsForms';

	/**
	 * Given array of keys, loads and returns a map consisting of keys from `keys` array and loaded
	 * posts as the values
	 *
	 * Note that order of returned values must match exactly the order of keys.
	 * If some entry is not available for given key - it must include null for the missing key.
	 *
	 * For example:
	 * loadKeys(['a', 'b', 'c']) -> ['a' => 'value1, 'b' => null, 'c' => 'value3']
	 *
	 * @param array $keys .
	 *
	 * @return array|false
	 * @throws \Exception .
	 */
	public function loadKeys( array $keys ) {
		if ( empty( $keys ) ) {
			return $keys;
		}

		$forms_from_db = GFUtils::get_forms( $keys );

		$forms = array_map( fn( $form ) => FormDataManipulator::manipulate( $form ), $forms_from_db );

		return array_combine( $keys, $forms );
	}
}
