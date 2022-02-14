<script type="application/javascript">
    $(document).ready(function(){
        $("button#positivo").click(function(){
            var resposta_id = $("#votos").attr("data-resposta-id")
            $("#votos").html = "Votado: &nbsp;&nbsp;<span class='btn btn-primary'>Positivo</span>&nbsp;&nbsp;&nbsp;<span>Negativo</span>"
            console.log("Votou positivo: " + resposta_id)
        })

        $("button#negativo").click(function(){
            var resposta_id = $("#votos").attr("data-resposta-id")
            $("#votos").html = "Votado: &nbsp;&nbsp;<span>Positivo</span>&nbsp;&nbsp;&nbsp;<span class='btn btn-secondary'>Negativo</span>"
            console.log("Votou negativo: " + resposta_id)
        })
    });
</script>