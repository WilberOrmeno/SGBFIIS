/**
 * Created by DIEGO on 21/11/2015.
 */

var Texto = function(idTexto, tipo, estado, idTexto) {
    this.idTexto = idTexto;
    this.tipo = tipo;
    this.estado = estado;
    this.idTexto = idTexto;

}

var Usuario = function(idUsuario, nombreUsuario, apellidoUsuario, alias, correoUsuario, telefonoUsuario, informacionUsuario,
                       estadoUsuario, idHistorial, idPreferencias, privacidad){

    this.idUsuario = idUsuario;
    this.nombreUsuario = nombreUsuario;
    this.apellidoUsuario = apellidoUsuario;
    this.correoUsuario = correoUsuario;
    this.telefonoUsuario = telefonoUsuario;
    this.informacionUsuario = informacionUsuario;
    this.estadoUsuario = estadoUsuario;
    this.idHistorial = idHistorial;
    this.idPreferencias = idPreferencias;
    this.privacidad = privacidad;
}

var Historial = function(idHistorial, idReservacion) {
    this.idHistorial = idHistorial;
    this.idReservacion = idReservacion;
}

var Tipo = function(idTipo, nombreTipo){
    this.idTipo = idTipo;
    this.nombreTipo = nombreTipo;
}

var Reservacion = function(idReservacion, idUsuario, idTexto, fechaPrestamo){
    this.idReservacion = idReservacion;
    this.idUsuario = idUsuario;
    this.idTexto = idTexto;
    this.fechaPrestamo = fechaPrestamo;
}

var CentroInformacion = function(idCi, nombreCi, ubicacionCi){
    this.idCi = idCi;
    this.nombreCi = nombreCi;
    this.ubicacionCi = ubicacionCi;
}

