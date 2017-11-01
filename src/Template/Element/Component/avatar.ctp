<?php
$avatar_path = glob(WWW_ROOT.'img/avatars/fighter_'.$fighterId.'.*');
if (!$avatar_path)
{
    echo $this->Html->image('avatars/'.DEFAULT_AVATAR, [
        'class' => 'img-fluid'
    ]);
}else
{

    echo $this->Html->image(
        'avatars/fighter_'
        .$fighterId.'.'
        .explode('.', $avatar_path[0])[1]. '?='.date('U'),
        [
            'class' => 'img-fluid',
            'alt' => 'avatar'
        ]);

}
?>
