$(function(){
  $.get("../core/php/MateriaDispatcherComplet.php").done(function(data){
      var materias = $.parseJSON(data);  // Asumimos que `data` es el JSON recibido
      $("#materia").empty();  // Limpia el select antes de añadir nuevas opciones

      // Itera sobre el array de materias
      materias.forEach(function(materia) {
          var selector = "<option value='" + materia.id + "'>" + materia.nombre + "</option>";
          $("#materia").append(selector);
      });
  }).fail(function() {
      console.error("Error al cargar las materias desde el servidor.");
  });
});
