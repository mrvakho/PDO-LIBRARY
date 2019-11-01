<table class="table table-hover">
<thead>
    <tr>
        <th width="80%"> თარიღი </th>
        <th> ფაილი </th>
    </tr>
</thead>
<tbody>
<?php
$db=getDB();
$info_query = $db->prepare("SELECT DISTINCT monthyear  FROM members order by id DESC"); 
$info_query->execute();
$results=$info_query->fetchAll(PDO::FETCH_OBJ);
if($info_query->rowCount() > 0){
foreach($results as $NEWS_QUERY_ROW) {
?>
<tr>
<td><?=$NEWS_QUERY_ROW->monthyear;?></td>
<td><a style="color:#ffffff" href='?delete=<?=$NEWS_QUERY_ROW->monthyear;?>'>წაშლა</a></td>
</tr>
<?php 
}
}
 ?>
</tbody>
</table>
