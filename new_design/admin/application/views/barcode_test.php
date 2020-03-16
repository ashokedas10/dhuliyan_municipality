<?PHP

$barcode='1|A 28 DROP(HYDRA ALLEN)40.00';
$image='barcode1.png';
 $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode), array())->draw();
imagepng($imageResource, 'uploads/'.$image);

$barcode='2|DIS ZINCUM  SULPHURICUM - Q';
$image='barcode2.png';
 $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode), array())->draw();
imagepng($imageResource, 'uploads/'.$image);


$barcode='3|ABSCESS SALBE (BIOFORCE)';
$image='barcode3.png';
 $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode), array())->draw();
imagepng($imageResource, 'uploads/'.$image);

?>