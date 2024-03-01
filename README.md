# Spotinews

Categories: Music, bands, concerts, festivals, and others.

Examen 2do DAM (Ordinaria):

- (0pts) Crea la base de datos `spotinews` con una tabla `articles` con los siguientes campos:
    - id (int)
    - title (varchar)
    - category (varchar)
    - description (text)
    - image (varchar)
  - 🚨 En config.php, la funcion `populateData();` debe de ser descomentada para poder añadir datos a la base de datos, luego recuerda volver a comentarla.
  - En config.php debes de introducir tu usuario y contraseña de MySQL.

- (2pts) Crea un grid de una columna con cards de bootstrap en el index con los articulos de la tabla `articles`
  - Muestra el título, categoría y la imagen
  - Se valorará:
    - Intenta que el grid sea responsive
    - Usa componentes de bootstrap para el diseño
    
- (3pts) Muestra un `navbar` las categorias de los articulos. Cada categoría debe de ser una página que muestre la lista de articulos de esa categoría
  - (o por ejemplo: /spotinews/category.php/Conciertos)
  - (por ejemplo: /spotinews/category.php?category=Music)
  - Usa el mismo grid/card componente de la página principal
  - Menu Navbar de categorías:
    - Todos
    - Music
    - Conciertos
    - Festivales
    - Bandas
    - Otros
  
- (3pts) Crea una página `profile.php` que muestre un tab con las categorias y los articulos guardados por cada categoría. 
  - Si no hay articulos guardados muestra un mensaje de "No hay articulos guardados"
  - Si hay articulos guardados (para esa categoría) muestra los articulos guardados.
  - Los articulos se deben de poder añadir/eliminar desde la card y desde el detalle
  - [Recomendado] Usa el mismo grid/card componente de la página principal
  
```php
// usar el getCategories y getNews
$categories = getCategories();
foreach ($categories as $category) {
  $articles = getNews($category['category']);
  foreach ($articles as $article) {
    echo '<h5' . $article['title'] . '</h5>';
  }
}
```


- (2pts) Crea una gráfica de barras (`new Chartist.Bar`) que muestre el número de articulos por categoría.
  - La gráfica debe de usar Chartist.js
  - Los scripts de Chartist ya están incluidos
  - Divide el problema en partes:
    - La función `groupByCategory` devuelve categorías con el número de articulos `count`
    - Puedes empezar solo con la gráfica de barras con datos inventados
    - Luego puedes añadir los datos de la base de datos
  - [Opcional] La gráfica debe de tener un título y leyenda

- Ejemplo de componente de Chartist Bar:
```php
<div class="ct-chart" id="<?php echo $chartId; ?>"></div>
<script >
  new Chartist.Bar(
    '#<?php echo $chartId; ?>',
    <?php echo $chartData; ?>,
    <?php echo $chartOptions; ?>
  )
</script>
```

- Ejemplo de la función `groupByCategory`:

```php
$groups = groupByCategory();
foreach ($groups as $group) {
  $category = $group['category'];
  $count = $group['count'];
  ...
}
```