<div>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePERSONALES" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> DATOS CONTACTO</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTRABAJO" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> DATOS TRABAJO</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseESTUDIOS" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> DATOS ESTUDIOS</button>

<div class="collapse" id="collapsePERSONALES">
  <div class="well">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Teléfonos</label>
                          <input type="text" class="form-control" id="Itelefono" value="<?php     echo $Itelefono;     ?>" name="Itelefono">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Correo Electronico</label>
                          <input type="text" class="form-control" id="Imail" value="<?php     echo $Imail;     ?>" name="Imail">
                      </div>
  </div>
</div>


          <div class="collapse" id="collapseTRABAJO">
            <div class="well">
                                <div class="checkbox">
                                  <label>
                                  <input type="checkbox" name='Iact'  value='TRAB' <?php   if ($Iact=='TRAB') {echo "Checked";};     ?> > En Activo
                                  </label>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Empresa</label>
                                  <input type="text" class="form-control" id="Iemp" value="<?php     echo $Iemp;     ?>" name="Iemp">
                                </div>

                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name='Iacts'  value='SI' <?php   if ($Iacts=='SI') {echo "Checked";};     ?> > Del Sector
                                  </label>
                                </div>
                                <div class="checkbox">
                                  <label>
                                  <input type="checkbox" name='Idact'  value='DTRAB' <?php   if ($Idact=='DTRAB') {echo "Checked";};     ?> > Demanda Activo
                                  </label>
                                </div>
            </div>
          </div>

          <div class="collapse" id="collapseESTUDIOS">
            <div class="well">

                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name='Iest'  value='ESTU' <?php   if ($Iest=='ESTU') {echo "Checked";};     ?> > Estudia
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name='Idest'  value='DESTU' <?php   if ($Idest=='DESTU') {echo "Checked";};     ?> > Demanda Formaciòn
                              </label>
                            </div>
            </div>
          </div>
</div>
