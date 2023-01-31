<?php
include '../koneksi.php';
                   
session_start();

//include koneksi

//get user detail
$id_akun = $_SESSION['id_akun'];
$query = "select * from akun where id_akun = ? limit 1";
$stmt = $koneksi->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $id_akun);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_array(MYSQLI_ASSOC);

                     $akun = mysqli_query($koneksi, "SELECT * FROM akun");
                     $b = mysqli_fetch_array($akun);
                     $kamar = mysqli_query($koneksi, "SELECT * FROM kamar");
                     $k = mysqli_fetch_array($kamar);
                    $data = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY id_pesanan DESC");
                 $d = mysqli_fetch_array($data); 
//call the FPDF library
require('../fpdf/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'HOTEL LAMPUNG',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Jl.Imam Bonjol, No.52]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[Bandar Lampung,35153]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$d['date'],0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+6289628771197]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$d['id_pesanan'],0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,@$user['id_akun'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,10,'Bukti Pemesanan Kamar',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(40 ,5,'- Nama Pemesan		:',0,0);
$pdf->Cell(90,5,@$user['nama'],0,0);
$pdf->Cell(40,5,'Tanggal Check In ',0,1);

$pdf->Cell(40 ,5,'- Email Pemesan		:',0,0);
$pdf->Cell(95 ,5,$d['email_pemesan'],0,1);

$pdf->Cell(40 ,5,'- Alamat		:',0,0);
$pdf->Cell(95 ,5,@$user['alamat'],0,0);
$pdf->Cell(40,5,$d['cek_in'],0,1);

$pdf->Cell(40 ,5,'- No Handphone :',0,0);
$pdf->Cell(30 ,5,$d['hp_pemesan'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(50 ,5,'Tipe Kamar',1,0);
$pdf->Cell(50 ,5,'Jumlah Kamar',1,0);
$pdf->Cell(50 ,5,'Harga Kamar',1,1);//end of line

$pdf->SetFont('Arial','',12);  
       $tagihan = $d['jml_kamar'] * $k['harga'];
$pdf->Cell(50 ,5,$d['id_kamar'],1,0);
$pdf->Cell(50 ,5,$d['jml_kamar'],1,0);
$pdf->Cell(50 ,5,"Rp." . number_format($k['harga'], 0, ',', '.'),1,1,'R');//end of line

$pdf->SetFont('Arial','',12);  
       $tagihan = $d['jml_kamar'] * $k['harga'];
$pdf->Cell(100 ,5,'Total tagihan',1,0);
$pdf->Cell(50 ,5,"Rp." . number_format($tagihan, 0, ',', '.'),1,1,'R');//end of line

//end of line
//output the result
$pdf->Output();


?>