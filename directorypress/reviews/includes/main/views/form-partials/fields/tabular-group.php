<?php defined('ABSPATH') or die;
	/* @var DiRFFd $field */
	/* @var DiRF $form */
	/* @var mixed $default */
	/* @var string $name */
	/* @var string $idname */
	/* @var string $label */
	/* @var string $desc */
	/* @var string $rendering */
?>

<tr valign="top">
	<th scope="row">
		<?php echo esc_html($label) ?>
	</th>
	<td>
		<fieldset>

			<legend class="screen-reader-text">
				<span><?php echo esc_html($label) ?></span>
			</legend>

			<?php foreach ($field->getmeta('options', array()) as $fieldname => $conf): ?>
				<?php echo $form->field($fieldname, $conf)->render(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped already ?>
				<br/>
			<?php endforeach; ?>

			<?php if ($field->hasmeta('note')): ?>
				<small>
					<em>(<?php echo esc_html($field->getmeta('note')) ?>)</em>
				</small>
			<?php endif; ?>

		</fieldset>
	</td>
</tr>
