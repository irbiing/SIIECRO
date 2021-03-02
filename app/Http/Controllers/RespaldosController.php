<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;


class RespaldosController extends Controller
{
    public $process = NULL;

    public function realizarTransferenciaClouds(Request $request){
        // Config::set('laravel-backup.notifications.mail',array('to'=>$configuracion_respaldo->email));
        $carpeta = '/respaldos-siiecro';

        try {
            Artisan::call('backup:run');
        } catch (\Throwable $th) {
            echo ($th);
            
            if($request->ajax()){
                return "-1|No se pudo realizar el respaldo de la base de datos ".$th;
            }else{
                // Es cronjob, envío corre electronico y paro ejecución
                // Email::enviarEmailDeRespaldo('Error al respaldar','No se pudo generar el archivo de respaldo','error');
            }
        }
        // Obtiene todos los archivos de la carpeta de respaldos
        $archivos                       = Storage::disk('local')->files($carpeta);
        // Verifica si fueron encn¿ontrados los archivos de respaldos
        if (count($archivos)>0) {
            foreach($archivos as $archivo){
                $archivo_actual = substr($archivo, -23);

                $archivo = str_replace('/', '\\', $archivo);
                // Verifica que el archivo no exista para no hacer duplicado de archivos, utilizando el driver ftp 
                // ya que los nombres si coinciden en los archivos ftp, y en googl devuelve nombres hasheados y no coinciden
                if( ! Storage::disk('ftp')->exists($archivo_actual)) {

                    $file_content = Storage::disk('local')->get($archivo);
                    // parametros del storage disk put: como se llamará el archivo, donde se encuentra este, visibilidad
                    // Se envían los archivos por ftp y a drive(se espera confirmación por parte de los stakeholders para determinar cual destino se queda)
                    Storage::disk('ftp')->put( $archivo_actual, $file_content);
                    Storage::disk('google')->put( $archivo_actual, $file_content);
                }
            }
        }
    }
}
