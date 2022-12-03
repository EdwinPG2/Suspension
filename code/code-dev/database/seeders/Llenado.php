<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formulario;
use App\Models\Area;
use App\Models\Especialidad;
use App\Models\ClinicaServicio;
use App\Models\Riesgo;

use DB;
class Llenado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formularios = [['DPD-01','Documento de Apertura'],
        ['DEA','Documento Electronico de Acreditación'],
        ['SPS-60','Aviso de Suspensión'],
        ['SPS-58','Aviso de Suspensión de Trabajo por Maternidad'],
        ['SPS-59','Alta al Patrono'],
        ['SPS-53','Informe de Incapacidad Temporal'],
        ['SPS-172','Dictamen de Médico Final'],
        ['SPS-56','Aviso de Ingreso por Traslado'],
        ['SPS-57','Informe de Traslado'],
        ['SPS-57A','Informe Sobre Reingreso'],
        ['SPS-147','Control de Asistencia']];

        foreach($formularios as $item)
        {
            Formulario::create([
                'nombre' => $item[0],
                'descripcion' => $item[1],
            ]);
        }

        $areas = [['CONSULTA EXTERNA','AREA DEDICADA A LA ATENCION DE QUE INGRESAN POR CONSULTA'],
        ['EMERGENCIA','AREA DE EMERGENCIAS'],
        ['HOSPITALIZACION','AREA DE HOSPITALIZACION']];
        foreach($areas as $item)
        {
            Area::create([
                'nombre' => $item[0],
                'descripcion' => $item[1],
            ]);
        }

        $especialidades = ['MEDICINA INTERNA','GINECOLOGÍA','TRAUMATOLOGÍA','UMA',
        'MEDICINA FÍSICA','ODONTOLOGÍA','ESPECIALIDADES','CIRUGÍA GENERAL','NEFROLOGÍA',
        'COVID-19','CIRUGIA GENERAL','CIRUGÍA'];

        foreach($especialidades as $item)
        {
            Especialidad::create([
                'nombre_especialidad' => $item,
            ]);
        }

        $clinicas_servicios = [
            ['MEDICINA INTERNA', 'MI-COEX', '1', '1'],
            ['ENFERMEDAD COMÚN', 'MI-COEX', '1', '1'],
            ['GINECOLOGIA', 'GINE-COEX', '2', '1'],
            ['OBSTETRICIA', 'GINE-COEX', '2', '1'],
            ['ORTOPEDIA Y TRAUMATOLOGIA', 'TRAUMA-COEX', '3', '1'],
            ['CIRUGIA DE LA MANO', 'TRAUMA-COEX', '3', '1'],
            ['NEUROLOGIA', 'UMA-COEX', '4', '1'],
            ['COLOPROCTOLOGÍA', 'UMA-COEX', '4', '1'],
            ['ENFERMEDAD COMÚN', 'UMA-COEX', '4', '1'],
            ['NEUMOLOGÍA', 'UMA-COEX', '4', '1'],
            ['MEDICINA FISICA', 'MF-COEX', '5', '1'],
            ['PSIQUIATRIA', 'MF-COEX', '5', '1'],
            ['ODONTOLOGÍA', 'ODONTO-COEX', '6', '1'],
            ['CIRUGIA ORAL Y MAXILOFACIAL', 'ODONTO-COEX', '6', '1'],
            ['REUMATOLOGÍA', 'ESPE-COEX', '7', '1'],
            ['OTORRINOLARINGOLOGÍA', 'ESPE-COEX', '7', '1'],
            ['OFTALMOLOGÍA', 'ESPE-COEX', '7', '1'],
            ['CIRUGÍA GENERAL', 'CIRU-COEX', '8', '1'],
            ['CIRUGÍA ONCOLÓGICA', 'CIRU-COEX', '8', '1'],
            ['DERMATOLOGÍA', 'CIRU-COEX', '8', '1'],
            ['NEFROLOGÍA', 'NEFRO-COEX', '9', '1'],
            ['CALL CENTER COVID 19', 'COVID-COEX', '10', '1'],
            ['MEDICINA INTERNA HOMBRES', 'MI-HOSPI', '1', '3'],
            ['MEDICINA INTERNA MUJERES', 'MI-HOSPI', '1', '3'],
            ['CIRUGÍA HOMBRES', 'CIRU-HOSPI', '11', '3'],
            ['CIRUGÍA MUJERES', 'CIRU-HOSPI', '11', '3'],
            ['TRAUMATOLOGIA HOMBRES', 'TRAUMA-HOSPI', '3', '3'],
            ['TRAUMATOLOGIA MUJERES', 'TRAUMA-HOSPI', '3', '3'],
            ['GINECOLOGÍA', 'GINE-HOSPI', '2', '3'],
            ['OBSTETRICIA', 'GINE-HOSPI', '2', '3'],
            ['COVID HOMBRES', 'COVID-HOSPI', '10', '3'],
            ['COVID MUJERES', 'COVID-HOSPI', '10', '3'],
            ['ENFERMEDAD', 'MI-EMER', '1', '2'],
            ['ENFERMEDAD', 'GINE-EMER', '2', '2'],
            ['MATERNIDAD', 'GINE-EMER', '2', '2'],
            ['ENFERMEDAD', 'CIRU-EMER', '12', '2'],
            ['ACCIDENTE', 'CIRU-EMER', '12', '2'],
            ['ENFERMEDAD', 'TRAUMA-EMER', '3', '2'],
            ['ACCIDENTE', 'TRAUMA-EMER', '3', '2'],
            ['COVID', 'COVID-EMER', '10', '2'],
        ];
        foreach($clinicas_servicios as $item)
        {
            ClinicaServicio::create([
                'nombre' => $item[0],
                'descripcion' => $item[1],
                'id_especialidad' => $item[2],
                'id_area' => $item[3],
            ]);
        }

        $riesgos=['MATERNIDAD ABORTÓ','MATERNIDAD COMPLICACIONES DEL EMBARAZO',
        'ENFERMEDAD','ACCIDENTE COMÚN','ACCIDENTE TRABAJO','COVID-19'];

        foreach($riesgos as $item)
        {
            Riesgo::create([
                'nombre' => $item
            ]);
        }
    }
}