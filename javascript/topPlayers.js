$(function(){
  $.get("../core/php/GetTopPlayers.php").done(function(data){
      var players = $.parseJSON(data);  // Asumimos que `data` es el JSON recibido
      $("#players").empty();  // Limpia el select antes de añadir nuevas opciones

      // Itera sobre el array de materias
      players.forEach(function(player) {
          var selector = "<li class='top'> 👾 Nombre: " + player.nombre + " ,Dificultad: "
           +player.dificultad+", Puntaje: " +player.puntaje+ "</li>";
          $("#players").append(selector);
      });
  }).fail(function() {
      console.error("Error al cargar las materias desde el servidor.");
  });
});
