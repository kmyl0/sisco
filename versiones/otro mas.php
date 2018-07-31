<?php if ($proveido->id_estado_proveido == '2' || $proveido->id_estado_proveido == '3' ): ?>
											<!-- Single button -->
											<div class="dropup">
												<button type="button" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Accion <span class="caret"></span>
												</button>
											    <ul class="dropdown-menu dropdown-menu-right">
												    <li>
												    	<form action="<?= base_url(); ?>dms/proceso/derivar" method="POST" id="frmDerivar">
															<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
															<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
															<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
															<input type="hidden" name="procedencia" id="inputReferencia" class="form-control" value="<?= $proveido->procedencia; ?>">
															<button type="submit" class="btn btn-primary btn-block">Derivar</button>
														</form>
												    </li>
												    <li>
												    	<form action="<?= base_url(); ?>dms/proceso/procesar" method="POST" id="frmProcesar">
															<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
															<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
															<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
															<input type="hidden" name="procedencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
															<button type="submit" class="btn btn-primary btn-block">Emitir Documento</button>
														</form>
												    </li>
												    <li>
												    	<form action="<?= base_url(); ?>dms/proceso/archivar" method="POST" id="frmArchivar" >
															<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
															<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
															<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
															<input type="hidden" name="procedencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
															<button type="submit" class="btn btn-primary btn-block">Archivar</button>
														</form>		
												    </li>												    
												</ul>
											</div>
										<?php endif ?>

										<?php if ($proveido->id_estado_proveido == '4'): ?>											
											<?php if ($proveido->id_proceso_proveido == '1'): ?>
												<form action="<?= base_url(); ?>dms/proceso/derivar" method="POST" role="form" id="frmDerivar" class="form-inline">
													<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
													<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
													<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
													<input type="hidden" name="procedencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
													<span class="label label-default">Derivacion</span>
													<!--<button type="submit" class="btn btn-primary">Derivar</button>-->
												</form>
											<?php endif ?>
											<?php if ($proveido->id_proceso_proveido == '2'): ?>
												<form action="<?= base_url(); ?>dms/proceso/procesar" method="POST" role="form" id="frmProcesar"> 
													<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
													<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
													<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
													<input type="hidden" name="procedencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
													<span class="label label-default">Emisión de Documento</span>
													<!--<button type="submit" class="btn btn-primary">Emitir Documento</button>-->
												</form>
											<?php endif ?>
											<?php if ($proveido->id_proceso_proveido == '3'): ?>
												<form action="<?= base_url(); ?>dms/operacion/recuperar" method="POST" role="form" id="frmProcesar"> 
													<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
													<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
													<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
													<input type="hidden" name="procedencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
													<button type="submit" class="btn btn-primary btn-block">Recuperar</button>
												</form>
											<?php endif ?>
										<?php endif ?>
									</td>
								</tr>				











								
								
					<div class="form-group">
						<label for="copia">CON COPIA:</label>
						<select class="form-control" name="copiaDestinatario" id="slcCopia" multiple="multiple" style="width: 98%;">						
							<?php if (isset($Destinatarios)): ?>
								<?php foreach ($Destinatarios as $destinatario): ?>
									<?php if ($destinatario->nombre != $AutorNombre): ?>
										<option value=" <?= $destinatario->idusuario; ?> ">
											<?= $destinatario->nombre." - ".$destinatario->cargo; ?>
										</option>
									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
						</select> 						
					</div>