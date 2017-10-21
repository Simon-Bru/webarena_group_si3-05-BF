<?php $this->assign('title', 'Journal');?>
"diary"

<h1>Events today</h1>

<table>
    <tr>
    <th>Name</th>
    <th>Position x</th>
    <th>Position y</th>
    <th>Date</th>
</tr>

<?php foreach($allEvents as $event):?>
    <tr>
        <td><?= $event->name?></td>
        <td><?= $event->coordinate_x?></td>
        <td><?= $event->coordinate_y?></td>
        <td><?= $event->date?></td>
    </tr>
<?php endforeach; ?>
</table>