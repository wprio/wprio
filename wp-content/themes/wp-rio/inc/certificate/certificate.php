<?php
	if ( isset( $_GET['email'] ) ) {
		$email = $_GET['email'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Certificado - WordCamp RJ 2015</title>
	<link rel="stylesheet" href="https:	//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic">
	<link rel="stylesheet" href="css/certificate.css">
</head>
<body>
<?php if ( ! empty( $email ) && filter_var( $email, FILTER_VALIDATE_EMAIL ) ) : ?>

<?php
	require_once 'lib/excel_reader2.php';
	$excel = new Spreadsheet_Excel_Reader('docs/participantes.xls');
	$certificate = array();

	$count = $excel->rowcount();
	for ( $i = 0; $i < $count + 1; $i++ ) {
		$current_email = $excel->val( $i, 3 );
		
		if ( $current_email == $email ) {
			$first_name = $excel->val( $i, 1 );
			$last_name	= $excel->val( $i, 2 );

			$certificate['name'] = utf8_encode( $first_name . ' ' . $last_name );
			$certificate['type'] = $excel->val( $i, 4 );
			break;
		}
	}
?>
	<?php if ( isset( $certificate['name'] ) ) : ?>
	<div class="certificate">
		<div class="certificate-label">
			<span class="certificate-pre">Certificamos que</span>
			<span class="certificate-name"><?php echo $certificate['name']; ?></span>
			<?php switch ( $certificate['type'] ) : case 'palestrante' : ?>
			<span class="certificate-description">
				participou do evento "WordCamp Rio de Janeiro 2015",
				no dia 29 de agosto de 2015, na cidade do Rio de Janeiro,
				na qualidade de <strong>palestrante</strong>.
			</span>
			<?php break; ?>
			<?php case 'voluntario' : ?>
			<span class="certificate-description">
				participou do evento "WordCamp Rio de Janeiro 2015",
				no dia 29 de agosto de 2015, na cidade do Rio de Janeiro,
				na qualidade de <strong>voluntário</strong>, com carga horária de 10 horas
			</span>
			<?php break; ?>
			<?php default: ?>
			<span class="certificate-description">
				participou do evento "WordCamp Rio de Janeiro 2015",<br />
				no dia 29 de agosto de 2015, na cidade do Rio de Janeiro,<br />
				na qualidade de <strong>participante</strong>, com carga horária de 10 horas.
			</span>
			<?php break; ?>
			<?php endswitch; ?>
			<span class="certificate-date">
				<?php 
					$date = getdate();
					echo 'Rio de Janeiro, '. $date['mday'] . '/' . $date['mon'] . '/' . $date['year'];
				?>
			</span>
		</div>
	</div>
	<?php else : ?>
	<p class="alert">
		Não existe nenhum certificado para este e-mail.<br />
		<a href="javascript:history.back(-1);">< Voltar</a>
	</p>
	<?php endif; ?>
<?php else : ?>
	<p class="alert">
		E-mail inválido.<br />
		<a href="javascript:history.back(-1);">< Voltar</a>
	</p>
<?php endif; ?>
</body>
</html>