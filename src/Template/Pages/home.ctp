<div class="jumbotron">
    <h1>Welcome to the Arena</h1>
    <p>Web arena is  an online gaming website, a typical multiplayer arena created with CakePHP</p>
    <?php
    ?><section class="text-center"> <?php
        if (is_null($this->request->session()->read('Auth.User.email'))) {
            // the user not logged
            echo $this->Html->tag('p', "You're not logged");

            echo $this->Html->link(
                'Sign Up',
                array('controller' => 'Players', 'action' => 'add'),
                ['class' => 'btn btn-info mr-4']
            );

            echo $this->Html->link(
                'Login',
                array('controller' => 'Players', 'action' => 'login'),
                ['class' => 'btn btn-primary btn-sm ml-4']
            );

        } else {

            echo $this->Html->tag('p', "You're logged in !");

            echo $this->Html->link(
                'Go to the Arena',
                array('controller' => 'Arena', 'action' => 'index'),
                ['class' => 'btn btn-primary mr-4']
            );

            echo $this->Html->link(
                'Logout ',
                array('controller' => 'Players', 'action' => 'logout'),
                ['class' => 'btn btn-danger ml-4']
            );

        }

        ?>
    </section>
    <section>
        <h2>Consult the best fighters</h2>
        <p>Go to the Ranking page to consult the list of the best
            fighters of Web Arena, and try to challenge them by joining the game!</p>
        <div class="text-center">
            <?= $this->Html->link('Ranking', [
                'controller' => 'Fighters',
                'action' => 'ranking'
            ], [
                'class' => 'btn btn-warning'
            ]) ?>
        </div>
    </section>
    <section>
        <h2>Game rules</h2>
        <hr class="my-4">

        <ul>
            <li>A fighter is in a board arena at a position X, Y. This position can not be outside the
                dimensions of the arena. Only one fighter per square. One arena per website.
            </li>
            <li>A fighter starts with the following characteristics: view = 2, force = 1, health point = 5 (these
                values must be parametrized). It appears at a random free position.
            </li>
            <li>Constants values: arena width (x) (15), arena length (y) (10) (these values must be set in the
                model).
            </li>
            <li>The view characteristic determines how far (Manhattan distance = x + y) a fighter can see.
                Thus only the fighter and the elements of the scenery in range are displayed on the page
                concerned. 0 is the current square.
            </li>
            <li>The force characteristic determines how much life loses its opponent when the fighter
                succeeds in its attack action.
            </li>
            <li>When the fighter sees his hit points reach 0, it is removed from the game. A player whose
                fighter has been removed from the game is invited to recreate a new one.
            </li>
            <li>An attack action succeeds if a random value between 1 and 20 (20 sided dices) is greater
                than a threshold calculated as follows: 10 + attacker level - attacker level.
            </li>
            <li>Progression: with each successful attack the fighter gains 1 experience point. If the attack
                kills the opponent, the fighter gains as many points of experience as the level of the defeated
                opponent. All 4 points of experience, the fighter changes level and can choose to increase
                one of its characteristics: view +1 or force + 1 or health point +3. In case of progression of
                health, the maximum health points increase AND the current health points go up to
                maximum.
            </li>
            <li>In practice, the level will be incremented only when an increase is made, and use (xp / 4) -
                level to see if there are any increases to be made. The level starts and experience points start
                at 0.
            </li>
            <li>
                Each action causes an event to be created with a clear description. For example: "jonh
                attacks bill and hits".
            </li>
        </ul>

        <ul>
            <li>
                <h4>Option A:  Advanced management of the fighters and equipment (Improvement)</h4>
                <p>A fighter may have several fighters. A particular page allows him to choose which he currently plays. </p>
                <p>The system must be able to manage a new category of objects: the tools. These tools must be
                    pickable in the arena. A pick up action allows to equip them. Each tool increases a characteristic
                    (the equivalent of one to three progression) when it is worn. Possible values are V (view) D (force)
                    or L (life point). Depending on the type and bonus indicated in the database, your program may
                    propose a name (force + 1: dagger, force + 2: sword, etc.). A specific action (a button) will create a
                    dozen random objects in the field of play (for simplicity in this project the button will be available
                    on the viewing page.) </p>
            </li>
            <li>
                <h4>Option B: Communication management and Guild (Improvement)</h4>
                <p>The system must allow to send a message to another fighter. It must also add the screaming action
                    that allows to create an event with a description.</p>
                <p>The system must manage the possibility of creating
                    and joining a guild. A fighter who attacks a target gains +1 on attack by another member of his guild
                    in contact with his target.</p>
            </li>
            <li>
                <h4>Option F: Use of Bootstrap (external library)</h4>
                <p>Extra: Use bootstrap for the composition of your pages. Respect the bootstrap conventions, use
                    bootstrap classes and ids in your HTML and use the most restricted custom css possible (10 lines
                    max).</p>
                <p>If you want you can use the v4 that is being stabilized but check the result on Firefox.
                    The site must then be responsive. Install really bootstrap files in your project, do not go through the
                    CDN (or just to recover the sources) .
                    Normal: you use your own graphics, with your CSS and Javascript (Jquery if useful).</p>
            </li>
        </ul>
    </section>
</div>
