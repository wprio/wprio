<?php
/**
 * Template Name: Certificado
 * Description: Template feito na ridicularidade máxima, por favor na ria ou chore disso. Não cara, para. Sério. Segura as lágrimas pf :(
 */

require_once get_template_directory() . '/inc/certificate/lib/excel_reader2.php';
require_once get_template_directory() . '/inc/certificate/lib/mpdf/mpdf.php';

if ( isset( $_GET['email'] ) ) {
	$email       = sanitize_email( $_GET['email'] );
	$spreadsheet = get_template_directory() . '/inc/certificate/docs/2016/participantes.xls';
	$reader      = new Spreadsheet_Excel_Reader( $spreadsheet );
	$count       = $reader->rowcount();

	for ( $i = 0; $i < $count + 1; $i++ ) {
		$current_email = $reader->val( $i, 2 );

		if ( $current_email === $email ) {
			$attendee_name = sanitize_text_field( $reader->val( $i, 1 ) );
			$attendee_role = sanitize_title( $reader->val( $i, 3 ) );
			break;
		}
	}

	ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/inc/certificate/css/certificate.css'; ?>">
	</head>
	<body>
		<?php if ( isset( $attendee_name ) ) : ?>
		<div class="certificate">
			<div class="certificate-label">
				<div class="certificate-pre">Certificamos que</div>
				<div class="certificate-name"><?php echo esc_html( $attendee_name ); ?></div>
				<div class="certificate-description">
					<?php switch ( $attendee_role ) : case 'palestrante' : ?>
					participou do evento "WordCamp Rio de Janeiro 2016",
					no dia 24 de setembro de 2016, na cidade do Rio de Janeiro,
					na qualidade de <strong>palestrante</strong>.
					<?php break; case 'voluntario' : ?>
					participou do evento "WordCamp Rio de Janeiro 2016",
					no dia 24 de setembro de 2016, na cidade do Rio de Janeiro,
					na qualidade de <strong>voluntário</strong>, com carga horária de 12 horas
					<?php break; default: ?>
					participou do evento "WordCamp Rio de Janeiro 2016",<br />
					no dia 24 de setembro de 2016, na cidade do Rio de Janeiro,<br />
					na qualidade de <strong>participante</strong>, com carga horária de 8 horas.
					<?php break; endswitch; ?>
				</div><!-- .certificate-description -->
				<div class="certificate-date">
					Rio de Janeiro, <?php echo esc_html( date( 'd/m/y' ) ); ?>
				</div><!-- certificate-date -->
			</div><!-- .certificate-label -->
		</div><!-- .certificate -->
		<?php else : ?>
		<p class="alert">
			Não existe nenhum certificado para o email: <strong><?php echo $email; ?></strong><br />
			<a href="javascript:history.back(-1);">< Voltar</a>
		</p>
		<?php endif; ?>
	</body>
</html>
<?php
	$html = ob_get_clean();

	if ( isset( $attendee_name ) ) {
		$mpdf = new mPDF( 'utf-8', 'A4-L', 0, '', 0, 0, 3, 0, 0, 0 );
		$mpdf->WriteHTML( $html );
		$mpdf->Output();
	} else {
		echo $html;
	}
} else {
	wp_redirect( home_url() );
}
?>
