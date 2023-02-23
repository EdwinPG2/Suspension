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





        $medicos = [
        ['16933','Nery Josué Hernández Martínez'],
        ['15242','Rudy Amílcar Estrada Lux'],
        ['13597','Carlos Arnulfo González Juachín'],
        ['12824','Gover Stev Sánchez Morales'],
        ['16367','José Fernando De León Laparra'],
        ['12847','Ana Isabel Chivalán Castro'],
        ['14924','Carlos Herberth Méndez Sandoval'],
        ['10801','Aldo Juancarlos Calderón Contreras'],
        ['10618','Orlando Ayerdi Mazariegos'],
        ['13196','Celly Anayté Rodríguez Arango'],
        ['15371','Carlos Rodolfo Monterroso Bolaños'],
        ['10504','Hector Eduardo Lacan De León'],
        ['12626','Mynor Renato Portillo Aragón'],
        ['11602','Oscar Daniel Sum Quijivix'],
        ['17123','Juan Francisco Ríos Bucaro'],
        ['14462','Héctor Mesala Escobar Rodríguez '],
        ['16311','Vasthy Briseira Orozco Fuentes'],
        ['15175','Gary Alberto Ramírez Rubio'],
        ['19366','José Ricardo Guzmán Villatoro'],
        ['18216','Ecner Morel Hidalgo Díaz '],
        ['18521','Esteban Rafael Arriola Quiñonez'],
        ['25033','Kelly Melissa Díaz Maldonado '],
        ['24843','Inés Esthefany Corado Carrillo '],
        ['20673','Tess Kirstin Godo Simon '],
        ['14848','Jose Pablo Fuentes Díaz '],
        ['19675','José André Barraza Gómez '],
        ['15797','Rodolfo German Sac López  '],
        ['13327','Carmen María Osoy Colop'],
        ['3320','Sucely Rosario Soto '],
        ['18071','Lynda Michelle Méndez Carranza '],
        ['21088','Nancy Paola Girón López'],
        ['18358','Brenda Jazmin Soch Chiche'],
        ['84010','Enrique Otoniel Aguilar Toc'],
        ['9487','Edwin Raúl Manrique Alvarado'],
        ['7996','Walda Francisca Hoffens Alfaro'],
        ['11020','Cristina Ileana Racancoj Alonzo'],
        ['6075','Benigno Hernández Marín '],
        ['17066','María Alejandra Tucux López'],
        ['14519','Orfa Zucelí Gómez de León'],
        ['14305','Alfonso Rigoberto Velasquez Orozco'],
        ['17710','José Raúl Ordoñez Villatoro'],
        ['14292','Fausto Alberto Chan Cux'],
        ['8946','Aida Modesta Barreno Citalán'],
        ['14518','Gustavo Adolfo Xec Zacarias'],
        ['9879','Miguel Francisco Silvestre Vela'],
        ['16530','Allan Andre Rodriguez Molina'],
        ['18215','Andrea Evicela Zamora Argueta'],
        ['15370','Monica Lucia Castillo López'],
        ['15266','Diana Ivette Pérez Baten'],
        ['14498','José Roberto Tay'],
        ['19389','Angela Sofía Ovalle de León'],
        ['18098','Taryn Yuririda Diaz de León '],
        ['18953','Jorge Noe de León Colop'],
        ['17302','Valeska Ivette Hernandez Sao'],
        ['19696','Ivone María Ivette Argueta Cifuentes'],
        ['19753','Hilda Leonor Díaz Mora'],
        ['19954','Alejandra Anali Mazariegos Flores'],
        ['18068','Jorge Estuardo Herrera Palacios'],
        ['17285','Gabriela María Belén Hernandez Palacios'],
        ['23965','Abner Alexis Alvarado Tzul '],
        ['24136','Adria Gennine Godinez Zepeda'],
        ['16035','Alba Benita Jimenez  Xum'],
        ['22941','Alba María Rosal Diaz'],
        ['13117','Alberto Fernando Axt Mull'],
        ['14345','Albin Francisco Castro Fernández'],
        ['20422','Alfredo Enrique Rubio Herrera'],
        ['14025','Amelia Isabel Leiva Anderson'],
        ['18852','Ana Iris Vásquez Cifuentes'],
        ['22193','Andrea Coralia Loarca Chavez'],
        ['22343','Andrea Del Carmen Ruano Diaz'],
        ['24996','Andrea Gabriela Celada Ramirez'],
        ['13768','Andrea Patricia Vital Acosta'],
        ['13463','Angel Enrique De Leon Salazar'],
        ['16925','Antonia Gonzalez Alvarez'],
        ['14441','Aura Michelle Herrera Flores'],
        ['20322','Beggli Yesenia Castro Rivas'],
        ['19739','Bélsida Leonor Baten '],
        ['23743','Bladimir Wilmer Francisco Aguare Gomez'],
        ['22446','Bryan Jose Hidalgo Gil'],
        ['21644','Carlos Raul Aquino Morales'],
        ['18796','Carmen Sofia Cifuentes Rodas'],
        ['24203','Cynthia Corina Castillo Villatoro'],
        ['15212','Dario Estuardo Mencos Ariza'],
        ['16457','Deisy Carolina Elizabeth Ixcaquic Son'],
        ['23184','Delia Maria Reyes Escobar'],
        ['23521','Dulce Maria Concepcion Fuentes Najarro'],
        ['17090','Edwyn Jhowany Pol Ceto'],
        ['17078','Efrain Isai Mazariegos Cottom'],
        ['14501','Elisa Liliana Xiap Satey'],
        ['14558','Eloisa Del Cármen López Mórales'],
        ['15684','Emerson Noé Calderón Barrios'],
        ['14687','Erick Alfonso Molina Abadia'],
        ['18816','Erick Daniel Quijivix Gonzalez'],
        ['16099','Floridalma Isabel Quijivix Ixquiac'],
        ['19437','Francisco Antonio López Cos'],
        ['15777','Gabriela Aracely Guzmán López'],
        ['17888','Gabriela Yanneth García López'],
        ['19448','Giezy Gerardine García Guerra'],
        ['21705','Glendy Lorena Hernandez De León'],
        ['13574','Gloria Nancy Yolanda Rosales Fernandez'],
        ['22263','Ingrid Paola Gómez Cortéz '],
        ['18091','Ingrid Patricia Toyom Zapeta'],
        ['8532','Irma Lizet Ovalle Darodes'],
        ['18002','Jackelinne Kimberly Cum Mis'],
        ['12236','Jaime Fernando Alvarez Cotí'],
        ['24231','Jenifer Zoe De Leon Ruiz'],
        ['23744','Jesús Estuardo Escobar Castillo'],
        ['20236','Joellyn Jemina Reyes Villagrán'],
        ['22503','Johanna Lucrecia Gutiérrez Ixquiac'],
        ['22521','Jorge Daniel Castillo Solis'],
        ['20248','Jorge Roberto Ríos Zambrano'],
        ['18701','José Félix Zarat Méndez'],
        ['14348','José Francisco Alvarado Estrada'],
        ['22520','Jose Israel Macario Velasquez'],
        ['13632','Jose Manuel Benavente Larios'],
        ['15873','José Manuel Silvestre Loarca'],
        ['15185','Juan José Deyet Arévalo'],
        ['16339','Juana María Xuruc Batz '],
        ['17528','Julio Herol De Leon Natareno'],
        ['22499','Karen Mary Gabriela Yax Toyom'],
        ['18721','Karin Andrea Archila Eguizabal'],
        ['17716','Katherine Madelyn Rocío Rodríguez Fuentes'],
        ['20752','Kevin Ernesto Estrada González'],
        ['16533','Kevin Josue Del Valle Rivas'],
        ['18735','Kimberly María Cristina Herwing Alfaro'],
        ['20430','Laura Rocio Ruiz Amezquita'],
        ['14717','Leonel José Gonzalez De León'],
        ['13491','Lida Frine Cruz Aguirre'],
        ['22501','Lizbeth Analy Cifuentes Mazariegos'],
        ['25187','Lucas Rolando Barrera Lux '],
        ['16592','Lucia Alejandra Garcia De Leon'],
        ['20292','Luis Augusto Perez Orozco'],
        ['19392','Luis Manuel Lopez Ramos'],
        ['24058','Manuel Alberto Estrada Taracena'],
        ['14413','Manuel De Jesus Rojas Gomez'],
        ['23372','Marco Antonio Roblero Velasquez'],
        ['15132','Marco Vinicio  Alvarez Maldonado'],
        ['13119','Marcos David Gonzalez Mazariegos'],
        ['20570','Maria Jose Morfin Oroxom'],
        ['21359','Maria Roselina Perussina Méndez'],
        ['21540','Marilyn Nohemy Galicia Juarez'],
        ['23884','Massiel Alejandra Méndez López'],
        ['22336','Mayra Surama Tistoj Villagran'],
        ['18781','Merári Andreína Castillo De León '],
        ['18497','Mirna Abelina Ramos Perez'],
        ['19414','Mishell Quijivix Aguilar'],
        ['17939','Nathaly Mishell Alonzo Garcia '],
        ['23799','Nestor Emanuel Lara Gacoa'],
        ['22220','Olga Rocío Curruchiche Cigarroa'],
        ['23589','Otto Rene Samayoa Natareno'],
        ['20290','Pablo Efrain Velasquez Castañeda'],
        ['23336','Paula Maria Gutierrez De Leon'],
        ['15847','Pedro Antonio Bautista Dominguez'],
        ['21364','Rolando Rojas Gomez'],
        ['15911','Rosa Elena Galindo Diaz'],
        ['7149','Ruby Julieta Pisquiy Montes De Oca Zelada'],
        ['20280','Samanta Yazmin Ulin Perez'],
        ['12685','Tito Belizario Ixcot Mejía'],
        ['21951','Vera Lucia Turnil Ramos'],
        ['12848','Victor Gustavo García Bautista'],
        ['12801','Victor Yax Leiva'],
        ['15925','Walter Albino Quiejnay Gonzalez'],
        ['21542','William Roberto Suchite Raxtun'],
        ['16534','Wilmar Rafael Lopez Monterroso'],
        ['12792','Yadira Lisbeth Mérida Escobedo'],
        ['20326','Yecenia Del Rosario Sabaj Citalan'],
        ##['1547','Hilda  Verónica Godínez López'],
        ['1726','Vivian Rosangela Reyes Rodas'],
        ['1585','Beatriz Albina Yax Coti'],
        ['3594','Carlos Alexander Mérida Rodas'],
        ##['1547','Aura Sucely Rosario Soto'],
        ['4291','Maria del Carmen Rivas Pacheco'],
        ['19543','Dr. Gustavo Ramiro Mérida Reina Amaya'],
        ['19402','Dr. Sergio Roberto Villatoro Amézquita'],
        ['20948','Dra. Daniela Reneé Pérez Castillo'],
        ['11275','Betzy Alegría Santizo de Mendoza '],
        ['18119','Alexia Yomara Tacam Son'],
        ['15810','Menfild Edward López Velasco'],
        ['12261','Heydi Marisol De Léon Villagrán'],
        ['13920','Juan de Dios Morales Ralda'],
        ['11836','Henry Oswaldo Pisquiy Quixtan'],
        ['15769','Vivian Natalia Gómez García'],
        ['14169','José Roberto Loarca Hernández'],
        ##['13930','Mercy Margoth Herrera Coyoy'],
        ##['13930','Fernando Rodrigo Xet Monzón'],
        ['14153','Adolfo Antonio Ochoa Cabrera'],
        ['15738','Luis Emilio Bucaro Echeverría'],
        ['10622','Evelin Lisseth López Granados'],
        ['13412','Rosalba Rosemary Rivas Herrera'],
        ['15823','Walfred Abel Escobar de León'],
        ['16197','Williams Josué Chamorro Talé'],
        ['14505','Carlos Eduardo Guitiérrez López '],
        ['18066','Astrid Analisse Mendoza Molina'],
        ['18108','Aywin Audelio Perez Arreaga'],
        ['17786','Diego Alejandro Morales Alcázar'],
        ['15816','Sammuel Eduardo Maldonado Morales'],
        ['18538','Kevin Armando Tzum Zelada'],
        ['16930','Karin Zucele Escobar López'],
        ['9524','Susy Jacqueline Chang Quezada'],
        ['11226','Argelia Del Cramen Figueroa Castellanos'],
        ['11792','Ingrid Janeloren Santiago Maldonado'],
        ['20534','Silvana Estefania Cháves Torres'],
        ['23137','Karla Mishelle Mis Garrido'],
        ];
        foreach($medicos as $item)
        {
            Medico::create([
                'colegiado' => $item[0],
                'nombres' => $item[1],
            ]);
        }

        $role = Role::create(['name' => 'Administrador']);

        $user = User::create([
            'ibm'=>'38271',
            'name'=>'Bethzabe Berenice',
            'apellido'=>'Cardona Torres',
            'email'=>'bethzabe.cardona@igssgt.org',
            'password'=>'$2y$10$2RqFpH6s9g2DNrZO/XRNree0My378Jk3cCLxHOYBe1N1AJ0YRTbNi',
            'role_id' => $role->id,
        ]);

        $permissions = ['1','2','3','4','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27',
        '28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57',
        '58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87',
        '88','89','90','91','92','93','94','95','96','97','98','99','100','101','102'];
        $role->syncPermissions($permissions);
        $user->givePermissionTo($permissions);

        $user = User::create([
            'ibm'=>'1000269',
            'name'=>'Francisco Isaac',
            'apellido'=>'López Martinez',
            'email'=>'francisco.lopez@igssgt.org',
            'password'=>'$2y$10$BEQEUIV6B8FfV5ZYzcxPZ.S7RVvRZAE/0rLrXFyJFURVX2b5sTP.q',
            'role_id' => $role->id,
        ]);
        $user->givePermissionTo($permissions);


        $role = Role::create(['name' => 'Registrador-Registros Medicos']);
        $permissions = ['10','11','12','13','14','15','16','17','18','39','40','41','42','83','100'];
        $role->syncPermissions($permissions);
        $user = User::create([
            'ibm'=>'10042',
            'name'=>'Martha Isabel',
            'apellido'=>'Ardiano Fuentes',
            'email'=>'martha.ardiano@igssgt.org',
            'password'=>'$2y$10$IpAW7ZTTqwLDDLTXaEE.0eOGSNl2Q5CccYqL/Z4Qiu4jrNiR5XtS.',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'20070',
            'name'=>'Cindy Yasmin',
            'apellido'=>'Morales Villagran','email'=>'cindy.morales@igssgt.org',
            'password'=>'$2y$10$UCCTdgYCirZMfI7Om.5XWeZWeJhsuFrigaLxbnvWUtwwLOKlZNuU2',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2006452',
            'name'=>'Carolina Edith',
            'apellido'=>'Hernandez Perez','email'=>'caroline.hernandez@igssgt.org',
            'password'=>'$2y$10$QaJCkYTACw0TgphKKEK4SOLSj9hLiNJoJLvncqNsIEdWecRlsCIjK',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'1002145',
            'name'=>'Jeaqueline Maribel',
            'apellido'=>'Mazariegos','email'=>'jeaqueline.mazariego@igssgt.org',
            'password'=>'$2y$10$g6YX4JLjJd/6Ol69P5ioteMvVeLgYhzYu6e1/bsp0Bcds8My7qBc6',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38690',
            'name'=>'Luis Roberto',
            'apellido'=>'Escobar Perez','email'=>'luis.escobar@igssgt.org',
            'password'=>'$2y$10$E9F7TVLurw9D8gdXaI06eOn0PpkR9p9zoBJ4tReut86nG9A2ftaPm',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'39007',
            'name'=>'Raul',
            'apellido'=>'De Leon','email'=>'raul.deleon@igssgt.org',
            'password'=>'$2y$10$Zm5oYit3TRhRLKo8O.7UCOUrQPJ4WXqNUh5gX2XUlE2ySNOq1k/Va',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'37142',
            'name'=>'Susana Ines',
            'apellido'=>'Vega Lopez','email'=>'susana.vega@igssgt.org',
            'password'=>'$2y$10$R3svcKEtmfUi1z7g073f7eLYWEw5P9GTwGY7TTd3Eyzp1Ue9.jXZO',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'39263',
            'name'=>'Vera',
            'apellido'=>'Barrios Ruiz','email'=>'vera.barrios@igssgt.org',
            'password'=>'$2y$10$Lkj9Y1yhOTeyv7gojhsvxuwdkknnWZyyGYOJyQCT8aX8KpOvwXxVS',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'1001850',
            'name'=>'Walter Florencio',
            'apellido'=>'Yax Chaclan','email'=>'walter.yax@igssgt.org',
            'password'=>'$2y$10$n6oPwti1UfrY/EhHvr3lTe3mQHd5ixW6NmH9aakxwY83i4QEGNooW',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'39119',
            'name'=>'Absalon Benjamin',
            'apellido'=>'Lemus Samayoa','email'=>'absalon.lemus@igssgt.org',
            'password'=>'$2y$10$/tw9eK7Zv34F//v81Irfpun.MZoXMM13R9aPSy83lfcB37RcDtmu6',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'39125',
            'name'=>'Adriana Daniela',
            'apellido'=>'Sanchez','email'=>'adriana.sanchez@igssgt.org',
            'password'=>'$2y$10$xU..DAn6H9JDXBby9QB6F.6bBNQlOU1wIBwq69KbpnprFNNB9YUBa',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38300',
            'name'=>'Lilian Marleny',
            'apellido'=>'Castillo y Castillo','email'=>'lilian.castillo@igssgt.org',
            'password'=>'$2y$10$k6El3lk1tp8g9U5jHLCcnOqoIj/aZN4lnUU9ZAQiHZEWUzlXYTv.C',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2007067',
            'name'=>'Skarleth Dayanara',
            'apellido'=>'Dubon Aguilar','email'=>'skarleth.dubon@igssgt.org',
            'password'=>'$2y$10$KypK.9Namgsa0.6/alElsOybU3d5trXODzaFjETSnwX1R3H8KdXbe',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38978',
            'name'=>'Andrea Alejandra',
            'apellido'=>'Arauz Medrano','email'=>'andrea.arauz@igssgt.org',
            'password'=>'$2y$10$osg0mfQIwlNr7jfOuNGBeOk/FducC/9tH2ULh/JecMCFaqJQX5lW2',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'1004249',
            'name'=>'Maria Paola',
            'apellido'=>'Archila','email'=>'maria.archila@igssgt.org',
            'password'=>'$2y$10$urTe9dCk0.QV.w2cJDA3yO74QQh.9CGZNwqiTZQl2blTxZBrt5BzS',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'37837',
            'name'=>'Maria',
            'apellido'=>'Cardona Lopez','email'=>'mariad.cardona@igssgt.org',
            'password'=>'$2y$10$sQ9OEXrsqaf5wTs2TxyhIuMZCGDyD0UiNlAzsiRFK71PTiHBJmx/O',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2004613',
            'name'=>'Angelica Del Rocio',
            'apellido'=>'Romeno Villatoro','email'=>'angelica.romano@igssgt.org',
            'password'=>'$2y$10$/DwesAPCl7ooEiZKIrT9xuZxWxpawo9Sbur.uusAL6Pr3ixmXMphK',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'37799',
            'name'=>'Ana Patricia',
            'apellido'=>'Sum Escobar','email'=>'ana.sum@igssgt.org',
            'password'=>'$2y$10$Ekb0DhVrkZoEOBoO0PLjO.5JK2utRiJUTCji0zgtgocyt7jG5XAj6',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2007751',
            'name'=>'Evelyn Johanna',
            'apellido'=>'De Leon','email'=>'evelyn.deleon@igssgt.org',
            'password'=>'$2y$10$kV9RptPDgWfYgQpTs0vzcO/vS2aZk7EmRmCUpNNu0hla4wto9m4MO',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2003466',
            'name'=>'Jesnee Mishilck',
            'apellido'=>'Cifuentes Maldonado','email'=>'jesnee.cifuentes@igssgt.org',
            'password'=>'$2y$10$5aisWFufw38ao0AhsflbxuoiEy3lNI27jg1yr/cetjfpRdLFnY3dq',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38686',
            'name'=>'Rosa Patricia',
            'apellido'=>'Gonzalez de Vidal','email'=>'rosa.gonzalez@igssgt.org',
            'password'=>'$2y$10$IDyg7PdEKVYrDt3sqFAJmOBfBaaOTFXIi1qqHzu8qhrOTm/5247py',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'1004237',
            'name'=>'Beatriz Eugenia',
            'apellido'=>'Ochoa de León','email'=>'beatriz.ochoa@igssgt.org',
            'password'=>'$2y$10$H59kYjzfHbMqJNlnx7iYO.UUXVeWkHdEuo.gMVTE.flDh3x.Kzavq',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2004695',
            'name'=>'Didy Lily',
            'apellido'=>'Pérez Herrera','email'=>'didy.perez@igssgt.org',
            'password'=>'$2y$10$qpFKn1ICjSuv67.p8L.sruf49bTh2uweXp466H29nHourG/v24n2G',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'37806',
            'name'=>'Henrry Wualberto',
            'apellido'=>'Paz Macario','email'=>'henrry.paz@igssgt.org',
            'password'=>'$2y$10$bfj.MwtkQyGoUU.UPtCs4OOZTzrgwnAdZe6nE9b.ZFDRh0I/ngVVO',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'37798',
            'name'=>'Estrella Odili',
            'apellido'=>'García Reyes','email'=>'estrella.garcia@igssgt.org',
            'password'=>'$2y$10$EMgz2h10xMvfqZXNDdb15ehwLPYe2sPdq4stP//3JJwWeh18HdkZy',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2005977',
            'name'=>'Andy Alessandro',
            'apellido'=>'Quemé Monzóz','email'=>'andy.queme@igssgt.org',
            'password'=>'$2y$10$ixZJh//S8sBEtx1s958CiuSXgxwUaHdtKccw2EYqRmAJBEtpDSzeC',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'25327',
            'name'=>'Henly Karina',
            'apellido'=>'Flores Elias','email'=>'henly.flores@igssgt.org',
            'password'=>'$2y$10$JWPCm8ygt/hepGBwtMYOV.pcFXOyseh3R062lwhBvDnZDUwXxkdzu',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38096',
            'name'=>'Yenny Virginia',
            'apellido'=>'Osorio Recinos','email'=>'yenny.osorio@igssgt.org',
            'password'=>'$2y$10$.jg9RHr5zI/C5T5EMpYTkeg.EGDbNPATImOw9woS0U8hZLt4Tf8e2',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);

        

        $role = Role::create(['name' => 'Revisor-Registros Medicos']);
        $permissions = ['19','20','21','22','23','24','25','26','31', '35', '36', '37','38','75','76','77','78','79','80','81','82','84','87','100','101','102'];
        $role->syncPermissions($permissions);

        $user = User::create([
            'ibm'=>'38380',
            'name'=>'Karla Paola',
            'apellido'=>'Fuentes Gonzales',
            'email'=>'karla.fuentes@igssgt.org',
            'password'=>'$2y$10$MpPZOBAKrQ3hHnFwXcSCTO5JUNOr1e74wdiLzbx.n9fmmkg4yAd5O',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38563',
            'name'=>'Luisa Maria',
            'apellido'=>'Mejicanos Bonilla',
            'email'=>'luisa.mejicanos@igssgt.org',
            'password'=>'$2y$10$2tr7RpiIDaIWZwqXr3KWC.PgmzhU74qMo7nkcMgxV.cQ3i.8X.PY6',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'39115',
            'name'=>'Sulma Roxana',
            'apellido'=>'Siguantay Cardona',
            'email'=>'sulma.siguantay@igssgt.org',
            'password'=>'$2y$10$Ok5gYDJpECG58YxhBal5oOJnjP.38Vty1JnchN5/lws/V7sKk11Yq',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2002447',
            'name'=>'Elvira Encarnacion',
            'apellido'=>'Estrada Estrada',
            'email'=>'elvira.estrada@igssgt.org',
            'password'=>'$2y$10$1ODyjTwEM2Xv6paOFFwKI.6XGfAPHgvkroiYEa0ti/lxRG9prU4ze',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'38982',
            'name'=>'Nancy Alejandra',
            'apellido'=>'Asencio Batz',
            'email'=>'nancy.asencio@igssgt.org',
            'password'=>'$2y$10$uuabzBhQXxpEHc8f1X.LyubHRTKT6ijYpKqoVkzbfcDua5rZ08OK.',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);

        $role = Role::create(['name' => 'Registrador-Prestaciones']);
        $permissions = ['19','20','21','22','23','24','25','26','75','76','77','78','79','80','81','82','84','86', '88','89','90','91', '100','101'];
        $role->syncPermissions($permissions);

        $user = User::create([
            'ibm'=>'123',
            'name'=>'Edwin',
            'apellido'=>'Pretzantzin',
            'email'=>'edwin.garcia@igssgt.org',
            'password'=>'$2y$10$hxsyoULxQTLWlcNTgWZRROYDz1sql4hxCFzXomrxe/6IxslRGeOpK',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'28547',
            'name'=>'Karina Hayne',
            'apellido'=>'Beletzuy Galicia',
            'email'=>'karina.beletzuy@igssgt.org',
            'password'=>'$2y$10$ltPnXlzH9DKXYuPknlsHquxvBzESQd81IS18Dx.1ERIy6QyKxhz/.',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2001293',
            'name'=>'Roger Otoniel',
            'apellido'=>'López Escalante',
            'email'=>'roger.lopez@igssgt.org',
            'password'=>'$2y$10$ZNEwomQs60hgoRIjrd/K0e9F4JyZI6xA1Sk10cANV.n0edg/5MQ7e',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'2005594',
            'name'=>'Josue Efrain',
            'apellido'=>'Pérez Itzep',
            'email'=>'josue.perez@igssgt.org',
            'password'=>'$2y$10$Og8PwbYAh.WvqMqVxHg0zu1RS25Ta3z5MLbdnNs.H95kuBg6tr8k.',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'49510',
            'name'=>'Aura Yaneth',
            'apellido'=>'Garcia Gonzalez',
            'email'=>'aura.garcia@igssgt.org',
            'password'=>'$2y$10$sSKpzeEUV.5BX1q4nik5eOGdCncc6z0Pe47AfBnI40qz2YNoxfWRS',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);
        
        $user = User::create([
            'ibm'=>'48395',
            'name'=>'Miriam Regina',
            'apellido'=>'Escobedo Ramírez',
            'email'=>'miriam.escobedo@igssgt.org',
            'password'=>'$2y$10$6ed3kcOxS73lIK8FbhPMO.a5VwOn4lDBrzhgYK/UsWOQrHxbu5gbu',
            'role_id' => $role->id,
            ]);
        $user->givePermissionTo($permissions);

    }
}
