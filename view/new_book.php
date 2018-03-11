
<form>

<div class="form-group">
  <label for="Titulo">Titulo del Libro:</label>
  <input type="Titulo" class="form-control" id="email" ng-model='datos.titulo'>
</div>
<div class="form-group">
  <label for="autor">Autor:</label>
  <input type="text" class="form-control" ng-model='datos.autor'>
</div>
<div class="form-group">
  <label>Descripción</label>
  <textarea rows="4" cols="50" ng-model='datos.descripcion'></textarea>
</div>
<div class="form-group">
  <label>Foto portada</label>
  <input type="file" ng-model='datos.foto'>
</div>
<div class="checkbox">
  <label>
  	F_publicacion
  </label>
  <input type="date" name="nombre" ng-model= 'datos.f_publicacion'> 
  <label>Categoria</label> 
  <select ng-model="datos.cate">
  <option ng-repeat="x in cat" value="{{x.cat}}">{{x.cat}}</option>  <
  </select>
  <h5>{{datos}}</h5>
  <br>
  	
  
</div>
<div class="form-group">
  <button class="btn btn-search" ng-click = "save_book(' <?php echo $users[3]; ?>',datos)">Guardar</button>
</div><br>
</form> 