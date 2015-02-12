<?php


/**
 * Description of reportes_excel
 *
 * @author jetox
 */
require_once dirname(__FILE__) . '/generar_excel/PHPExcel.php';
class Reportes_excel {
    protected $usoci;
    protected $cont_cabecera;
    protected $color_cabecera='#800000';
    protected $colortext_cabecera='#fff';
    protected $tamanio_text='10px';
    protected $tipo_text='Arial';

    function __construct()
    {

        $this->usoci =& get_instance();

    }

    /*
     * @description generador de excel
     *
     * @param $titulo {String} Recibe el nombre que se le va a colocar al archivo excel una ves se genere
     * @param $text_encabezado {String} Recibe el texto que se va a colocar en ele enczbezdo del reporte excel
     * @param $cabecera {array} Recibe un arreglo con las cantidad de columnas que va atener y los nombres de las cabeceras
     * @param $cuerpo {array} Recibe el arreglo con la data a pintar debajo de la cabecera del reporte
     *
     *
     */
    function genera_excel_basico($titulo,$text_encabezado,$cabecera,$cuerpo=array(),$forma=array())
    {

        $estilo1=$this->estilo_encabezado();
        $estilo2=$this->estilo_cabecera();

        $objecto_excel= new PHPExcel();
        $objecto_excel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G');
//        $objecto_excel->getActiveSheet()->setTitle('RISE');

        // Establecer propiedades
        $objecto_excel->getProperties()
         ->setCreator("GDC")
         ->setLastModifiedBy("GDC")
         ->setTitle($titulo)
         ->setSubject($titulo)
         ->setKeywords("Excel Office 2007 openxml php")
         ->setCategory($titulo);

            //alto filas del encabezado
            for($i=1;$i<=count($text_encabezado);$i++)
            {
                 $objecto_excel->getActiveSheet()->getRowDimension($i)->setRowHeight(15);
            }

            //armamos la  informacion de la cabecera
            $count=2;
            foreach ($text_encabezado as $key=>$value)
            {
                $objecto_excel->setActiveSheetIndex(0)->setCellValue('A'.$count,$value);
                //unimos las celdas desde la columna A hasta la F
                if($key==0):
                    $objecto_excel->getActiveSheet()->mergeCells('A'.($key+1).':F'.($key+1));
                endif;
                $objecto_excel->getActiveSheet()->mergeCells('A'.$count.':F'.$count);
                $objecto_excel->getActiveSheet()->getStyle('A'.$count)->applyFromArray($estilo1);
                $count ++;
            }

            // aramamos Encabezado de los datos
            foreach ($cabecera as $key=>$value)
            {

              $objecto_excel->setActiveSheetIndex(0)->setCellValue($key.(count($text_encabezado)+3),$value);

              $objecto_excel->getActiveSheet()->getStyle($key.(count($text_encabezado)+3))->applyFromArray($estilo2);

    //          $objecto_excel->getActiveSheet()->getColumnDimension($key)->setAutoSize(true);
              $objecto_excel->getActiveSheet()->getColumnDimension($key)->setWidth(15);
            }
            // colocamos el ancho de la fila de cabecera
             $objecto_excel->getActiveSheet()->getRowDimension((count($text_encabezado)+3))->setRowHeight(30);
             $objecto_excel->setActiveSheetIndex(0);

            //llenamos el cuerpo con los datos segun la busqueda
             $columnas = array('A','B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q','R','S','T','U','V','w','x','Y','Z');
             $fila=(count($text_encabezado)+4);
             $pos_colum=0;
             for($j=0;$j<count($cuerpo);$j++){
                for($k=0;$k<count($cuerpo[$j]);$k++){
                    array_values($cuerpo[$j]);
                    $objecto_excel->setActiveSheetIndex(0)->setCellValue($columnas[$k].$fila,$cuerpo[$j][$k]);

                    if($k==(count($cabecera)-1)):
                        break;
                    endif;
                }
                $objecto_excel->getActiveSheet()->getRowDimension($fila)->setRowHeight(15);

                $fila ++;
             }

           // ob_end_clean();
           if (ob_get_length() > 0) { ob_end_clean(); }
            // Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
            header('Content-Type: application/ms-excel');
            header('Content-Disposition: attachment;filename="'.$titulo.'.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objecto_excel, 'Excel2007');
            $objWriter->save('php://output');
        exit;
    }


    /*
     * @description funcion que establece los estilos y colores de el encabezado del excel
     *
     * @return array
     */
    private function estilo_encabezado()
    {

         $estilo_encabezado=array(
                'font' => array(
                    'bold' => true,
                    'size'	  => $this->tamanio_text,
                    'name'	  => $this->tipo_text,
                    )
          );

         return $estilo_encabezado;

    }

    /*
     * @description funcion que establece los estilos y colores de la cabecera del excel
     *
     * @return array
     */
    private function estilo_cabecera()
    {
        $estilo_cabecera=array(
                'font' => array(
                    'bold' => TRUE,
                    'color'=>array('rgb'=>'FFFFFF'),
                    'size'	  => '9',
                    'name'	  => 'Arial',

                    ),

                //borde delgado
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_HAIR,
                       ),
                    ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,
                    ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'rotation' => 90,
                    'startcolor' => array(
                        'argb' => '800000',
                        ),
                    'endcolor' => array(
                        'argb' => '800000',
                        ),
                    ),

                );
        return $estilo_cabecera;
    }

    function reporte_distribucion($entes,$cuerpo){
        $estilo1=$this->estilo_encabezado();
        $estilo2=$this->estilo_cabecera();
        $objecto_excel= new PHPExcel();
        $objecto_excel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G');
        // $objecto_excel->getActiveSheet()->setTitle('RISE');
        $enteslist = $entes;
        $cabdinamic= 'G';
        $cabdinamic2= 'G';
        $numcabdinamic= '6';
        // Establecer propiedades
        $objecto_excel->getProperties()
         ->setCreator("GDC")
         ->setLastModifiedBy("GDC")
         ->setTitle("GDC")
         ->setSubject("GDC")
         ->setKeywords("Excel Office 2007 openxml php")
         ->setCategory("GDC");

         $objecto_excel->setActiveSheetIndex(0)->setCellValue('A3','Distribucion por tramite');

         $objecto_excel->getActiveSheet()->getStyle('A6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('B6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('C6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('D6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('E6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('F6')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('A7')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('B7')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('C7')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('D7')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('E7')->applyFromArray($estilo2);
         $objecto_excel->getActiveSheet()->getStyle('F7')->applyFromArray($estilo2);

        // AQUI COMIENZA LA PARTE ESTATICA DE LA CABECERA:
        $objecto_excel->setActiveSheetIndex(0)->setCellValue('A6','Articulo N')
                                              ->setCellValue('B6','Articulo')
                                              ->setCellValue('C6','Numeral')
                                              ->setCellValue('D6','Hecho Imponible')
                                              ->setCellValue('E6','Valor Tributario')
                                              ->setCellValue('F6','Valor Bs');

        //SE UNEN LAS DOS FILAS DE LA CABECERA:
        $objecto_excel->getActiveSheet()->mergeCells('A3:F3');
        $objecto_excel->getActiveSheet()->mergeCells('A6:A7');
        $objecto_excel->getActiveSheet()->mergeCells('B6:B7');
        $objecto_excel->getActiveSheet()->mergeCells('C6:C7');
        $objecto_excel->getActiveSheet()->mergeCells('D6:D7');
        $objecto_excel->getActiveSheet()->mergeCells('E6:E7');
        $objecto_excel->getActiveSheet()->mergeCells('F6:F7');

        foreach ($enteslist as $entecab) {
              $objecto_excel->setActiveSheetIndex(0)->setCellValue($cabdinamic.$numcabdinamic,$entecab->nombre);
              $objecto_excel->getActiveSheet()->getStyle($cabdinamic2++.$numcabdinamic)->applyFromArray($estilo2);
              $objecto_excel->getActiveSheet()->getStyle($cabdinamic2++.$numcabdinamic)->applyFromArray($estilo2);
              $objecto_excel->getActiveSheet()->getStyle($cabdinamic.$numcabdinamic)->applyFromArray($estilo2);
              $cabdinamic ++;
              $cabdinamic ++;

        }

        $cabdinamic= 'F';
        $numcabdinamic2= '7';

        foreach ($enteslist as $entecab) {
              $cabdinamic ++;
              $objecto_excel->setActiveSheetIndex(0)->setCellValue($cabdinamic.$numcabdinamic2,'%');
              $objecto_excel->getActiveSheet()->getStyle($cabdinamic.$numcabdinamic2)->applyFromArray($estilo2);
              $cabdinamic ++;
              $objecto_excel->setActiveSheetIndex(0)->setCellValue($cabdinamic.$numcabdinamic2,'BS');
              $objecto_excel->getActiveSheet()->getStyle($cabdinamic.$numcabdinamic2)->applyFromArray($estilo2);
        }

        $columnas = array();
        $excellong='A';
        $excellong2=1;
             $fila=8;
             $pos_colum=0;
             for($j=0;$j<count($cuerpo);$j++){
                for($k=0;$k<count($cuerpo[$j]);$k++){
                    array_values($cuerpo[$j]);
                    $objecto_excel->setActiveSheetIndex(0)->setCellValue($excellong.$fila,$cuerpo[$j][$k]);
                    $excellong++;
                }
                $objecto_excel->getActiveSheet()->getRowDimension($fila)->setRowHeight(15);
                $excellong='A';
                $fila ++;
             }


            // $objecto_excel->getActiveSheet()->mergeCells('G6:H6');
            //ob_end_clean();
            // Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
            if (ob_get_length() > 0) { ob_end_clean(); }

            header('Content-Type: application/ms-excel');
            header('Content-Disposition: attachment;filename="Distribucion.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objecto_excel, 'Excel2007');
            $objWriter->save('php://output');
        exit;
    }


}

?>
