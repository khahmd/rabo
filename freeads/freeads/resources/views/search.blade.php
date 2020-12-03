

@foreach ($products as $product)
<tr>
    <td>{{$product->title}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->price}}</td>
    <td><img src="{{asset('images')}}/{{$product->profileimage}}" style="max-width:80px;" /></td>
</tr>
@endforeach

<?
if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $product = $bdd->query('SELECT title FROM product WHERE title LIKE "%' . $q . '%" ORDER BY id DESC');
    if ($product->rowCount() == 0) {
       $product = $bdd->query('SELECT title FROM product WHERE CONCAT(title, price) LIKE "%' . $q . '%" ORDER BY id DESC');
    }
 }
 ?>
 <form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
 </form>
 <?php if ($products->rowCount() > 0) { ?>
    <ul>
       <?php while ($a = $products->fetch()) { ?>
          <li><?= $a['name'] ?></li>
       <?php } ?>
    </ul>
 <?php } else { ?>
    Aucun résultat pour: <?= $q ?>...
 <?php } ?>