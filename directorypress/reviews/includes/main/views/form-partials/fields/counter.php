<?php defined('ABSPATH') or die;
	/* @var DiRFFd $field */
	/* @var DiRF $form */
	/* @var mixed $default */
	/* @var string $name */
	/* @var string $idname */
	/* @var string $label */
	/* @var string $desc */
	/* @var string $rendering */

	// [!!] the counter field needs to be able to work inside other fields; if
	// the field is in another field it will have a null label

	$value = $form->autovalue($name, $default);

	$attrs = array
		(
			'name' => $name,
			'id' => $idname,
			'type' => 'number',
			'value' => $value,
			'step' => 1,
			'class' => array(),
		);

	$is_inline_field = empty($label) || $rendering == 'inline';

	if ($field->has_errors()) {
		$error_message = $field->one_error();
		$attrs['class'][] = 'field-error';
		$attrs['title'] = "Error: $error_message";
	}
?>

<?php if ($is_inline_field): ?>
	<?php $attrs['class'][] = 'small-text' ?>
	<input <?php echo $field->htmlattributes($attrs); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- done already ?> class="small-text" />
<?php else: # standard field ?>
	<label for="<?php echo esc_attr($idname) ?>">
		<input <?php echo $field->htmlattributes($attrs); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- done already ?> />
		<?php echo esc_html($label); ?>
	</label>
<?php endif; ?>
