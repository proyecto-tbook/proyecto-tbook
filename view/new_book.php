
<form>

<div class="form-group">
  <label for="Titulo">Titulo del Libro:</label>
  <input type="Titulo" class="form-control" id="email" ng-model='datos.titulo' value = ''>
</div>
<div class="form-group">
  <label for="autor">Autor:</label>
  <input type="text" class="form-control" ng-model='datos.autor' value = ''>
</div>
<div class="form-group">
  <label>Descripción</label>
  <textarea rows="4" cols="50" ng-model='datos.descripcion' value = ''></textarea>
</div>
<div class="form-group">
  <label>Foto portada</label>
  <input type="file" ng-model='datos.foto'>
</div>
<div class="checkbox">
  <label>
  	F_publicacion
  </label>
  <input type="date" name="nombre" ng-model= 'datos.f_publicacion'  value = ''>  
  <select ng-model="datos.cate">
  <option ng-repeat="x in cat" value="{{x.cat}}">{{x.cat}}</option>
  <label ng-model='datos.user'><?php echo $users[3]; ?></label>
  </select>

  <h5>You selected categoria: {{datos.cate}}</h5>
  <h5>You selected titulo: {{datos.titulo}}</h5>
  <h5>You selected autor: {{datos.autor}}</h5>
  <h5>You selected f_publicacion: {{datos.f_publicacion}}</h5>
  <h5>You selected descripcion: {{datos.descripcion}}</h5>
  <h5>You selected foto: {{datos.foto_portada}}</h5>
  <h5>{{datos}}</h5>
  <br>
  	
  
</div>
<div class="form-group">
  <button ng-click = "save_book(' <?php echo $users[3]; ?>')">Guardar</button>
</div><br>
</form> 