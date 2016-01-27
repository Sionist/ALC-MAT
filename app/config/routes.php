<?php

//ruta para login de usuarios
$router->add("/login","login::index");
$router->addPost("/login/ingreso","login::ingreso");

/*
 *rutas para trabajadores
 */
$router->add("/trabajadores","trabajadores::index");
$router->add("/trabajadores/ver/{cedula:[0-9]+}","trabajadores::ficha1");
$router->add("/trabajadores/nuevo-trabajador","trabajadores::nuevo");
$router->addPost("/trabajadores/nuevo-trabajador/datos-personales","trabajadores::datospersonales");
$router->add("/trabajadores/nuevo-trabajador/datos-contratacion/{cedula:[0-9]+}","trabajadores::dcontratacion");
$router->addPost("/trabajadores/nuevo-trabajador/datos-contratacion","trabajadores::enviarcontratacion");
$router->add("/trabajadores/nuevo-trabajador/datos-financieros/{cedula:[0-9]+}","trabajadores::dfinanciero");
$router->addPost("/trabajadores/nuevo-trabajador/datos-financieros","trabajadores::enviarfinanciero");
$router->add("/trabajadores/nuevo-trabajador/datos-profesionales/{cedula:[0-9]+}","trabajadores::dprofesional");
$router->addPost("/trabajadores/nuevo-trabajador/datos-profesionales","trabajadores::enviarprofesional");


/* ******* CATALOGOS *** */

/*
 *rutas para asignaciones
 */
$router->add("/asignaciones", "asignaciones::index");
$router->add("/asignaciones/nueva", "asignaciones::nueva");
$router->add("/asignaciones/guardar", "asignaciones::guardar");
$router->add("/asignaciones/editar/{id:[0-9]+}", "asignaciones::editar");
$router->addPost("/asignaciones/editado", "asignaciones::editado");

/*
 * rutas para bancos
 */
$router->add("/bancos", "bancos::index");
$router->addPost("/bancos/guardar", "bancos::guardar");
$router->add("/bancos/editar/{id:[0-9]+}", "bancos::editar");
$router->addPost("/bancos/editado", "bancos::editado");

/*
 * rutas para cargos
 */
$router->add("/cargos","cargos::index");
$router->addPost("/cargos/guardar","cargos::guardar");
$router->add("/cargos/editar/{id:[0-9]+}","cargos::editar");
$router->addPost("/cargos/editado","cargos::editado");

/*
 * rutas para ciudades
 */
$router->add("/ciudades","ciudades::index");
$router->addGet("/ciudades/getciudades","ciudades::getCiudades");
$router->addPost("/ciudades/guardar","ciudades::guardar");
$router->add("/ciudades/editar/{id:[0-9]+}","ciudades::editar");
$router->addPost("/ciudades/editado","ciudades::editado");

/*
 * rutas para clasificaciones
 */
$router->add("/clasificaciones","clasificaciones::index");
$router->addGet("/clasificaciones/getmuestra","clasificaciones::getMuestra");
$router->addGet("/clasificaciones/getclasifica","clasificaciones::getClasifica");
$router->addPost("/clasificaciones/guardar","clasificaciones::guardar");
$router->add("/clasificaciones/editar/{id:[0-9]+}","clasificaciones::editar");
$router->addPost("/clasificaciones/editado","clasificaciones::editado");

/*
 * rutas para convencion conlectiva
 */
$router->add("/convencion-colectiva","convencioncolectiva::index");
$router->addPost("/convencion-colectiva/guardar","convencioncolectiva::guardar");
$router->add("/convencion-colectiva/editar/{id:[0-9]+}","convencioncolectiva::editar");
$router->addPost("/convencion-colectiva/editado","convencioncolectiva::editado");

/*
 * rutas para deducciones
 */
$router->add("/deducciones","deducciones::index");
$router->add("/deducciones/editar/{id:[0-9]+}","deducciones::editar");
$router->addPost("/deducciones/editado","deducciones::editado");
$router->addPost("/deducciones/guardar","deducciones::guardar");
$router->add("/deducciones/nueva-deduccion","deducciones::nueva");

/*
 * rutas para descuentos
 */
$router->add("/descuentos","descuentos::index");
$router->add("/descuentos/editar/{id:[0-9]+}","descuentos::editar");
$router->addPost("/descuentos/editado","descuentos::editado");
$router->addPost("/descuentos/guardar","descuentos::guardar");

/*
 * rutas para dias de bonificacion
 */
$router->add("/dias-bonificacion","diasbonificacion::index");
$router->add("/dias-bonificacion/editar/{id:[0-9]+}","diasbonificacion::editar");
$router->addPost("/dias-bonificacion/editado","diasbonificacion::editado");
$router->addPost("/dias-bonificacion/guardar","diasbonificacion::guardar");

/*
 * rutas para dias de prestaciones
 */
$router->add("/dias-prestaciones","diasprestaciones::index");
$router->add("/dias-prestaciones/editar/{id:[0-9]+}","diasprestaciones::editar");
$router->addPost("/dias-prestaciones/editado","diasprestaciones::editado");
$router->addPost("/dias-prestaciones/guardar","diasprestaciones::guardar");

/*
 * rutas para direcciones de alcaldia
 */
$router->add("/direcciones-alcaldia","direccionesalcaldia::index");
$router->add("/direcciones-alcaldia/editar/{id:[0-9]+}","direccionesalcaldia::editar");
$router->addPost("/direcciones-alcaldia/editado","direccionesalcaldia::editado");
$router->addPost("/direcciones-alcaldia/guardar","direccionesalcaldia::guardar");

/*
 * rutas para discapacidades
 */
$router->add("/discapacidades","discapacidad::index");
$router->add("/discapacidades/editar/{id:[0-9]+}","discapacidad::editar");
$router->addPost("/discapacidades/editado","discapacidad::editado");
$router->addPost("/discapacidades/guardar","discapacidad::guardar");

/*
 * rutas para estados
 */
$router->add("/estados","estados::index");
$router->add("/estados/editar/{id:[0-9]+}","estados::editar");
$router->addPost("/estados/editado","estados::editado");
$router->addPost("/estados/guardar","estados::guardar");

/*
 * rutas para estatus
 */
$router->add("/estatus","estatus::index");
$router->add("/estatus/editar/{id:[0-9]+}","estatus::editar");
$router->addPost("/estatus/editado","estatus::editado");
$router->addPost("/estatus/guardar","estatus::guardar");

/*
 * rutas para fondos-embargos
 */
$router->add("/fondos-embargos","fondos::index");
$router->add("/fondos-embargos/editar/{id:[0-9]+}","fondos::editar");
$router->addPost("/fondos-embargos/editado","fondos::editado");
$router->addPost("/fondos-embargos/guardar","fondos::guardar");

/*
 * rutas para frecuencia-embargos
 */
$router->add("/frecuencias","frecuencia::index");
$router->add("/frecuencias/editar/{id:[0-9]+}","frecuencia::editar");
$router->addPost("/frecuencias/editado","frecuencia::editado");
$router->addPost("/frecuencias/guardar","frecuencia::guardar");

/*
 * rutas para niveles-cargos
 */
$router->add("/niveles-cargos","nivelcargo::index");
$router->add("/niveles-cargos/editar/{id:[0-9]+}","nivelcargo::editar");
$router->addPost("/niveles-cargos/editado","nivelcargo::editado");
$router->addPost("/niveles-cargos/guardar","nivelcargo::guardar");

/*
 * rutas para nivel-intruccion
 */
$router->add("/nivel-instruccion","nivelinstruccion::index");
$router->add("/nivel-instruccion/editar/{id:[0-9]+}","nivelinstruccion::editar");
$router->addPost("/nivel-instruccion/editado","nivelinstruccion::editado");
$router->addPost("/nivel-instruccion/guardar","nivelinstruccion::guardar");

/*
 * rutas para parentesco
 */
$router->add("/parentesco","parentesco::index");
$router->add("/parentesco/editar/{id:[0-9]+}","parentesco::editar");
$router->addPost("/parentesco/editado","parentesco::editado");
$router->addPost("/parentesco/guardar","parentesco::guardar");

/*
 * rutas para profesiones
 */
$router->add("/profesiones","profesiones::index");
$router->add("/profesiones/editar/{id:[0-9]+}","profesiones::editar");
$router->addPost("/profesiones/editado","profesiones::editado");
$router->addPost("/profesiones/guardar","profesiones::guardar");

/*
 * rutas para tallas
 */
$router->add("/tallas","tipotallas::index");
$router->add("/tallas/editar/{id:[0-9]+}","tipotallas::editar");
$router->addPost("/tallas/editado","tipotallas::editado");
$router->addPost("/tallas/guardar","tipotallas::guardar");

/*
 * rutas para tasas-bcv
 */
$router->add("/tasas-bcv","tasasbcv::index");
$router->add("/tasas-bcv/editar/{id:[0-9]+}","tasasbcv::editar");
$router->addPost("/tasas-bcv/editado","tasasbcv::editado");
$router->addPost("/tasas-bcv/guardar","tasasbcv::guardar");

/*
 * rutas para tipos-beneficios
 */
$router->add("/tipos-beneficios","tiposbeneficios::index");
$router->add("/tipos-beneficios/editar/{id:[0-9]+}","tiposbeneficios::editar");
$router->addPost("/tipos-beneficios/editado","tiposbeneficios::editado");
$router->addPost("/tipos-beneficios/guardar","tiposbeneficios::guardar");

/*
 * rutas para tipos-cobro
 */
$router->add("/tipos-cobro","tipocobro::index");
$router->add("/tipos-cobro/editar/{id:[0-9]+}","tipocobro::editar");
$router->addPost("/tipos-cobro/editado","tipocobro::editado");
$router->addPost("/tipos-cobro/guardar","tipocobro::guardar");

/*
 * rutas para tipos-cuentas
 */
$router->add("/tipos-cuentas","tipocuenta::index");
$router->add("/tipos-cuentas/editar/{id:[0-9]+}","tipocuenta::editar");
$router->addPost("/tipos-cuentas/editado","tipocuenta::editado");
$router->addPost("/tipos-cuentas/guardar","tipocuenta::guardar");

/*
 * rutas para tipos-contrato
 */
$router->add("/tipos-contrato","tipocontrato::index");
$router->add("/tipos-contrato/editar/{id:[0-9]+}","tipocontrato::editar");
$router->addPost("/tipos-contrato/editado","tipocontrato::editado");
$router->addPost("/tipos-contrato/guardar","tipocontrato::guardar");

/*
 * rutas para tipos-nominas
 */
$router->add("/tipos-nominas","tiposnominas::index");
$router->add("/tipos-nominas/editar/{id:[0-9]+}","tiposnominas::editar");
$router->addPost("/tipos-nominas/editado","tiposnominas::editado");
$router->addPost("/tipos-nominas/guardar","tiposnominas::guardar");


/* ******* fin CATALOGOS ******* */

/*
 *rutas para deudas
 */
$router->add("/trabajadores/ver/{cedula:[0-9]+}/deudas","deudas::index");
$router->add("/trabajadores/ver/{cedula:[0-9]+}/deudas/nueva/{cedula:[0-9]+}","deudas::nueva");
$router->addPost("/deudas/guardar","deudas::guardar");


/*
 * rutas para asigsdeducstrabajador
 */
$router->add("/trabajadores/ver/{cedula:[0-9]+}/asignaciones-deducciones/{cedula:[0-9]+}","asigsdeducstrabajador::cargar");
$router->addPost("/asignaciones-deducciones/guardarmodificar","asigsdeducstrabajador::guardarmodificar");


/*
 * rutas para cargafamiliar
 */
$router->add("/trabajadores/ver/{cedula:[0-9]+}/carga-familiar","cargafamiliar::individual");
$router->add("/trabajadores/ver/{cedula:[0-9]+}/carga-familiar/nueva-carga/{cedula:[0-9]+}","cargafamiliar::nuevo");
$router->addPost("/carga-familiar/guardar-nuevo","cargafamiliar::guardanuevo");
$router->add("/trabajadores/ver/{cedula:[0-9]+}/carga-familiar/detalle/{id:[0-9]+}","cargafamiliar::detalle");

/*
 * rutas para reposos
 */
$router->add("/trabajadores/ver/{cedula:[0-9]+}/reposos","reposos::index");
$router->addPost("/reposos/guardar","reposos::guardar");
$router->add("/trabajadores/ver/{cedula:[0-9]+}/reposos/editar/{id:[0-9]+}","reposos::editar");
$router->addPost("/reposos/editado","reposos::editado");

/*
 * rutas para movimientos-variaciones
 */
$router->add("/variaciones-movimientos","variaciones::index");
$router->addPost("/variaciones/buscar","variaciones::buscar");
$router->addPost("/variaciones/nomina","variaciones::nomina");
$router->addPost("/variaciones/procesar","variaciones::procesar");
$router->addPost("/movimientos/buscar","movimientos::buscar");
$router->addPost("/movimientos/eliminar","movimientos::eliminar");
$router->addPost("/movimientos/modificar","movimientos::modificar");

/*
 * rutas para embargos
 */
$router->add("/trabajadores/ver/{cedula:[0-9]+}/embargos","embargos::index");
$router->addPost("/embargos/guardar","embargos::guardar");
$router->addPost("/embargos/editado","embargos::editado");
$router->add("/trabajadores/ver/{cedula:[0-9]+}/embargos/editar/{cedula:[0-9]+}","embargos::editar");



