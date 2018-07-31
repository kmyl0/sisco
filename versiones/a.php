<script type="text/javascript">
	$(document).ready(function() {
		$('#chkEsMilitar').click(function() {
			$('#grado').attr('disabled',!this.checked);
			$('#fuerza').attr('disabled',!this.checked);
			$('#regimiento').attr('disabled',!this.checked);
			$('#carnetMilitar').attr('disabled', !this.checked);
		});
		$('#dtpFechaNacimiento').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
        $('#dtpFechaIngresoPersonal').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
        $('#dtpfechaSalidaPersonal').datetimepicker({
            viewMode: 'years',
            format: 'YYYY/MM/DD'
        });
	});
	$('#frmNuevoUsuario').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			apellidoPaterno:{
				validators:{
					notEmpty:{
						message: 'El apellido paterno es un dato requerido'
					}
				}
			},
			apellidoMaterno:{
				validators:{
					notEmpty:{
						message: 'El apellido materno es un dato requerido'
					}
				}
			},
			nombres:{
				validators:{
					notEmpty:{
						message: 'El nombre es un dato requerido'
					}
				}
			},
			grado:{
				validators:{
				}
			},
			fuerza:{
				validators:{
				}
			},
			regimiento:{
				validators:{
				}
			}
			// ,
			// ci:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El carnet de identidad es un dato requerido'
			// 		},
			// 		integer: {
   //                      message: 'El valor no es un número'
   //                  }
			// 	}
			// },
			// expedido:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El expedido es un dato requerido'
			// 		}
			// 	}
			// },
			// domicilio:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El domicilio es un dato requerido'
			// 		}
			// 	}
			// },
			// estadoCivil:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El estado civil es un dato requerido'
			// 		}
			// 	}
			// },
			// idBiometrico:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El código biometrico es un dato requerido'
			// 		}
			// 	}
			// },
			// cargo:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El cargo es un dato requerido'
			// 		}
			// 	}
			// },
			// area:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El área es un dato requerido'
			// 		}
			// 	}
			// },
			// departamento:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'El departamento es un dato requerido'
			// 		}
			// 	}
			// },
			// profesion:{
			// 	validators:{
			// 		notEmpty:{
			// 			message: 'La profesión es un dato requerido'
			// 		}
			// 	}
			// }
		} 
	});
</script>
<?php 
//DATOS PERSONALES
		$this->form_validation->set_rules('apellidoPaterno', 'Apellido Paterno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('apellidoMaterno', 'Apellido Materno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('nombres', 'Nombres', 'required|max_length[50]');	
		$this->form_validation->set_rules('grado', 'Grado','trim|min_length[5]|max_length[200]');
		$this->form_validation->set_rules('fuerza', 'Fuerza','trim|min_length[5]|max_length[200]');
		$this->form_validation->set_rules('regimiento', 'Unidad / Regimiento / Destino','trim|min_length[5]|max_length[200]');
		$this->form_validation->set_rules('carnetMilitar', 'Carnet Militar', 'trim|min_length[5]|max_length[50]');

		// $this->form_validation->set_rules('fotoperfil', 'Foto Perfil', 'trim|required');
		//$this->form_validation->set_rules('ci', 'Carnet de identidad', 'trim|required');
		$this->form_validation->set_rules('expedido', 'expedido', 'required');
		//$this->form_validation->set_rules('fechaNacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('telefono', 'Telefono', 'trim');
		$this->form_validation->set_rules('celular', 'Celular', 'trim');
		//$this->form_validation->set_rules('domicilio', 'Domicilio', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('codigoSeguro', 'Codigo Seguro', 'trim');
		$this->form_validation->set_rules('estadoCivil', 'Estado Civil', 'required');
		//$this->form_validation->set_rules('codigoBiometrico', 'ID Biometrico', 'required');
		//BANCO Y CUENTA DEL BANCO ES UNA OPCION QUE SE LLENA LUEGO
		//CONTRATO
		$this->form_validation->set_rules('cargo', 'Cargo', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		$this->form_validation->set_rules('departamento', 'Departamento', 'required');
		//$this->form_validation->set_rules('fechaIngresoPersonal', 'Fecha de ingreso de personal', 'trim|required');
		//$this->form_validation->set_rules('fechaSalidaPersonal', 'Fecha de salida de personal', 'trim|required');
		$this->form_validation->set_rules('ficheroContrato', 'Fichero de contrato');
		//$this->form_validation->set_rules('profesion', 'Profesion', 'trim|required|min_length[5]|max_length[20]');
		 ?>