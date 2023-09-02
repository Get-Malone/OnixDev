<?php

require_once 'vendor/autoload.php';
require_once 'config/database.php';

use App\Models\Conferencista;
use App\Models\Sala;
use App\Models\Participante;

// Read Excel file
$file = 'conferencistas.xlsx';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($file);
$worksheet = $spreadsheet->getActiveSheet();

// Loop through rows
foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE);

    $data = [];

    // Loop through cells
    foreach ($cellIterator as $cell) {
        $data[] = $cell->getValue();
    }

    // Create Conferencista
    $conferencista = new Conferencista();
    $conferencista->nombre = $data[0];
    $conferencista->apellido = $data[1];
    $conferencista->email = $data[2];
    $conferencista->save();

    // Assign Sala
    $sala = Sala::where('capacidad', '>=', $data[3])->first();
    $conferencista->sala()->associate($sala);
    $conferencista->save();

    // Create Participantes
    $participantes = explode(',', $data[4]);
    foreach ($participantes as $participante) {
        $participante = trim($participante);
        $participante = new Participante(['nombre' => $participante]);
        $conferencista->participantes()->save($participante);
    }
}