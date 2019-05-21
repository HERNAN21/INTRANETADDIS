<?php 

require_once "conexion.php";

class panelIzquierdoModel{

# DATOS DEL USUARIO
	#---------------------------------------------------------------------------------------
	public function getDatosUserModel($cod_usuario, $tabla) {

        $stmt = Conexion::conectaDB()->prepare("
        	SELECT UPPER(per.nombres) AS nombre, UPPER(per.ape_paterno) AS aPaterno,
        	UPPER(per.ape_materno) AS aMaterno, per.dni
			FROM $tabla per
			INNER JOIN usuarios usu ON per.id_persona = usu.id_persona
			WHERE usu.id_usuario = $cod_usuario
		");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

#PERFIL DEL USUARIO LOGEADO
    #--------------------------------------------------------------------------------------------------------------
     public function getDatUserModel($cod_usuario, $tabla){
        
        $stmt = conexion::conectaDB()->prepare("
            SELECT perf.id_perfil,  UPPER (perf.descor) AS descor, UPPER (perf.deslar) AS deslar
            FROM $tabla perf
            INNER JOIN usuarios_perfiles usperf ON perf.id_perfil=usperf.id_perfil
            INNER JOIN usuarios usu ON usperf.id_usuario=usu.id_usuario
            WHERE usu.id_usuario=$cod_usuario
        ");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }


#MENU LATERAL IZQUIERDO
    #---------------------------------------------------------------------------------------------------------------

    /* OBTIENE LOS MODULOS SUPERIORES */
    
        public function getModulosMenuModel($cod_usuario, $tabla) {

        $stmt = Conexion::conectaDB()->prepare(
            "SELECT modu.id_modulo, modu.descor, modu.deslar, modu.mod_super, modu.link, modu.icono, modu.orden, modu.estado
            FROM $tabla modu
            INNER JOIN perfiles_modulos perfModu ON modu.id_modulo = perfModu.id_modulo
            INNER JOIN perfiles perf ON perfModu.id_perfil = perf.id_perfil
            INNER JOIN usuarios_perfiles usuPerf ON usuPerf.id_perfil = perf.id_perfil
            INNER JOIN usuarios usu ON usuPerf.id_usuario = usu.id_usuario
            WHERE usu.id_usuario = $cod_usuario
            AND modu.estado = 'AC'
            ORDER BY modu.orden"
        );

        $stmt->execute();

        return $stmt->fetchall();

        $stmt->close();

    }

    /* OBTINE LOS SUB MODULOS */
    
    public function getSubModulosMenuModel($tabla){

        $stmt = Conexion::conectaDB()->prepare(
        	"SELECT id_modulo, descor, deslar, mod_super, link, icono, orden, estado
            FROM $tabla
            WHERE id_modulo <> mod_super
            AND estado = 'AC'
            ORDER BY orden
        ");

        $stmt->execute();

        return $stmt->fetchall();

        $stmt->close();
    }


}