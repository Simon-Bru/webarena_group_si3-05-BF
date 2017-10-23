<?php $this->assign('title', 'Fighter');?>
"fighter"
<html>

<body>
<h1>My Fighter</h1>
<p>Click to level up.</p>

<div>

        <h2>My avatar</h2>
        <!--we will use $myid when using sessions-->
        <?php
        if (!file_exists(WWW_ROOT.'img'. DS . 'avatar' . DS .  $myid.'.jpg'))
            {
                echo $this->Html->image('avatar.jpg',array("width"=>"200", "height"=>"200"));
     }else
     {

                echo $this->Html->image('avatar/'.$myid.'.jpg',array("width"=>"200", "height"=>"200"));
     }
     ?>

    </div>
<a href="#" class="button" onclick="" >Change my Avatar</a>
</body>
</html>