<?php
/**
 * Template Name: Certificado
 * Description: Template feito na ridicularidade máxima, por favor na ria ou chore disso. Não cara, para. Sério. Segura as lágrimas pf :(
 */

 // This is an ugly hack to load the CSV lib without using composer. I'm sorry!
 // See http://stackoverflow.com/questions/39571391/psr4-auto-load-without-composer
 function loadPackage($dir)
 {
     $composer = json_decode(file_get_contents("$dir/composer.json"), 1);
     $namespaces = $composer['autoload']['psr-4'];

     // Foreach namespace specified in the composer, load the given classes
     foreach ($namespaces as $namespace => $classpath) {
         spl_autoload_register(function ($classname) use ($namespace, $classpath, $dir) {
             // Check if the namespace matches the class we are looking for
             if (preg_match("#^".preg_quote($namespace)."#", $classname)) {
                 // Remove the namespace from the file path since it's psr4
                 $classname = str_replace($namespace, "", $classname);
                 $filename = preg_replace("#\\\\#", "/", $classname).".php";
                 include_once $dir."/".$classpath."/$filename";
             }
         });
     }
 }

 loadPackage(__DIR__."/inc/certificate/lib/csv");
 use League\Csv\Reader;

require_once get_template_directory() . '/inc/certificate/lib/mpdf/mpdf.php';

if ( isset( $_GET['email'] ) ) {
	$email = sanitize_email( $_GET['email'] );
  $source = WP_CONTENT_DIR . '/uploads/2017/01/21-meetup.csv';
  $csv = Reader::createFromPath($source);
	$attendees = $csv->setOffset(1)->fetchAll();

	foreach ( $attendees as $attendee ) {
		$current_email = $attendee[2];
		if ( $current_email === $email ) {
			$attendee_name = sanitize_text_field( $attendee[1] );
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
					participou do 20º WordPress Meetup, no dia 29 de outubro de 2016,
					na Universidade Veiga de Almeida, com carga horária de 3 horas.
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
