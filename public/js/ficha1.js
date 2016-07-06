jQuery(function($) {


  function edit_dp(){
    var cedula = $("#cedula").val();
    window.open("../../trabajadores/ver/"+cedula+"/editar_dp","editDP","width=800,height=800,resizable=NO,location=NO");
  }

  $("#d_pBtn").click(function(){
    edit_dp();
  });

  var cont = 0;
  
  $("body").on('click','#btnConfirmDP', function(){  
    cont = 0;
    $(".d_p").each(function() {
      if($(this).val() == ""){
        cont++;
        $(this).siblings('span').removeClass('hidden');
        //alert(cont);

      }else{
        $(this).siblings('span').addClass('hidden');
        $("#dpMsj").addClass('hidden');
        //alert(cont);
      }    
    });    

    if(cont == 0){
      var genero = "";

      if($("#m").is(":checked")){
        genero = 1;  
      //alert("genero Masculino");
    }else{
      genero = 2;
      //alert("genero Femenino");
    }

    $.post("../../ficha1/editadoDP", {
      "cedula" : $("#cedula").val(),
      "nacionalidad" : $("#nacionalidad").val(),
      "rif" : $("#rif").val(),
      "nombre1" : $("#nombre1").val(),
      "nombre2" : $("#nombre2").val(),
      "apellido1" : $("#apellido1").val(),
      "apellido2" : $("#apellido2").val(),
      "genero" : genero,
      "f_nac" : $("#f_nac").val(),
      "lugar_nac" : $("#lugar_nac").val(),
      "telf_hab" : $("#telf_hab").val(),
      "telf_cel" : $("#telf_cel").val(),
      "dir_hab" : $("#dir_hab").val(),
      "estado_civil" : $("#estado_civil").val(),
      "correo" : $("#correo").val(),
      "discapacidad" : $("#discapacidad").val(),
      "estatus" : $("#estatus").val() } , function(data){

        var msj = JSON.parse(data);

        if(msj.msj == true){
          //alert("Se ha modificado exitosamente.");
          $("#dpMsj").removeClass('hidden');
          $(".ui-dialog").delay(1500).fadeOut('800',function(){
            location.reload(true);
          });
        }
      });
}else{
  $(".dp_er").each(function() {
      //$(this).removeClass('hidden');
    });
}
}); 

$("body").on('click','#btnConfirmDC', function(){ 

  cont = 0;

  $(".d_c").each(function() {
    if($(this).val() == ""){
      cont++;
      $(this).siblings('span').removeClass('hidden');
      //alert(cont);
    }else{
      $(this).siblings('span').addClass('hidden');
      $("#dcMsj").addClass('hidden');
        //alert(cont);
      }    
    });

  if(cont == 0){
    $.post("../../ficha1/editadoDC", {
      "cedula" : $("#cedula").val(),
      "f_ingre" : $("#f_ingre").val(),
      "f_egre" : $("#f_egre").val(),
      "tipo_nomina" : $("#tipo_nomina").val(),
      "liquidacion" : $("#liquidacion").val(),
      "pag_liquid" : $("#pag_liquid").val(),
      "cargo" : $("#cargos").val(),
      "tipo_contrat" : $("#tipo_contrat").val(),
      "ubi_fun" : $("#ubi_fun").val(),
      "ubi_nom" : $("#ubi_nom").val()    } , function(data){

        var msj = JSON.parse(data);

        if(msj.msj == true){
          $("#dcMsj").removeClass('hidden');
          $(".ui-dialog").delay(1500).fadeOut('800',function(){
            location.reload(true);
          });
        }
      });
  }
});
$("body").on("click", ".ui-dialog-titlebar-close", function(){
  $(".ui-dialog-titlebar-close").addClass("hidden");
  location.reload(true);
});

$("body").on('click','#btnConfirmDPF', function(){ 
  cont = 0;

  $(".d_pf").each(function() {
    if($(this).val() == ""){
      cont++;
      $(this).siblings('span').removeClass('hidden');
      //alert(cont);
    }else{
      $(this).siblings('span').addClass('hidden');
      $("#dpfMsj").addClass('hidden');
        //alert(cont);
      }    
    });

  if(cont == 0){
    $.post("../../ficha1/editadoDPF", {
      "cedula" : $("#cedula").val(),
      "profesion" : $("#profesion").val(),
      "nivel_instruc" : $("#nivel_instruc").val() } , function(data){

        var msj = JSON.parse(data);

        if(msj.msj == true){
          $("#dpfMsj").removeClass('hidden');
          $(".ui-dialog").delay(1500).fadeOut('800',function(){
            location.reload(true);
          });
        }

      });
  }

});

$("body").on('click','#btnConfirmDF', function(){ 
  cont = 0;

  $(".d_f").each(function() {
    if($(this).val() == ""){
      cont++;
      $(this).siblings('span').removeClass('hidden');
      //alert(cont);
    }else{
      $(this).siblings('span').addClass('hidden');
      $("#dfMsj").addClass('hidden');
        //alert(cont);
      }    
    });
  $.post("../../ficha1/editadoDF", {
    "cedula" : $("#cedula").val(),
    "nb_bancos" : $("#nb_bancos").val(),
    "cta_nro" : $("#cta_nro").val(),
    "tipo_cuenta" : $("#tipo_cuenta").val()
  } , function(data){

    var msj = JSON.parse(data);
    if(msj.msj == true){
      $("#dfMsj").removeClass('hidden');
      $(".ui-dialog").delay(1500).fadeOut('800',function(){
        location.reload(true);
      });
    }

  });

});

$("body").on("click", ".ui-dialog-titlebar-close", function(){
  $(".ui-dialog-titlebar-close").addClass("hidden");
  location.reload(true);
});

/************* Modales de edicion *******************/
$("body").on('click','#d_pBtn', function(){
  $( "#d_personales" ).removeClass('hide').dialog({
    resizable: false,
    width: '500',
    modal: true,
    title: "MODIFICAR DATOS PERSONALES",
    title_html: false,
    buttons: [
    {
      html: "<i class='ace-icon glyphicon glyphicon-ok'></i>&nbsp; Confirmar",
      "class" : "btn btn-success btn-minier",
      "id":"btnConfirmDP",
      click: function() {
          /*if(cont == true){
            $( this ).dialog( "close" );
            location.reload(true);
          }*/
        }
      }
      ,
      {
        html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
        "class" : "btn btn-minier",
        "id" : "btnClose",
        click: function() {
          $( this ).dialog( "close" );
          location.reload(true);
        }
      }
      ]
    });
});

$("body").on('click','#d_cBtn', function(){
  $( "#d_contratacion" ).removeClass('hide').dialog({
    resizable: false,
    width: '600',
    modal: true,
    title: "MODIFICAR DATOS DE CONTRATACIÓN",
    title_html: false,
    buttons: [
    {
      html: "<i class='ace-icon glyphicon glyphicon-ok'></i>&nbsp; Confirmar",
      "class" : "btn btn-success btn-minier",
      "id":"btnConfirmDC",
      click: function() {
        //$( this ).dialog( "close" );
      }
    }
    ,
    {
      html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
      "class" : "btn btn-minier",
      "id" : "btnClose",
      click: function() {
        $( this ).dialog( "close" );
        location.reload(true);
      }
    }
    ]
  });
});

$("body").on('click','#d_pfBtn', function(){
  $( "#d_profesionales" ).removeClass('hide').dialog({
    resizable: false,
    width: '500',
    modal: true,
    title: "MODIFICAR DATOS PROFESIONALES",
    title_html: false,
    buttons: [
    {
      html: "<i class='ace-icon glyphicon glyphicon-ok'></i>&nbsp; Confirmar",
      "class" : "btn btn-success btn-minier",
      "id":"btnConfirmDPF",
      click: function() {
        //$( this ).dialog( "close" );
      }
    }
    ,
    {
      html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
      "class" : "btn btn-minier",
      "id" : "btnClose",
      click: function() {
        $( this ).dialog( "close" );
        location.reload(true);
      }
    }
    ]
  });
});

$("body").on('click','#d_fBtn', function(){
  $( "#d_financieros" ).removeClass('hide').dialog({
    resizable: false,
    width: '500',
    modal: true,
    title: "MODIFICAR DATOS FINANCIEROS",
    title_html: false,
    buttons: [
    {
      html: "<i class='ace-icon glyphicon glyphicon-ok'></i>&nbsp; Confirmar",
      "class" : "btn btn-success btn-minier",
      "id":"btnConfirmDF",
      click: function() {
        //$( this ).dialog( "close" );
      }
    }
    ,
    {
      html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
      "class" : "btn btn-minier",
      "id" : "btnClose",
      click: function() {
        $( this ).dialog( "close" );
        location.reload(true);
      }
    }
    ]
  });
});
/*********************Fin modales******************************/
});
