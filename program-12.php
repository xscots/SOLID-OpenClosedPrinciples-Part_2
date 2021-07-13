<?php

interface BangunRuang{
  public function hitungBangunRuang();
}

class Bola implements BangunRuang{
  public $jejari;
  public function setJejari($jejari){
    return $this->jejari = $jejari;
  }

  public function hitungBangunRuang(){
    $volume = 4/3 * 3.14 * $this->jejari * $this->jejari * $this->jejari;

    return "Bangun Ruang : Volume Bola <br>
            Panjang Jari-jari : ". $this->jejari . "<br>
            Volume Bola : ". $volume. " m3";
  }
}

class Kubus implements BangunRuang{
  public $rusuk;
  public function setRusuk($rusuk){
    return $this->rusuk = $rusuk;
  }

  public function hitungBangunRuang(){
    $volume = $this->rusuk * $this->rusuk * $this->rusuk;

    return "<br>Bangun Ruang : Volume Kubus <br>
            Panjang Rusuk : ". $this->rusuk . "<br>
            Volume Kubus : ". $volume. " m3 <br>";
  }
}

class Kerucut implements BangunRuang{
  public $jejari;
  public $tinggi;

  public function setJejari($jejari){
    return $this->jejari = $jejari;
  }

  public function setTinggi($tinggi){
    return $this->tinggi = $tinggi;
  }

  public function hitungBangunRuang(){
    $volume = 1/3 * 3.14 * $this->jejari * $this->jejari * $this->tinggi;

    return "<br>Bangun Ruang : Volume Kerucut <br>
            Panjang Jejari : ". $this->jejari . "<br>
            Panjang Tinggi : ". $this->tinggi . "<br>
            Volume Kerucut : ". $volume. " m3 <br>";
  }
}

class PersegiPanjang implements BangunRuang{
  public $panjang;
  public $lebar;

  public function setPanjang($panjang){
    return $this->panjang = $panjang;
  }

  public function setLebar($lebar){
    return $this->lebar = $lebar;
  }

  public function hitungBangunRuang(){
    $luas = $this->panjang * $this->lebar;

    return "<br>Bangun Ruang : Luas Persegi Panjang <br>
            Panjang : ". $this->panjang . "<br>
            Lebar : ". $this->lebar . "<br>
            Luas Persegi Panjang : ". $luas. " m2 <br>";
  }
}

class Lingkaran implements BangunRuang{
  public $jejari;
  public function setJejari($jejari){
    return $this->jejari = $jejari;
  }

  public function hitungBangunRuang(){
    $luas = 3.14 * $this->jejari * $this->jejari;

    return "Bangun Ruang : Luas Lingkaran <br>
            Panjang Jari-jari : ". $this->jejari . "<br>
            Luas Lingkaran : ". $luas. " m2";
  }
}

class KalkulatorBangunRuangFactory{

  public function initializeKalkulatorBangunRuang($pilihan, $satuan){
    if($pilihan == 'volumeBola'){
      $bola = new Bola();
      $jejari = $bola->setJejari($satuan['jejari']);
      return $bola;
    }
    else if($pilihan == 'volumeKubus'){
      $kubus = new Kubus();
      $rusuk = $kubus->setRusuk($satuan['rusuk']);
      return $kubus;
    }
    else if($pilihan == 'volumeKerucut'){
      $kerucut = new Kerucut();
      $jejari = $kerucut->setJejari($satuan['jejari']);
      $tinggi = $kerucut->setTinggi($satuan['panjang']);
      return $kerucut;
    }
    else if($pilihan == 'luasPersegiPanjang'){
      $persegi_panjang = new PersegiPanjang();
      $panjang = $persegi_panjang->setPanjang($satuan['panjang']);
      $lebar = $persegi_panjang->setLebar($satuan['lebar']);
      return $persegi_panjang;
    }
    else if($pilihan == 'luasLingkaran'){
      $lingkaran = new Lingkaran();
      $jejari = $lingkaran->setJejari($satuan['jejari']);
      return $lingkaran;
    }
  }
}

$satuan = ['rusuk' => 12, 'panjang' => 0, 'lebar' => 0, 'jejari' => 0, 'tinggi' => 0];
$pilihanKalkulatorBangunRuang = 'volumeKubus';

$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang, $satuan);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang->hitungBangunRuang();
print_r($hasilKalkulatorBangunRuang);

?>