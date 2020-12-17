<?php
  $pageTitle = 'Poems';
  require 'includes/header.php';
  // Set defaults for $order and $dir
  $order = $_GET['order'] ?? 'date_approved';
  $dir = $_GET['dir'] ?? 'desc';
  //8 lines below(including if stmnt-!in_array) is just extra step,if someone messes with querystring 
  // and types in some string in $order or $dir fields, it won't mess the page
  $orderAllowed=['title','category','username','date_approved'];
  $dirAllowed=['asc','desc'];
  if(!in_array($order, $orderAllowed)) {
    $order = 'date_approved';
  }
  if(!in_array($dir,$dirAllowed)) {
    $dir = 'asc';
  }

  $offset = $_GET['offset'] ?? 0;
  $offset = (int) $offset; //converts it to integer,So we can use === later in the code
  $rowsToShow = 5;
  $dsn = 'mysql:host=localhost;dbname=poetree';
  $username = 'root';
  $password = 'pwdpwd';
  $db = new PDO($dsn, $username, $password);
  $query = "SELECT p.poem_id, p.title, p.date_approved, 
  c.category, u.username
          FROM poems p
          JOIN categories c ON c.category_id = p.category_id
          JOIN users u ON u.user_id = p.user_id
          WHERE p.date_approved IS NOT NULL
          ORDER BY $order $dir 
          LIMIT $offset, $rowsToShow";
  $stmt = $db->prepare($query);
  $stmt->execute();

  $qPoemCount = "SELECT COUNT(p.poem_id) AS num
  FROM poems p
    JOIN categories c ON c.category_id = p.category_id
    JOIN users u ON u.user_id = p.user_id
  WHERE p.date_approved IS NOT NULL";

  $stmtPoemCount = $db->prepare($qPoemCount);
  $stmtPoemCount->execute();
  $poemCount = $stmtPoemCount->fetch()['num'];

  $prevOffset = max($offset - $rowsToShow, 0);
  $nextOffset = $offset + $rowsToShow;

  $href = "poems.php?"; 
  $prev = $href . "offset=$prevOffset&order=$order&dir=$dir";
  $next = $href . "offset=$nextOffset&order=$order&dir=$dir";

  /*CONSTRUCT THE LINKS FOR THE HEADERS */
  //Default all directions to ascending
  $dirTitle = 'asc';
  $dirCategory = 'asc';
  $dirUsername = 'asc';
  $dirPublished = 'asc';
  if($dir ==='asc') {
    switch ($order) {
      case 'title':
        $dirTitle = 'desc';
        break;
      case 'category':
        $dirCategory= 'desc';
        break;
      case  'username':
        $dirUsername = 'desc';
        break;
      case 'date_approved':
        $dirPublished = 'desc';
        break;  
    }
  }
  $titleLink = $href . "order=title&dir=$dirTitle";//poems.php?order=title&dir=asc
  $categoryLink = $href . "order=category&dir=$dirCategory";
  $usernameLink = $href . "order=username&dir=$dirUsername";
  $publishedLink = $href . "order=date_approved&dir=$dirPublished";
?>
<main id="poems">
  <h1><?= $pageTitle ?></h1>
  <table>
    <caption>Total Poems: <?= $poemCount ?></caption>
    <thead>
      <tr>
        <th>
          <a href="<?=$titleLink ?>">Poems</a>
        </th>
        <th>
          <a href="<?=$categoryLink ?>">Category</a>
        </th>
        <th>
          <a href="<?=$usernameLink ?>">Author</a>
        </th>
        <th>
          <a href="<?=$publishedLink ?>">Published</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = $stmt->fetch()) { 
          $approved = strtotime($row['date_approved']);
          $published = date('m/d/Y', $approved);
      ?>
        <tr class="normal">
          <td>
            <a href="poem.php?poem-id=<?= $row['poem_id'] ?>">
              <?= $row['title'] ?>
            </a>
          </td>
          <td><?= $row['category'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $published ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot class="pagination">
      <tr>
        <?php 
          if ($offset === 0) {
            echo "<td class='disabled'>Previous</td>";
          } else {
            echo "<td><a href='$prev'>Previous</a></td>";
          }
        ?>
        <td colspan="2"></td>
        <?php 
          if ($nextOffset >= $poemCount) {
            echo "<td class='disabled'>Next</td>";
          } else {
            echo "<td><a href='$next'>Next</a></td>";
          }
        ?>
      </tr>
    </tfoot>
  </table>
  <h2>Filtering</h2>
  <form method="get" action="poems.php">
    <label for="cat">Category:</label>
    <select name="cat" id="cat">
      <option value="0">All</option>
      <option value='2'>Funny (5)</option>
      <option value='1'>Romantic (2)</option>
      <option value='4'>Serious (1)</option>
    </select>
    <label for="user">Author:</label>
    <select name="user" id="user">
      <option value="0">All</option>
      <option value='3'>Dawnable (1)</option>
      <option value='2'>HugHerHeart (2)</option>
      <option value='1'>LimerickMan (5)</option>
    </select>
    <button name="filter" class="wide">Filter</button>
  </form>
</main>
<?php
  require 'includes/footer.php';
?>