<html>
	<head>
		<title>PDF</title>
	</head>
<body>
<h3>PDF</h3>
<?php
include ('./includes/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

//Horizontal increase: 15
$horizontal_position = 0;
$line_num = 1;
$pdf->Image('img/100.png',($hotizontal_position += 15),vertical_position('img/100.png')); //  15
$pdf->Image('img/a09.png',($hotizontal_position += 15),vertical_position('img/a09.png')); //  30
$pdf->Image('img/d00.png',($hotizontal_position += 15),vertical_position('img/d00.png')); //  45
$pdf->Image('img/a09.png',($hotizontal_position += 15),vertical_position('img/a09.png')); //  60
$pdf->Image('img/b05.png',($hotizontal_position += 15),vertical_position('img/b05.png')); //  75
$pdf->Image('img/j02.png',($hotizontal_position += 15),vertical_position('img/j02.png')); //  90
$pdf->Image('img/s02.png',($hotizontal_position += 15),vertical_position('img/s02.png')); // 105
$pdf->Image('img/e07.png',($hotizontal_position += 15),vertical_position('img/e07.png')); // 120
$pdf->Image('img/t01.png',($hotizontal_position += 15),vertical_position('img/t01.png')); // 135
$pdf->Image('img/p00.png',($hotizontal_position += 15),vertical_position('img/p00.png')); // 150
$pdf->Image('img/e07.png',($hotizontal_position += 15),vertical_position('img/e07.png')); // 165
$pdf->Image('img/g01.png',($hotizontal_position += 15),vertical_position('img/g01.png')); // 180

$pdf->Image('img/m03.png',($hotizontal_position += 15),vertical_position('img/m03.png')); // 195
$pdf->Image('img/b05.png',($hotizontal_position += 15),vertical_position('img/b05.png')); // 210

$pdf->SetFont('Arial','B',16);
$pdf->Cell(10,10,$horizontal_position+2,1,2,'C');

$pdf->Output();

function vertical_position($img_file){
	// *(ceil($horizontal_position/180))
	return ((50)-((getimagesize($img_file)[1]/2)/3.86)); 
}

?>
</body>
</html>
