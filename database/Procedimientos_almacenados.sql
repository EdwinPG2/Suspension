use local_igss;

drop trigger if exists correlativo;
DELIMITER $$
CREATE TRIGGER correlativo
    AFTER INSERT
    ON oficio FOR EACH ROW
BEGIN
DECLARE numero INTEGER;
set numero = new.correlativo+1;
UPDATE clinica_servicio SET correlativo = numero WHERE( id_clinica_servicio = new.clinica_servicio);
END$$



drop procedure if exists suspenciones_general;
DELIMITER $$
CREATE PROCEDURE `suspenciones_general`(in fechai datetime ,in fechaf datetime)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, concat(registrador.name,' ', registrador.apellido) as registrador, concat(revisor.name,' ',revisor.apellido) as revisor
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
group by id_suspension;
end
$$

drop procedure if exists suspenciones_especialidades;
DELIMITER $$
CREATE PROCEDURE `suspenciones_especialidades`(in fechai datetime ,in fechaf datetime, in idespecialidad int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, concat(registrador.name,' ', registrador.apellido) as registrador, concat(revisor.name,' ',revisor.apellido) as revisor
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and especialidad.id_especialidad=idespecialidad
group by id_suspension;
end
$$


drop procedure if exists suspenciones_clinicas_servicios;
DELIMITER $$
CREATE PROCEDURE `suspenciones_clinicas_servicios`(in fechai datetime ,in fechaf datetime, in idclinicas_servicios int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, concat(registrador.name,' ', registrador.apellido) as registrador, concat(revisor.name,' ',revisor.apellido) as revisor
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and clinica_servicio.id_clinica_servicio=idclinicas_servicios
group by id_suspension;
end
$$


drop procedure if exists suspenciones_areas;
DELIMITER $$
CREATE PROCEDURE `suspenciones_areas`(in fechai datetime ,in fechaf datetime, in idarea int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, concat(registrador.name,' ', registrador.apellido) as registrador, concat(revisor.name,' ',revisor.apellido) as revisor
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and area.id_area=idarea
group by id_suspension;
end
$$


drop procedure if exists formularios_suspencion_oficio;
DELIMITER $$
CREATE PROCEDURE `formularios_suspencion_oficio`(in oficio_id int)
begin
	select formulario_suspencion.id_suspension , GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios 
	from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
	inner join oficio_suspencion on oficio_suspencion.id_suspension= formulario_suspencion.id_suspension where oficio_suspencion.id_oficio = oficio_id group by id_suspension;
end
$$


drop procedure if exists formularios_suspencion;
DELIMITER $$
CREATE PROCEDURE `formularios_suspencion`(in suspension_id int)
begin
	select  GROUP_CONCAT(formulario.nombre SEPARATOR ',') as Formularios 
	from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario
	where formulario_suspencion.id_suspension = suspension_id group by id_suspension;
end
$$


drop procedure if exists suspenciones_colaborador_riesgo;
DELIMITER $$
CREATE PROCEDURE `suspenciones_colaborador_riesgo`(in fechai datetime ,in fechaf datetime, in idriesgo int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and afiliado.colaborador='y'
and suspension.id_riesgo=idriesgo
group by id_suspension;
end$$



drop procedure if exists suspenciones_colaborador_dependencia;
DELIMITER $$
CREATE PROCEDURE `suspenciones_colaborador_dependencia`(in fechai datetime ,in fechaf datetime, in iddependencia int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and afiliado.colaborador='y'
and afiliado.id_dependencia=iddependencia
group by id_suspension;
end$$

drop procedure if exists suspenciones_colaborador_cargo;
DELIMITER $$
CREATE  PROCEDURE `suspenciones_colaborador_cargo`(in fechai datetime ,in fechaf datetime, in idcargo int)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_inicio_caso, suspension.fecha_accidente,suspension.fecha_registro, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
WHERE suspension.fecha_inicio_caso BETWEEN fechai AND fechaf
and afiliado.colaborador='y'
and afiliado.id_cargo =idcargo
group by id_suspension;
end$$

SET GLOBAL event_scheduler=on;
DELIMITER $$
CREATE EVENT reiniciar_correlativo
    ON SCHEDULE 
        EVERY 1 YEAR
        STARTS '2022-01-01 00:00:00'
    DO
    BEGIN
        UPDATE clinica_servicio SET correlativo = '1', correlativo_rechazado = '1';
END$$

drop procedure if exists rechazos_registrador;
DELIMITER $$
CREATE PROCEDURE `rechazos_registrador`(in fechai datetime ,in fechaf datetime,in usuario int)
begin
	select concat(registrador.name,' ', registrador.apellido) as nombre_registrador, concat(revisor.name,' ',revisor.apellido) as nombre_revisor, formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and suspension.users_id_registrador=usuario
and suspension.estado="Rechazado"
group by id_suspension;
end
$$

drop procedure if exists rechazos_revisor;
DELIMITER $$
CREATE PROCEDURE `rechazos_revisor`(in fechai datetime ,in fechaf datetime,in usuario int)
begin
	select concat(registrador.name,' ', registrador.apellido) as nombre_registrador, concat(revisor.name,' ',revisor.apellido) as nombre_revisor, formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and suspension.users_id_revisor=usuario
and suspension.estado="Rechazado"
group by id_suspension;
end
$$


drop procedure if exists rechazos_area;
DELIMITER $$
CREATE PROCEDURE `rechazos_area`(in fechai datetime ,in fechaf datetime,in idarea int)
begin
	select concat(registrador.name,' ', registrador.apellido) as nombre_registrador, concat(revisor.name,' ',revisor.apellido) as nombre_revisor, formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and area.id_area=idarea
and suspension.estado="Rechazado"
group by id_suspension;
end
$$

drop procedure if exists rechazos_especialidad;
DELIMITER $$
CREATE PROCEDURE `rechazos_especialidad`(in fechai datetime ,in fechaf datetime,in idespecialidad int)
begin
	select concat(registrador.name,' ', registrador.apellido) as nombre_registrador, concat(revisor.name,' ',revisor.apellido) as nombre_revisor, formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and especialidad.id_especialidad=idespecialidad
and suspension.estado="Rechazado"
group by id_suspension;
end
$$


drop procedure if exists rechazos_clinicas_servicios;
DELIMITER $$
CREATE PROCEDURE `rechazos_clinicas_servicios`(in fechai datetime ,in fechaf datetime,in idclinicas_servicios int)
begin
	select concat(registrador.name,' ', registrador.apellido) as nombre_registrador, concat(revisor.name,' ',revisor.apellido) as nombre_revisor, formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
inner join users as registrador on registrador.id = suspension.users_id_registrador
inner join users as revisor on revisor.id = suspension.users_id_revisor
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and clinica_servicio.id_clinica_servicio=idclinicas_servicios
and suspension.estado="Rechazado"
group by id_suspension;
end
$$

drop procedure if exists requerimientos_enviados;
DELIMITER $$
CREATE PROCEDURE `requerimientos_enviados`(in fechai datetime ,in fechaf datetime)
begin
	select * ,afiliado.nombre, afiliado.apellidos from requerimiento 
    inner join afiliado on requerimiento.no_afiliado = afiliado.no_afiliado
WHERE requerimiento.fecha_requerimiento BETWEEN fechai AND fechaf
and requerimiento.estado='Generado';
end
$$

drop procedure if exists requerimientos_en_espera;
DELIMITER $$
CREATE PROCEDURE `requerimientos_en_espera`(in fechai datetime ,in fechaf datetime)
begin
	select * ,afiliado.nombre, afiliado.apellidos from requerimiento 
    inner join afiliado on requerimiento.no_afiliado = afiliado.no_afiliado
WHERE requerimiento.fecha_requerimiento BETWEEN fechai AND fechaf
and requerimiento.estado='En espera';
end
$$

drop procedure if exists requerimientos_respondidos;
DELIMITER $$
CREATE PROCEDURE `requerimientos_respondidos`(in fechai datetime ,in fechaf datetime)
begin
	select * ,afiliado.nombre, afiliado.apellidos from requerimiento 
    inner join afiliado on requerimiento.no_afiliado = afiliado.no_afiliado
WHERE requerimiento.fecha_requerimiento BETWEEN fechai AND fechaf
and requerimiento.estado='Resuelto';
end
$$

drop procedure if exists suspenciones_si_pago;
DELIMITER $$
CREATE PROCEDURE `suspenciones_si_pago`(in fechai datetime ,in fechaf datetime)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, suspension.pago
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and suspension.pago='SI'
group by id_suspension;
end
$$

drop procedure if exists suspenciones_no_pago;
DELIMITER $$
CREATE PROCEDURE `suspenciones_no_pago`(in fechai datetime ,in fechaf datetime)
begin
	select formulario_suspencion.id_suspension, suspension.no_afiliado,afiliado.nombre as nombre_afiliado ,afiliado.apellidos, suspension.fecha_registro, suspension.fecha_accidente,suspension.fecha_inicio_caso, riesgo.nombre as nombre_riesgo,area.nombre as nombre_area ,especialidad.nombre_especialidad,clinica_servicio.nombre as nombre_clinica_servicio, GROUP_CONCAT(formulario.nombre SEPARATOR ', ') as Formularios, suspension.pago
from formulario_suspencion inner join formulario on formulario_suspencion.id_formulario = formulario.id_formulario 
inner join suspension on formulario_suspencion.id_suspension =suspension.id_suspension
inner join afiliado on suspension.no_afiliado = afiliado.no_afiliado
inner join clinica_servicio on clinica_servicio.id_clinica_servicio = suspension.id_clinica_servicio
inner join area on area.id_area = clinica_servicio.id_area
inner join especialidad on especialidad.id_especialidad = clinica_servicio.id_especialidad
inner join riesgo on riesgo.id = suspension.id_riesgo
WHERE suspension.fecha_registro BETWEEN fechai AND fechaf
and suspension.pago='NO'
group by id_suspension;
end
$$