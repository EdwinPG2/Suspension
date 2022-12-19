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
use App\Models\Medico;
use App\Models\User;
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
            ['REGISTROS MEDICOS', 'CASOS-REGMED',null,null],
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

        $users = [
            ['1000269','FRANCISCO ISAAC','LÓPEZ MARTINEZ','franciscoi.lopez@igssgt.org','Igssxela','2'],
            ['39093','MADELYN ROCÍO','DE LEÓN CIFUENTES','madelyn.deleon@igssgt.org','Igssxela','3'],
            ['38271','BETHZABÉ BERENICE','CARDONA TORRES','bethzabe.cardona@igssgt.org','Igssxela','2'],
            ['39115','SULMA ROXANA','SIGUANTAY CARDONA','sulma.siguantay@igssgt.org','Igssxela','2'],
            ['38563','LUISA MARÍA','MEJICANOS BONILLA','luisa.mejicanos@igssgt.org','Igssxela','4'],
            ['38380','KARLA PAOLA','FUENTES GONZALEZ','karla.fuentes@igssgt.org','Igssxela','2'],
            ['38982','NANCY ALEJANDRA','ASENCIO BATZ','nancy.asencio@igssgt.org','Igssxela','4'],
            ['38096','JENNY VIRGINIA','OSORIO RECINOS','jennyv.osorio@igssgt.org','Igssxela','3'],
            ['38246','ELIDA CELINA','IXCOT GARCIA','elida.ixcot@igssgt.org','Igssxela','3'],
            ['37888','JENNIFER FABIOLA','OVALLE','jenniffer.ovalle@igssgt.org','Igssxela','3'],
            ['37798','ESTRELLA ODILI','GARCIA REYES','estrella.garcia@igssgt.org','Igssxela','3'],
            ['39964','JULIO CESAR','FUENTES','julio.fuentes@igssgt.org','Igssxela','3'],
            ['37796','JUAN AMILCAR','FUENTES GODINEZ','juan.fuentes@igssgt.org','Igssxela','3'],
            ['39091','HEIDY ELEANY','MORALES ANGEL','heidy.morales@igssgt.org','Igssxela','3'],
            ['37811','PATRICIA GUADALUPE','ROJAS PEREZ','patricia.rojas@igssgt.org','Igssxela','3'],
            ['38976','RUTH ALEJANDRA','PEREZ GOMEZ','ruth.perez@igssgt.org','Igssxela','3'],
            ['37879','MARILYN MICHELLE','BARRIOS DE LEON','marily.barrios@igssgt.org','Igssxela','3'],
            ['37810','CLAUDIA MARCELA','CORZO JACOBS','claudia.corzo@igssgt.org','Igssxela','3'],
            ['38975','SANDRA INES','RECINOS GONZÁLEZ','sandra.recinos@igssgt.org','Igssxela','3'],
            ['37874','ANTONIA TERESA','CHOX CARRILLO','antonia.chox@igssgt.org','Igssxela','3'],
            ['25327','HENLY KARINA','FLORES ELIAS','henly.flores@igssgt.org','Igssxela','3'],
            ['39263','VERA DEL ROSARIO','RUIZ BARRIOS','vera.ruiz@igssgt.org','Igssxela','3'],
            ['38978','ANDREA ALEJANDRA','ARAUZ MEDRANO','andrea.arauz@igssgt.org','Igssxela','3'],
            ['1002145','JEAQUELINE MARIBEL','MAZARIEGOS','jeaqueline.mazariegos@igssgt.org','Igssxela','3'],
            ['1004249','MARIA PAOLA','ARCHILA GUARE','mariap.archila@igssgt.org','Igssxela','3'],
            ['38690','LUIS ROBERTO','ESCOBAR PEREZ','luisr.escobar@igssgt.org','Igssxela','3'],
            ['2002447','ELVIRA ENCARNACIÓN','ESTRADA ESTRADA','elvira.estrada@igssgt.org','Igssxela','3'],
            ['38300','LILIAN MARLEY','CASTILLO Y CASTILLO','lilian.castillo@igssgt.org','Igssxela','3'],
            ['1004237','EUGENIA BEATRIZ','OCHOA DE LEÓN','eugenia.ochoa@igssgt.org','Igssxela','3'],
            ['39119','ABSALÓN BENJAMÍN','LÉMUS SAMAYOA','absalon.lemus@igssgt.org','Igssxela','3'],
            ['37884','JOSE MARIO','CASTILLO MENDEZ','josem.castillo@igssgt.org','Igssxela','3'],
            ['38686','ROSA PATRICIA','GONZÁLEZ DE VIDAL','rosa.gonzalez@igssgt.org','Igssxela','3'],
            ['2003466','JESNEE MISHILCK','CIFUENTES MALDONADO','jesnee.cifuentes@igssgt.org','Igssxela','3'],
            ['37806','HENRRY WALBERTO','PAZ MACARIO','henrry.paz@igssgt.org','Igssxela','3'],
            ['37837','MARIA DE LOS ANGELES','CARDONA LOPEZ','mariad.cardona@igssgt.org','Igssxela','3'],
            ['39007','RAÚL ANTONIO','DE LEÓN PÉREZ','raula.deleon@igssgt.org','Igssxela','3'],
            ['37142','SUSANA INES','VEGA LOPEZ','susana.vega@igssgt.org','Igssxela','3'],
            ['2004613','ANGELICA DE ROCÍO','ROMANO VILLATORO','angelica.romano@igssgt.org','Igssxela','3'],
            ['2004695','DIDY LILY','PÉREZ HERRERA','didy.perez@igssgt.org','Igssxela','3'],
            ['1001850','WALTER FLORENCIO','YAX CHACLAN','walter.yax@igssgt.org','Igssxela','3'],
            ['37799','ANA PATRICIA','SUM ESCOBAR','ana.sum@igssgt.org','Igssxela','3'],
            ['39130','GLORIA FLORENCIA LYNDA','CHÁVEZ ESTRADA','gloria.chavez@igssgt.org','Igssxela','3'],
            ['1002239','ZULMA IRACEMA','ARGUETA POZ','zulma.argueta@igssgt.org','Igssxela','3'],
            ['1004296','MARTHA ISABEL','ARDIANO FUENTES','martha.ardiano@igssgt.org','Igssxela','3']
        ];

        foreach($users as $item)
        {
            User::create([
                'ibm' => $item[0],
                'name' => $item[1],
                'apellido' => $item[2],
                'email' => $item[3],
                'password' => $item[4],
                'role_id' => $item[5],
            ]);
        }



        $medicos = [
            ['37913','Cristina Ileana Racancoj Alonzo'],
        ['37914','Ana Lucía Palomo Leppe'],
        ['38011','Andrea Patricia Vital Acosta'],
        ['38025','Diana Gabriela Aguilar Soto'],
        ['38175','Benigno Hernández Marín'],
        ['38220','Paola Mercedes De León'],
        ['38388','Rocio Iveth García Piedrasanta'],
        ['38967','Tania Paola Rodas Aceituno'],
        ['39344','Amelia Isabel Leiva Anderson'],
        ['39372','Geny Kiomara Gómez Cotom'],
        ['39941','María Paola Durini Mérida'],
        ['1000252','Lisbeth Magaly Maldonado Barrios'],
        ['1000455','Carlos Eduardo Gutiérrez López'],
        ['39716','Robinson Vinicio Hidalgo Herrera'],
        ['1002046','Sergio Roberto Villatoro Amézquita'],
        ['2003036','Juan Alberto Quemé Maldonado'],
        ['1001719','Vasthy BriseiraOrozco Fuentes'],
        ['2004397','Esteban RafaelArriola Quiñonez'],
        ['1003510','Estefania Jackeline MaríaBarrera de León'],
        ['2002771','Ericka PatriciaCapriel Chiroy'],
        ['2005922','Angélica del RosarioMaldonado de León'],
        ['1003524','Kevin ArmandoTzum Zelada'],
        ['1003220','Karin MarissaChampet Soto '],
        ['1003555','Ericka PatriciaCapriel Chiroy'],
        ['1003560','José RicardoGuzmán Villatoro'],
        ['2006934','Astrid AngélicaDe León Ronquillo'],
        ['1004280','Astrid AngélicaDe León Ronquillo'],
        ['24749','Edgar Vinicio Molina De León'],
        ['25342','Danilo Bosbely De León Valdez'],
        ['29919','Enrique Ottoniel Aguilar Toc'],
        ['30427','Héctor Eduardo Lacán De León'],
        ['31793','Edwin Raul Manrique Alvarado'],
        ['38065','Carlos Arnulfo Gonzalez Juachín'],
        ['38083','Luis Alberto Galo Hernandez'],
        ['38141','Saira Patricia De León Santizo'],
        ['38193','Juan Luis Vasquez Comparini'],
        ['38249','José Fernando De León Laparra'],
        ['38251','Shary Roldán Mejía'],
        ['38252','Yesenia Sarahí Valdéz Bautista'],
        ['38330','Lesly Nineth Velásquez Monterroso'],
        ['38383','José Raúl Ordóñez Villatoro'],
        ['38411','Fernando Rodrigo Xet Monzón'],
        ['38418','Rudy Amílcar Estrada Lux'],
        ['38427','Luis Emilio Bucaro Echeverria'],
        ['38430','Fausto Alberto Chan Cux'],
        ['38432','Mercy Margoth Herrera Coyoy'],
        ['38478','Felix Noé Cojom Quijivix'],
        ['38479','Aura Madeleine Ramírez Calderón'],
        ['38480','María Regina Solares Azpurú'],
        ['38502','Elisa Liliana Xiap Satey'],
        ['38533','Gustavo Adolfo Xec Zacarías'],
        ['38552','Gloria Nancy Yolanda Rosales Fernández'],
        ['38561','Zaira Lucia Mejía Díaz'],
        ['38610','Lucía Alejandra Delgado Orózco'],
        ['38717','Alejandra Sofía Quemé Figueroa'],
        ['38718','Marco Vinicio Alvarez Maldonado'],
        ['38720','Ruben Alejandro Morales De Leon'],
        ['38897','Aura Violeta Boj Cotom'],
        ['38898','Evelin Lisseth López Granados'],
        ['38968','Patrick Kenny Hernández De León'],
        ['39141','Jorge Adalberto Pum Santiago'],
        ['39718','Rosalba Rosemary Rivas Herrera'],
        ['39752','Carlos Rodolfo Monterroso Bolaños'],
        ['39753','Evelyn Dinorah Vásquez Barrios'],
        ['39767','Kevin Josué Del Valle Rivas'],
        ['39890','Carlos Eduardo Molina Samayoa'],
        ['39896','Wendy Eugenia Canel Román'],
        ['39940','Rosa Elena Galindo Díaz'],
        ['39942','Javier Orlando Sim López'],
        ['39968','Mynor Renato Portillo Aragón'],
        ['39997','Edgar Ricardo López Osorio'],
        ['1000016','Walfred Abel Escobar Calderón'],
        ['1000017','Oscar Daniel Sum Quijivix'],
        ['1000070','Allan Andre Rodríguez Molina'],
        ['1000160','Shirley Jeanette López Marroquín'],
        ['1000275','Williams Josué Chamorro Talé'],
        ['1000453','Ana Mariela Montenegro Solares'],
        ['1000454','Johannán Adin Tajtaj Veliz'],
        ['1000458','Hilda María Perez Montalván'],
        ['1000459','José Manuel Silvestre Loarca'],
        ['1000460','Antonia González Alvarez'],
        ['1000589','Heidi Tatiana Fuentes Canales'],
        ['1000618','Héctor Mesala Escobar Rodríguez'],
        ['1002084','Gloria Lissette Villela De León'],
        ['1001033','María GabrielaAncheta González'],
        ['2002689','Luis Francisco Herrera Aquino'],
        ['1002526','Patrick Rolando Robles Diaz'],
        ['1001868','José RobertoTay'],
        ['1002013','Eusebia BeatrizGonzález Espinoza'],
        ['2004418','Mónica Lizeth García Ramírez'],
        ['1002201','Angela SofíaOvalle de León'],
        ['1001117','Luis Francisco Herrera Aquino'],
        ['2004070','Nancy Melina IvetteMendoza Calmo'],
        ['2004069','Eduardo AlbertoRamos Pérez'],
        ['1003174','Luis DavidGómez Moscoso'],
        ['1002657','Efraín IsaíMazariegos Cottom'],
        ['1003318','Lucy SuramaPeñate Rangel '],
        ['2006009','Giezy GerardineGarcía Guerra'],
        ['2006191','Gustavo AdolfoRamos Yax'],
        ['1004349','Jorge NoeDe Leon Colop'],
        ['31518','ASP-Gabriela Noemi Mejia Say'],
        ['2006788','Aywin AudelioPerez Arreaga'],
        ['1003214','Ana BernardaHernández Poz'],
        ['79526','Róbinson StuardoDe león Rodas'],
        ['48566','Mireytt LizettCalderón Pérez'],
        ['2007027','Valeska IvetteHernandez Sao'],
        ['2007028','Ivonne María IvetteArgueta Cifuentes'],
        ['1003942','Camilo QuicabTiu Grijalva'],
        ['1004124','Diego AlejandroMorales Alcázar'],
        ['2007602','Antulio JosuéRequena Velásquez'],
        ['1004265','Estela MaríaHerrera Medina '],
        ['1004266','Lucrecia LorenaQuixtan Pon'],
        ['1004344','Rossana IbetheBarrios Osorio'],
        ['1004405','Wilmar RafaelLopez Monterroso'],
        ['1004452','Giezy GerardineGarcía Guerra'],
        ['2008058','María AzucenaGarcía Bautista'],
        ['33365','ASP Gabriela María BelénHernández Palacios'],
        ['1004587','Joellyn JeminaReyes Villagrán'],
        ['35788','Vivian Natalia Gómez García'],
        ['37734','Edgar Rolando Chún Pelicó'],
        ['38288','María Alejandra Tucux López'],
        ['38531','Henry Oswaldo Pisquiy Quixtan'],
        ['38535','Mariela Teresa Del Rosario Yax Escobedo'],
        ['38584','Alvaro Israel Hernández López'],
        ['38299','Sulmy Paola De Paz Chávez'],
        ['38428','Adolfo Antonio Ochoa Cabrera'],
        ['2001426','Juan HeberCastellaños Quiñónez'],
        ['1001403','María del CármenCastillo Villatoro'],
        ['1001851','Diana IvettePérez Baten'],
        ['38439','Celly Anayté Rodríguez Arango'],
        ['37716','Julio César Aguilar Rosales'],
        ['37918','Selvin Francisco Gonón Chan'],
        ['38127','Julio Herolde León Natareno'],
        ['38501','Aida Modesta Barreno Citalán'],
        ['38528','Juan De Dios Morales Ralda'],
        ['38529','Ana Guisela Monzón Guzmán'],
        ['38970','Orlando Ayerdi Mazariegos'],
        ['39109','Jeniffer Marizza López Morales'],
        ['39161','Lucrecia Leonor Guerrero Saso'],
        ['39373','Reina Antonieta Maldonado Barrios'],
        ['39717','Miguel Francisco Silvestre Vela'],
        ['1000451','Lesly Gabriela Gutiérrez Dávila'],
        ['38725','José Roberto Loarca Hernández'],
        ['33009','Ingrid Janelorén Santiago Maldonado'],
        ['33771','Claudia Carolina Acevedo Montes'],
        ['39594','Lucía Alejandra García De León'],
        ['1002604','José Francisco Alvarado Estrada'],
        ['1001435','Juan Francisco Rios Bucaro'],
        ['1000960','Andrea EvicelaZamora Argueta'],
        ['1000957','Juana MaríaXuruc Batz'],
        ['2003780','Aldo HumbertoMejía Macario'],
        ['75194','Walter Alexander Jimenez Ramírez'],
        ['2004452','Ingrid PatriciaToyom Zapeta'],
        ['2006154','Edwyn JhowanyPol Ceto'],
        ['2006628','Wilder OsvelyBautista Arango'],
        ['2006935','Kimberly María CristinaHerwing Alfaro'],
        ['49085','Pablo JoséFuentes Díaz'],
        ['38719','Ana Isabel Chivalan Castro'],
        ['1000251','Yadira Lisbeth Mérida Escobedo'],
        ['1000452','Marilogi Alvarez Xuruc'],
        ['33632','José Manuel Benavente Larios'],
        ['35593','Eloisa Del Carmen Lopez Morales'],
        ['37906','Tito Belizario Ixcot Mejía'],
        ['37904','Victor Gustavo García Bautista'],
        ['37916','Manuel De Jesús Ro Gómez'],
        ['38076','Aldo Juancarlos Calderón Contreras'],
        ['38132','Heydi Marisol De León Villagrán'],
        ['38168','Kévin Esaú Soch Tohóm'],
        ['38170','Carlos Herberth Méndez Sandoval'],
        ['38192','Juan José Deyet Arévalo'],
        ['38481','Marcos Davíd González Mazariegos'],
        ['38532','Iliana María Cifuentes Díaz'],
        ['38606','Gover Stev Sánchez Morales'],
        ['39960','Héctor Rocael Laparra Cifuentes'],
        ['1000254','Glenda Vanessa Gómez Aceytuno'],
        ['1000450','Deisy Carolina Elizabeth Ixcaquic Son'],
        ['1000591','Walter Albino Quiejnay González'],
        ['1001870','Christian DagobertoLópez Santos'],
        ['34404','Miriam SucellyMaaz Rodríguez'],
        ['1002616','Carmen MariaOsoy Colop'],
        ['1004387','Katherine Madelyn RocíoRodríguez Fuentes'],
        ['1003561','Eduardo AlbertoRamos Pérez'],
        ['2007209','Leonel JoséGonzález De León'],
        ['2007280','German RodolfoSac López'],
        ['2007398','Marlon EsaúIllescas Ruano'],
        ['1004388','Edwyn JhowanyPol Ceto'],
        ['2007163','Erick DanielQuijivix Gonzalez'],
        ['2007397','Jorge EstuardoHerrera Palacios'],
        ['39897','María RoselinaPerussina Méndez'],
        ['38274','Nathaly Mishell Alonzo García'],
        ['38281','Jorge Luis Gutierrez Loarca'],
        ['38290','Ruby Julieta Pisquiy MontesDe Oca'],
        ['2003345','Mayra Surama Tistoj Villagrán'],
        ['2004571','Karen ElizabethLópez Reyna'],
        ['2004615','Luis ManuelLópez Ramos'],
        ['2004569','Sindy RosalbaRamírez Sanchez'],
        ['2004619','Sandra Paola Mishel Sac Toc'],
        ['2004620','Edith OneliaDe León Vásquez'],
        ['2004622','Hugo AlexanderIxcopal Xitumul'],
        ['2004687','María FernandaZacarías Sigüenza'],
        ['2004616','Mieily PaolaAlva Velásquez'],
        ['2004572','Yecenia del RosarioSabaj Citalán'],
        ['2004609','MichelleAguilar Quijivíx'],
        ['2004614','Nancy PaolaCotom Chávez'],
        ['2004610','Wendy YomaraCifuentes Mijangos'],
        ['2004570','Edna Angélica EmperatrizAguilar Cotom'],
        ['2004611','Vera AracelyMenchú García'],
        ['2004685','David EstuardoNavarro Loarca'],
        ['2004660','Diego ManuelLoarca Navarro'],
        ['2004665','Lida FrinéCruz Aguirre'],
        ['2004835','William RobertoSuchite Raxtún'],
        ['2004863','Byron RobertoMiranda Orozco'],
        ['2004834','Denis RenéCuc Vásquez'],
        ['2004740','Roxana MilagrosAlvarez Navarro'],
        ['2004742','Eleazar MahelyCastañon Díaz'],
        ['2004661','Glendy LorenaHernández de León'],
        ['2004739','Cármen SofíaCifuentes Rodas'],
        ['2004866','Sara ElizabethReyes Gómez'],
        ['2005061','Luis MoisésCoyoy Yax'],
        ['2005000','Olga RocíoCurruchiche Cigarroa'],
        ['2004981','Marco AntonioRoblero Velásquez'],
        ['2004897','Josselyn IvonnePérez Chan'],
        ['2004895','Marvin Joel LeonelChan Hernández'],
        ['2005162','Johanna LucreciaGutiérrez Ixquiac'],
        ['2005232','Ruth AlejandraShiloj Barrera'],
        ['2003748','Alfredo EnriqueRubio Herrera'],
        ['2004095','María JoséMorfin Oroxon'],
        ['2004390','Vera LuciaTurnil Ramos'],
        ['2005357','Gabriela Yanneth García López'],
        ['78584','Gabriela Aracely Guzmán López'],
        ['2005271','Erick AlfonsoMolina Abadía'],
        ['2005678','Lucrecia LorenaQuixtan Pon'],
        ['2005676','Karen Mary GabrielaYax Toyom'],
        ['2005675','Delia Sophía del Cid Castillo'],
        ['2005677','Karla Yesenia Miranda Sandoval'],
        ['2005679','Julio César Castillo Pac'],
        ['2005782','Rossana Ibethe Barrios Osorio'],
        ['2005937','Jorge RobertoRíos Zambrano'],
        ['2005958','Hugo AldoTzoc Lacán'],
        ['2006028','Massiel AlejandraMéndez López'],
        ['2006066','Rodrigo AndrésBautista Rodas'],
        ['2006064','Kevin ErnestoEstrada González'],
        ['2006144','Jesus EstuardoEscobar Castillo'],
        ['2006186','Gloria SucelySoch Pacheco'],
        ['2006382','Luis AdanRodas Santos '],
        ['2006529','Manuel AlbertoEstrada Taracena'],
        ['2006789','Milvia Walhescka Cano Flores'],
        ['2006790','Bélsida LeonorBaten Lucas'],
        ['2006936','Mirna AbelinaRamos Pérez'],
        ['2007046','Isabel de LourdesAjutun Pelico'],
        ['2007050','Elisa RosmeryMartínez Martínez'],
        ['2007049','Rafael VinicioGonzález Gil'],
        ['2007504',' Evelyn YazminOlivia Gutiérrez'],
        ['2004278','José IsraelMacario Velásquez'],
        ['2007886','Margarita del RosarioChan Vicente'],
        ['38295','Irma Lizet Ovalle Darodes'],
        ['2008059','José FerlandyEscobar Portillo'],
        ['24731','Hania Veronica Chavez Alonzo'],
        ['38482','Ana Iris Vásquez Cifuentes'],
        ['39352','Victor Yax Leiva'],
        ['1001402','Yeimi DennisseMorales Rodas'],
        ['1001731','Monica Lucia Castillo López'],
        ['1001433','José FélixZarat Méndez'],
        ['1001432','Alba BenitaJimenez Xum'],
        ['1002026','Gary AlbertoRamírez Rubio'],
        ['2004666','Lesly ClaireMárquez Arreaga'],
        ['1003213','Taryn YuririaDíaz de León'],
        ['2006291','María GabrielaArgüello Serrano'],
        ['2006791','Camilo QuicabTiu Grijalva'],
        ['2007710','Maritza Elodia Marina EulaliaCupil Barrios'],
        ['38215','Pedro Antonio Bautista Dominguez'],
        ['1002590','Seidy Lisbeth Monterroso González'],
        ['1001436','Luis AugustoPérez Orozco'],
        ['1001400','Floridalma Isabel Quijivix Ixquiac'],
        ['1001399','Emerson NoéCalderón Barrios'],
        ['1001437','Pablo Efraín Velásquez Castañeda'],
        ['2003038','Beggli YeseniaCastro Rivas'],
        ['2004621','Paula MaríaGutiérrez de León'],
        ['78196','Aura MichelleHerrera Flores'],
        ['2004101','Cristian ManuelVásquez Velásquez'],
        ['2004097','Laura RocíoRuíz Amézquita'],
        ['1003851','Marlee Walesska Gramajo Ambrosio'],
        ['2004103','Ingrid PaolaGómez Cortéz'],
        ['35613','Gustavo RamiroMérida Reina Amaya'],
        ['2006100','Bladimir Wilmer FranciscoAguaré Gómez'],
        ['2006937','Mérari AndreínaCastillo De León'],
        ['2007116','Astrid AnalisseMendoza Molina'],
        ['33312','ASP Laura YesseniaAlvarado Marín'],
        ['33230','ASP Karenn AntonioPérez Ortega'],
        ['1001741','María FernandaMérida Luna'],
        ['1003935','José IsraelMacario Velásquez'],
        ['1003840','Samanta YazmínUlín Pérez'],
        ['1003841','Alba María Rosal Díaz'],
        ['1001737','Hansel Roberto Argueta García'],
        ['1003836','César ArmandoXec Ixcamparij'],
        ['1003838','Jenifer Zoé De León Ruíz'],
        ['32055','Heidy KarinaMorales Chuc'],
        ['1003850','María XimenaMaldonado Higueros'],
        ['32024','ASP-Shirley AlejandraMolina Gordon'],
        ['1003837','Cynthia CorinaCastillo Villatoro'],
        ['1004323','Adria GennineGodínez Zepeda'],
        ['1004367','Delia MaríaReyes Escobar'],
        ['2004617','Ana BernardaHernández Poz'],
        ['2004618','Carlos GiovanniAlvarez Godinez'],
        ['2004894','Juana GriceldaLópez Martínez'],
        ['2006116','José RicardoGuzmán Villatoro'],
        ['2006340','Wilmar RafaelLopez Monterroso'],
        ['2007047','Hilda LeonorDíaz Mora'],
        ['2007125','Alejandra AnalíMazariegos Flores'],
        ['2007279','José  AndréBarraza Gomez'],
        ['2003636','Darío EstuardoMencos Ariza'],
        ['2005734','Joellyn JeminaReyes Villagrán'],
        ['2007045','Nestor EmanuelLara García'],
        ['2007162','Estela MaríaHerrera Medina '],
        ['2007601','Alexia YomaraTacam Son'],
        ['1001738','María AlejandraBarrios de León'],
        ['1002640','RolandoRo Gómez'],
        ['1002411','Jorge Daniel Castillo Solis'],
        ['1002416','Maya LauraMonterroso Fuentes'],
        ['1001736','Claudia Lucrecia López Castillo'],
        ['1001740','Kristy María Solares Rodríguez'],
        ['1002410','Otto René Samayoa Natareno'],
        ['39281','Jackelinne Kimberly Cum Mis'],
        ['1002409','Lizbeth Analy Cifuentes Mazariegos'],
        ['1003346','Dulce María ConcepciónFuentes Najarro'],
        ['1002413','Marilyn Nohemy Galicia Juárez'],
        ['1002420','Margarita del RocíoFuentes Figueroa'],
        ['1002421','Oscar FernandoLópez Rodas'],
        ['1002417','María Mercedes Ralón'],
        ['1002419','Andrea María Yllescas Molina'],
        ['1002423','Cindy Paulita EstefanyGómez Ramírez'],
        ['1002418','Katherinne Paola Najera Reyes'],
        ['1002422','Yoselin YaritzaMorales Velásco'],
        ['1002412','Andrea CoraliaLoarca Chávez'],
        ['1003408','Silvana EstefaniaCháves Torres'],
        ['1001725','Cristian LorenzoChávez Zamora'],
        ['1001726','Edgar FernandoSum Racancoj'],
        ['1001727','Juan SantiagoZapeta Ávila'],
        ['1001728','Bryan José Hidalgo Gil'],
        ['1001729','María Cristina Del Carmen Monterroso Sosa'],
        ['1001730','Andrea del Carmen Ruano Díaz'],
        ['1001739','Anyee Gabriela De León Miranda'],
        ['1001742','Edgar Estuardo Nimatuj Ca '],
        ['1001998','Howard Romeo Bradley Vásquez'],
        ['1001999','Claudia Carolina Guillén Rivera'],
        ];
        foreach($medicos as $item)
        {
            Medico::create([
                'colegiado' => $item[0],
                'nombres' => $item[1],
            ]);
        }

        $role = Role::create(['name' => 'Administrador']);
        $permissions = ['1','2','3','4','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27',
        '28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57',
        '58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87',
        '88','89','90','91','92','93','94','95','96','97','98','99','100'];
        $role->syncPermissions($permissions);

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
