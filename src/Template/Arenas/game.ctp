<?php $this->assign('title', 'Game');?>
"Game"

    <table>
        <tr>
            <th>name </th>
            <th>LEVEL</th>
            <th>XP</th>
            <th>current health</th>
            <th>skill health</th>
            <th>strength</th>
            <th>sight</th>
        </tr>

<?php foreach($allFighters as $my):?>

    <tr>
        <td><?= $my->name?></td>
        <td><?= $my->level?></td>
        <td><?= $my->xp?></td>
        <td><?= $my->current_health?></td>
        <td><?= $my->skill_health?></td>
        <td><?= $my->skill_strength?></td>
        <td><?= $my->skill_sight?></td>
    </tr>

<?php endforeach; ?>

    </table>
