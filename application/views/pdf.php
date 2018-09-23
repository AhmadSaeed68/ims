<?php
  
print_r($pdf);
?>

<table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Item Name</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($pdf as $pdf):?>
        <td><?= $pdf['id']?></td>
        <td><?= $pdf['item_name']?></td>
        
      </tr>
      <?php endforeach;?>
     
    </tbody>
  </table>