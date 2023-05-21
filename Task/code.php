<?php
function yeniAd($ad) {
    $fayl = fopen("adlar.txt", "a+"); // "adlar.txt" faylı həm oxumaq, həm də yazma rejimində açır
    $adlar = array();

    // Faylı sona qədər oxuyur və adları massivə əlavə edir 
    while (($setir = fgets($fayl)) !== false) {
        $adlar[] = trim($setir); // Hər sətirdəki adı  massivə əlavə edib , başdakı və sondakı boşluqları təmizliyir 
        
    }

    $adlar[] = $ad; // Yeni ad əlavə edir
    sort($adlar, SORT_FLAG_CASE | SORT_STRING); // Adları əlifba sırası ilə sıralayır 

    // Faylı təmizləyir və çeşidlənmiş adları yenidən fayla yazır 
    ftruncate($fayl, 0);
    rewind($fayl);
    foreach ($adlar as $siralananAd) {
        fwrite($fayl, $siralananAd . "\n");
    }

    fclose($fayl); // Faylı bağlıyır

    // Yeni əlavə edilmiş adın sətir nömrəsini qaytarır 
    return count($adlar);
}

//  Funksiya çağırdığında massivə keçirir
$Setir1 = yeniAd("Alice");
echo "Ad, " . $Setir1 . ". sətirə əlavə edilmişdir.";

$Setir2 = yeniAd("John");
echo "Ad, " . $Setir2 . ". sətirə əlavə edilmişdir.";

$Setir3 = yeniAd("Robert");
echo "Ad, " . $Setir3 . ". sətirə əlavə edilmişdir.";

?>