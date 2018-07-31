<div class="container" id="contenido">    
    <div class="col-md-8">
        <h1>Nuevo Informe</h1><br>
    </div>
    <div class="col-md-4 pull-right">
        <h1>Ruta Nro: <?= $idruta; ?></h1>
        <br>
    </div>    
    <?php 
        $attributes = array('id' => 'target');
        echo form_open_multipart ('informe/nuevo', $attributes); 
    ?>
        <div class="col-md-4">            
            <div class="form-group">
                <label for="cite">CITE</label>
                <input type="text" name="cite" value="<?= $AutorSigla." - ". $AutorNroinforme?>" class="form-control" readonly="off">
            </div> 
            <div class="form-group">
                <label for="fecha">FECHA</label>
                <input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="off">
            </div>
            <div class="form-group">
                <label for="adjunto_externo">ADJUNTAR EXTERNO </label>
                <a href="#" data-toggle="tooltip" title="DOCUMENTOS WORD Y PDF TAMAÑO MAXIMO 1MB!">
                    <input type="file" name="adjunto_externo" class="filestyle">
                </a>
            </div> 
        </div>                   
        <div class="col-md-8">
            <div class="form-group">
                <label for="remitente">DE:</label>
                <input type="text" name="remitente" id="remitente" value=" <?= $AutorNombre.' - '. $AutorCargo?>" class="form-control" placeholder="Remitente" readonly="True">
            </div>
            <div class="form-group">
                <label for="destinatario">A: </label>
                <select class="form-control" name="destinatario" required>
                    <option value="">--SELECCIONE UN USUARIO DE LA LISTA--</option>
                    <?php if($usuarios!=FALSE ){ foreach ($usuarios as $usuario) { ?>
                        <option value="<?= $usuario->idusuario?>">
                            <?= $usuario->nombre." - ".$usuario->cargo?>
                        </option>
                    <?php } } ?>
                </select>
            </div>            
            <div class="form-group">
                <label for="referencia">*REFERENCIA: (MÁXIMO 500 CARÁCTERES)</label>
                <?php if (form_error('referencia') != "") { ?>
                    <blink>
                    <font color="red">
                    <?php echo form_error('referencia')?>
                    </font>
                    </blink>
                <?php } ?> 
                <input  type="text" name="referencia" id="referencia" 
                        class="form-control" size="5" maxlength="50" value="<?php echo set_value('referencia'); ?>">
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="pill" href="#express">Resumen</a></li>
            <li><a data-toggle="pill" href="#completo">Detallado</a></li>
        </ul>
        <div class="tab-content">
            <div id="express" class="tab-pane fade in active">
                <br>
                <div class="form-group">
                    <label for="resumen">
                        *RESUMEN: (MÁXIMO 500 CARACTERES)                    
                    </label>
                    <?php if (form_error('resumen') != "") { ?>
                            <font color="red">
                                <?php echo form_error('resumen')?>
                            </font>
                        <?php } ?>             
                    <textarea name="resumen" id="resumen" class="form-control" rows="3" required>
                        <?php echo set_value('resumen'); ?>
                    </textarea>
                </div>
            </div>
            <div id="completo" class="tab-pane fade">
                <br>
                <div class="form-group">
                    <label for="antecedentes">
                        ANTECEDENTES:                     
                    </label>
                    <textarea name="antecedentes" id="antecedentes" class="form-control" rows="5" maxlength="1000">
                        <?php echo set_value('antecedentes'); ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="analisis">ANALISIS: </label>
                    <textarea name="analisis" id="analisis" class="form-control" 
                    rows="5" maxlength="1000"><?php echo set_value('analisis'); ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="desarrollo">DESARROLLO: </label>
                    <textarea name="desarrollo" id="desarrollo" class="form-control" 
                    rows="5" maxlength="1000"><?php echo set_value('desarrollo'); ?>
                    </textarea>
                </div> 
                <div class="form-group">
                    <label for="conclusion">CONCLUSIONES: </label>
                    <textarea name="conclusion" id="conclusion" class="form-control" 
                    rows="5" maxlength="1000" value="<?php echo set_value('conclusion'); ?>">
                    </textarea>
                </div> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" name="idruta" value="<?= $idruta;?>">  
                <button type="submit" class="btn btn-success btn-lg">CREAR</button>
            </div> 
            <?php echo validation_errors('<font color="red">', '</font>'); ?>            
        </div>
    </form>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!-- <textarea name="editor1"></textarea>
<script>
    CKEDITOR.replace( 'editor1', {
        language: 'es',
        uiColor: '#9AF8F3'
        removeButtons:
    });
</script> -->