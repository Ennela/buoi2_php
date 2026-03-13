<?php
class HinhChuNhat
{
    public $dai;
    public $rong;
    public function tinhChuVi()
    {
        return ($this->dai + $this->rong) * 2;
    }
    public function tinhDienTich()
    {
        return $this->dai * $this->rong;
    }
}

$hcn = new HinhChuNhat();
$hcn->dai = 10;
$hcn->rong = 5;

echo "Diện tích: " . $hcn->tinhDienTich() . " - Chu vi: " . $hcn->tinhChuVi();
