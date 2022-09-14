<?php
class Product
{
    public function dataProduct($objek)
    {
        // Mengambil file Json
        $json_file = file_get_contents("config/data.json");

        // Mengubah standart encoding
        $json_file = utf8_encode($json_file);

        // Merubah Json menjadi Array Assosiatif
        $result = json_decode($json_file, true);

        $data =  $result[$objek];
        return $data;
    }
}
