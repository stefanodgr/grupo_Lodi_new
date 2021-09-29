<?php
  include "../Funciones/BD.php";
  $edit     =$_POST['edit'];
  $ficha    =$_POST['ficha'];
  if ($ficha=='') {
      $idb =$edit;
      $titulo2  ='Editar Producto Neumatico ';
  } else  {
    $idb=$ficha;
    $titulo2  ='Editar Ficha Tecnina ';
  }



  $sql="SELECT 	
      pc.produ_neu_id,
      pc.produ_neu_nomen,
      pc.produ_neu_ancho,
      pc.produ_neu_serie,
      pc.produ_neu_aro,
      pc.produ_neu_tp,
      pc.produ_neu_pli,
      pc.produ_neu_uni,
      mr.mar_id,
      mr.mar_nombre,
      pa.pais_id,
      pa.pais_nombre,
      md.mod_id,
      md.mod_nombre


      FROM  sys_produ_neu pc , sys_marca mr, sys_pais pa , sys_modelo md

       WHERE pc.mar_id= mr.mar_id AND pa.pais_id = pc.pais_id AND md.mod_id = pc.mod_id AND pc.produ_neu_id =".$idb."";
  $result=mysqli_query($con,$sql);
  $rsql1=mysqli_fetch_array($result,MYSQLI_ASSOC);


  
  $xmarneupro   =$rsql1['mar_id'];
  $xmarNom      =$rsql1['mar_nombre'];
  $xnomen       =$rsql1['produ_neu_nomen'];
  $xanc         =$rsql1['produ_neu_ancho'];
  $xserie       =$rsql1['produ_neu_serie'];
  $xaro         =$rsql1['produ_neu_aro'];
  $xtipo        =$rsql1['produ_neu_tp'];
  $xpli         =$rsql1['produ_neu_pli'];
  $xuni         =$rsql1['produ_neu_uni'];
  $xpais        =$rsql1['pais_id']; 
  $xpaisNom     =$rsql1['pais_nombre']; 
  $xmodneupro   =$rsql1['mod_id']; 
  $xmodNom      =$rsql1['mod_nombre']; 
  

  $sql="SELECT 
  fi.ficha_tecnica_id,
  fi.ficha_tecnica_vel,
  fi.ficha_tecnica_pre,
  fi.ficha_tecnica_carga,
  fi.ficha_tecnica_exte,
  pn.produ_neu_id
  FROM
  sys_ficha_tecnica fi, sys_produ_neu pn
  WHERE fi.produ_neu_id= pn.produ_neu_id AND  pn.produ_neu_id =".$idb."";

  $result=mysqli_query($con,$sql);
  $rsql2=mysqli_fetch_array($result,MYSQLI_ASSOC);

  $idficha     =$rsql2['ficha_tecnica_id'];
    if ($idficha==''){
      $idficha='0';
    }
  $id          =$rsql2['produ_neu_id'];
  $xvel        =$rsql2['ficha_tecnica_vel'];
  $xpresi      =$rsql2['ficha_tecnica_pre'];
  $xcarga      =$rsql2['ficha_tecnica_carga'];
  $xexte       =$rsql2['ficha_tecnica_exte']; 
  $titulo       ='Editar Producto Neumatico ';




 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
            <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"><?php echo $titulo2; ?></a>
                          </h4>
            </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-xs-12 col-lg-12">
                               <div class="alert alert-info">
                                 <strong>Nota:</strong> Los datos ingresados deben estar en coordinacion del Gerente General.
                               </div>
                                  <?php if ($ficha<>'')  { ?>
                                    <form  id="RegistroE" role="form" action="index.php?menu=67" method="post">

                                          <!-- <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                          <label>TREADWEAR (DEGASTE):</label>
                                          <input class="form-control text-uppercase" name="xpli"  title="Ingrese " placeholder="EJ. 000" required>
                                          </div> 
                                          <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                            <label>TRACCION/ADHERENCIA:</label>
                                            <select class="form-control" id="xtipo" name="xtipo" required>
                                                <option value="0">Seleccione..</option>
                                                <option value="LL">AA</option>
                                                <option value="LL/C/P">A</option>
                                                <option value="LL/C">B</option>
                                                <option value="LL/P">C</option>
                                            </select>
                                          </div>
                                          <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                            <label>TEMPERATURA:</label>
                                            <select class="form-control" id="xtipo" name="xtipo" required>
                                                <option value="0">Seleccione..</option>
                                                <option value="LL">A</option>
                                                <option value="LL/C/P">B</option>
                                                <option value="LL/C">C</option>
                                            </select>
                                          </div> -->
                                          <!-- <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                            <label>MATERIAL/CARCASA No. 02:</label>
                                            <select class="form-control" id="xtipo" name="xtipo" required>
                                                <option value="0">Seleccione..</option>
                                                <option value="LL">NYLON</option>
                                                <option value="LL/C/P">ACERO </option>
                                                <option value="LL/C">POLIESTER</option>
                                                <option value="LL/P">RAYON</option>
                                                <option value="LL/P">POLIAMIDA</option>
                                            </select>
                                          </div> -->
                                          <!-- <input class="form-control text-uppercase" name="edit" > -->
                                          <input type="hidden"  name="idficha"        value="<?php echo $idficha; ?>">
                                          <input type="hidden"  name="codprod"        value="<?php echo $ficha; ?>">
                                          <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                            <label><small> CODIGO DE VELOCIDAD No.06 :</small> </label>
                                            <select class="form-control" id="xvel" name="xvel" >
                                                <option value="<?php echo $xvel; ?>"><?php echo $xvel; ?></option>
                                                <option value="0">--</option>
                                                <option value="E-70KM/H">E-70KM/H</option>
                                                <option value="F-80KM/H">F-80KM/H </option>
                                                <option value="G-90KM/H">G-90KM/H</option>
                                                <option value="J-100KM/H">J-100KM/H</option>
                                                <option value="K-110KM/H">K-110KM/H</option>
                                                <option value="L-120KM/H">L-120KM/H</option>
                                                <option value="M-130KM/H">M-130KM/H</option>
                                                <option value="N-140KM/H">N-140KM/H</option>
                                                <option value="P-150KM/H">P-150KM/H</option>
                                                <option value="Q-160KM/H">Q-160KM/H</option>
                                                <option value="R-170KM/H">R-170KM/H</option>
                                                <option value="S-180KM/H">S-180KM/H</option>
                                                <option value="T-190KM/H">T-190KM/H</option>
                                                <option value="U-200KM/H">U-200KM/H</option>
                                                <option value="H-210KM/H">H-210KM/H</option>
                                                <option value="V-240KM/H">V-240KM/H</option>
                                                <option value="W-270KM/H">W-270KM/H</option>
                                                <option value="Y-300KM/H">Y-300KM/H</option>
                                                <option value="Z-MAYOR/300KM/H">Z-MAYOR/300KM/H</option>
                                            </select>
                                          </div>
                                          <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                          <label><small>PRESION DE INFLADO :</small> </label>
                                          <input class="form-control text-uppercase" name="xpresi" value="<?php echo $xpresi; ?>"  title="Ingrese" placeholder="EJ. 00" >
                                          </div>
                                          <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                          <label><small>INDICE DE CARGA (KG) No.05 :</small> </label>
                                          <input class="form-control text-uppercase" name="xcarga"  value="<?php echo $xcarga; ?>" title="Ingrese" placeholder="EJ. 00" >
                                          </div>
                                          <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                          <label><small>DIAMETRO EXTERNO (MM)  :</small> </label>
                                          <input class="form-control text-uppercase" name="xexte"  value="<?php echo $xexte; ?>" title="Ingrese" placeholder="EJ. 00">
                                          </div>
                                          <!-- <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                          <label>FECHA/FABRICACION  :</label>
                                          <input type="date" class="form-control text-uppercase" name="xpli"  title="Ingrese " placeholder="EJ. 000" required>
                                          </div>  -->

                                          <div class="col-lg-4 col-md-4 hidden-xs top">
                                          <button type="submit" class="btn btn-primary" name="GuardarF" value="Actualizar">Guardar </button>
                                          <a href="index.php?menu=66" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                          </div>
                                          <div class="col-xs-12 visible-xs top">
                                          <button type="submit" class="btn btn-primary" name="GuardarF" value="Actualizar">Guardar </button>
                                          <a href="index.php?menu=66" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                          </div>
                                         
                                          </form>
                                  

                                  <?php } ?>
                                  <?php if ($edit<>'')  {  ?>       
                                    <form  id="RegistroE" role="form" action="index.php?menu=67" method="post">
                                    <input type="hidden"  name="edit"  value="<?php echo $edit; ?>">
                                    <!-- PAISES -->
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                        <label><small> PAIS :</small></label>
                                        <select class="form-control"  id="xpais" name="xpais" onchange="ShowPais();"  required> 
                                          <!-- Leer los Paises -->
                                          <?php
                                          $sql2="SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                          $rsql2=mysqli_query($con,$sql2);
                                          echo "<option value='$xpais'>$xpaisNom</option>";
                                          if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)     ){
                                          do{
                                          echo '<option value="'.$row2['pais_id'].'">'.$row2['pais_nombre'].'</option>';
                                          } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                                          }
                                          ?>
											                  </select>
                                    </div>
                                    <input  type ="hidden" class="form-control"  name="xpaisNom" id="xpaisNom"   >
                                    <!--------------------------------------------------------------------------------->
                                    <!-- ---------------------------------------------MARCA------------------------------------------------- -->
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                        <label><small>MARCA :</small></label>
                                        <select class="form-control"  id="xmarneupro" name="xmarneupro" onchange="ShowMarcaNeu();"  required    >
                                        <?php
                                          $sql2="select * from sys_marca where produ_clasi_id='1'";
                                          $rsql2=mysqli_query($con,$sql2);
                                          echo "<option value='$xmarneupro' >$xmarNom</option>";
                                          if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)     ){
                                          do{
                                             echo '<option value="'.$row2['mar_id'].'">'.$row2['mar_nombre'].'</option>';
                                             } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                                          }
                                        ?>
                                        </select>
                                    </div>
                                        <input  type ="hidden" class="form-control"  name="xmarNom" id="xmarNom"   >
                                        <!-- ---------------------------------------------MARCA------------------------------------------------- -->
                                      <!-- MODElO -->
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                        <label><small>MODELO :</small></label>
                                        <select class="form-control"  name="xmodneupro" id="xmodneupro" onchange="ShowModeloNeu();">
                                        <option  value="<?php echo $xmodneupro; ?>"><?php echo $xmodNom; ?> </option>
                                        </select>
                                    </div>
                                        <input  type ="hidden" class="form-control"  name="xmodNom" id="xmodNom"   >
                                        <!----------------------------------------------------------------------->
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                        <label><small>NOMENCLATURA :</small></label>
                                        <select class="form-control" id="xnomen" name="xnomen" >
                                            <option  value="<?php echo $xnomen; ?>"><?php echo $xnomen; ?></option>
                                            <option value="NUMERICA">NUMERICA</option>
                                            <option value="MILIMETRICA">MILIMETRICA</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-4">
                                        <label><small>RADIAL / CONVENCIONAL :</small></label>
                                        <select class="form-control" id="xtipo" name="xtipo"  required>
                                        
                                           <option value="<?php echo $xtipo; ?>"><?php echo $xtipo; ?></option>
                                            <option value="0">Seleccione..</option>
                                            <option value="RADIAL">RADIAL</option>
                                            <option value="CONVENCIONAL">CONVENCIONAL</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-12 col-lg-3">
                                          <label><small>ANCHO/SECCION INTERNO :</small></label>
                                          <input class="form-control text-uppercase" placeholder="00000000000" name="xanc"  value="<?php echo $xanc; ?>"  required>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-12 col-lg-2">
                                          <label><small>SERIE DE NEUMATICO :</small></label>
                                          <input class="form-control text-uppercase" placeholder="00000000000" name="xserie"  value="<?php echo $xserie; ?>"  required>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                      <label><small>ARO DE NEUMATICO:</small></label>
                                      <input class="form-control text-uppercase" name="xaro"  title="Ingrese solo el Aro"  value="<?php echo $xaro; ?>" placeholder="EJ. 00" required>
                                    </div>                               
                                    <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                      <label><small>PLIEGUES :</small></label>
                                      <input class="form-control text-uppercase" name="xpli"  title="Ingrese solo el PR" value="<?php echo $xpli; ?>" placeholder="EJ. 00" required>
                                    </div>
                                    <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                        <label><small> UNIDAD :</small> </label>
                                        <select class="form-control" id="xuni" name="xuni" required>
                                            <option value="<?php echo $xuni; ?>"><?php echo $xuni; ?></option>
                                            <option value="">Seleccione..</option>
                                            <option value="LL">LL</option>
                                            <option value="LL/C/P">LL/C/P</option>
                                            <option value="LL/C">LL/C</option>
                                            <option value="LL/P">LL/P</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 hidden-xs top">
                                      <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                                      <a href="index.php?menu=66" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                    </div>
                                    <div class="col-xs-12 visible-xs top">
                                      <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                                      <a href="index.php?menu=66" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                    </div>
                             </form>
                                  <?php } ?>
                              </div>

                              </div>

                            </div>
                <!-- /.panel-body -->
              </div>
            <!-- /.panel -->
                <!-- /.panel-body -->
          </div>
      </div>
        <!-- /.col-lg-12 -->
          
</div>
