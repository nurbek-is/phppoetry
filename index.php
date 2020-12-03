<?php
require 'includes/header.php';
?>
<main>
  <h1>Latest Poems</h1>
  <table>
    <thead>
      <tr>
        <th>Poem</th>
        <th>Category</th>
        <th>Author</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Carrots and Camels</td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
      <tr>
        <td>Dancing Dogs in Dungarees</td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
      <tr>
        <td>The Geriatric General</td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"><a href="poems.php">More Poems</a></td>
      </tr>
    </tfoot>
  </table>
</main>
<?php   
    require 'includes/footer.php';
?>  