


<html>
<head>
    <meta charset="utf-8">
    <meta lang="pt-BR">
    <title> Calendário Dinâmico com PHP + FullCalendar </title>
    

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.0/fullcalendar.css" />



    <script src='<?php echo e(URL('/js/fullcalendar/lib/jquery.min.js')); ?>'></script>
    <script src='<?php echo e(URL('/js/fullcalendar/lib/moment.min.js')); ?>'></script>
    <script src='<?php echo e(URL('/js/fullcalendar/fullcalendar.js')); ?>'></script>
    
    <!-- script de tradução -->
    <script src='<?php echo e(URL('/js/fullcalendar/lang/pt-br.js')); ?>'></script>
        
    <script>
       $(document).ready(function() {	
           	
            //CARREGA CALENDÁRIO E EVENTOS DO BANCO
            $('#calendario').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2017-11-23',
                editable: true,
                eventLimit: true, 
                events: '<?php echo e(ROUTE('agenda.calendariojson')); ?>',           
                eventColor: '#1492CC'
            });	
            
            //CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_evento.php",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Cadastrado com sucesso! ");
                            //atualiza a página!
                            location.reload();
                        }else{
                            alert("Houve algum problema.. ");
                        }
                    }
                });                
                return false;
            });	
       }); 
       
       function abrirLink($id){
        $url = $('#urlsite').val();
        $link = $url + '/' +$id;
        window.open($link);

}
                
    </script>
    <input type="hidden" value="<?php echo e(URL('/agenda/editar')); ?>" id="urlsite">
    <style>
        #calendario{
            position: relative;
            width: 70%;
            margin: 0px auto;
        }        
    </style>
    
</head>
<body>    
    <div id='calendario'>
        <br/>
        
    </div>
</body>
</html>
