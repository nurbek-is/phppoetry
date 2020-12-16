<?php
  $pageTitle = 'Poems';
  require 'includes/header.php';
?>
<main id="poems">
  <h1><?= $pageTitle ?></h1>
  <table>
    <caption>Total Poems: 8</caption>
    <thead>
      <tr>
        <th>Poem</th>
        <th>Category</th>
        <th>Author</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      <tr class="normal">
        <td>Carrots and Camels</td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
      <tr class="normal">
        <td><a href="poem.php">Dancing Dogs in Dungarees</a></td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
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