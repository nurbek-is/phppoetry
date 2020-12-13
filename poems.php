<?php
  $pageTitle = 'Poems';
  require 'includes/header.php';

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
          ORDER BY p.date_approved DESC";
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
?>
<main id="poems">
  <h1><?= $pageTitle ?></h1>
  <table>
    <caption>Total Poems: <?= $poemCount ?></caption>
    <thead>
      <tr>
        <th>Poem</th>
        <th>Category</th>
        <th>Author</th>
        <th>Published</th>
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
        <td>Previous</td>
        <td colspan="2"></td>
        <td>Next</td>
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