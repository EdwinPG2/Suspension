<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formulario;
use App\Models\Area;
use App\Models\Especialidad;
use App\Models\ClinicaServicio;
use App\Models\Riesgo;
use App\Models\Cargo;
use Spatie\Permission\Models\Role;

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

        $cargos = [
            'Operador de Consola B  '
            , 'Registrador de Datos '
            , 'Ingeniero'
            , 'Operador de Consola A  '
            , 'Secretaria A '
            , 'Jefe de División '
            , 'Secretaria B '
            , 'Director de Unidad E '
            , 'Sub Director Financiero E '
            , 'Sub Director Administrativo E\n'
            , 'Administrador C  '
            , 'Asistente Administrativo A '
            , 'Asistente Administrativo B '
            , 'Asistente Administrativo C '
            , 'Auditor D '
            , 'Analista A '
            , 'Analista B '
            , 'Oficial Administrativo '
            , 'Agente de seguridad '
            , 'Albañil A '
            , 'Albañil B '
            , 'Aplanchador '
            , 'Archivista '
            , 'Arquitecto '
            , 'Asesor Jurídico Departamental '
            , 'Asistente de Ingeniero o Arquitecto A '
            , 'Asistente de Ingeniero o Arquitecto B '
            , 'Asistente de Autopsia '
            , 'Auxiliar de enfermería  '
            , 'Ayudante de Enfermería '
            , 'Bibliotecario A '
            , 'Biomédico '
            , 'Bodeguero A '
            , 'Bodeguero B '
            , 'Camarero '
            , 'Carpintero A '
            , 'Carpintero B '
            , 'Cocinero A '
            , 'Cocinero B '
            , 'Conserje '
            , 'Costurera '
            , 'Dibujante B '
            , 'Dientista '
            , 'Ecónomo '
            , 'Edecan '
            , 'Educador de Salud '
            , 'Electricista A '
            , 'Electricista B '
            , 'Encargado de Bodega A '
            , 'Encargado de Bodega B '
            , 'Encargado de Camareros  '
            , 'Encargado de Costurería '
            , 'Encargado de Rama de Electricidad '
            , 'Encargado de Lavandería '
            , 'Encargado de Mantenimiento B '
            , 'Encargado de Plomería '
            , 'Encargado de Registros Médicos B '
            , 'Encargado de Ropería B '
            , 'Enfermera Graduada '
            , 'Estadístico B '
            , 'Fotógrafo '
            , 'Herrero A '
            , 'Herrero B '
            , 'Ingeniero en Calidad  '
            , 'Jardinero '
            , 'Ingeniero en Sistemas Informaticos '
            , 'Jefe de Bodega y Almacén '
            , 'Jefe de Departamento Clínico '
            , 'Jefe de Farmacia '
            , 'Jefe de Laboratorio Clínico '
            , 'Jefe de Servicio de Enfermería '
            , 'Jefe de Servicio Médico '
            , 'Jefe de Unidad de Especialidad '
            , 'Mecánico A '
            , 'Mecánico B '
            , 'Médico Especialista A de 4 horas '
            , 'Médico Especialista A de 4 horas con turnos '
            , 'Médico Especialista A de 6 horas '
            , 'Médico Especialista A de 8 horas '
            , 'Médico Especialista B '
            , 'Médico Especialista B de 8 horas '
            , 'Médico General con turno de 6 horas '
            , 'Médico General de 4 horas '
            , 'Médico General con turno de 4 horas '
            , 'Médico General de 8 horas '
            , 'Residente EPS-EM '
            , 'Nutricionista '
            , 'Odontólogo General de 4 horas '
            , 'Odontólogo General de 8 horas '
            , 'Operador de Consola B '
            , 'Operador de Máquina Lavadora '
            , 'Piloto de Vehículo '
            , 'Pintor '
            , 'Plomero '
            , 'Procurador B Departamental '
            , 'Psicólogo A '
            , 'Psicólogo B '
            , 'Químico Biólogo '
            , 'Químico Farmacéutico '
            , 'Secretaria Ejecutiva B '
            , 'Sub Jefe de Laboratorio Clínico '
            , 'Sub Director Médico Hospitalario E '
            , 'Superintendente de Enfermería '
            , 'Supervisor de Enfermería  '
            , 'Técnico de Laboratorio '
            , 'Técnico en Banco de Sangre '
            , 'Técnico en Citología Exfoliativa '
            , 'Técnico en Farmacía '
            , 'Técnico en Patología '
            , 'Técnico en Radiología '
            , 'Técnico en Trabajo Social '
            , 'Terapista '
            , 'Trabajador Social '
            , 'Mecanico de Calderas B '
            , 'Ingeniero en Mantenimiento '
            , 'Médico Residente I '
            , 'Supervisor de Seguridad '
            , 'Médico Especialista A de 6 horas con turnos '
            , 'Jefe de Cocina '
            , 'Encargado de Albañilería '
            , 'Médico Especialista A de 6 horas con turnos '
            , 'Médico Residente II '
            , 'Técnico en Hemodiálisis  '
            , 'Médico Especialista de Consulta Externa de 6 horas  '
            , 'Médico Residente III '
        ];
        
        foreach($cargos as $item)
        {
            Cargo::create([
                'nombre' => $item
            ]);
        }

        $role = Role::create(['name' => 'Registrador-Registros Medicos']);
        $permissions = ['10','11','12','13','14','15','16','17','18','83'];
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'Revisor-Registros Medicos']);
        $permissions = ['19','20','21','22','23','24','25','26','35','36','37','38','75','76','77','78','79','80','81','82','84'];
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'Registrador-Prestaciones']);
        $permissions = ['19','20','21','22','23','24','25','26','75','76','77','78','79','80','81','82','84'];
        $role->syncPermissions($permissions);
    }
}
