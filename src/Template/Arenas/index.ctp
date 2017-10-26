<h1>Welcome in WebArena</h1>

<div class="grid">
    <?php for ($w=0; $w < ARENA_WIDTH; $w++): ?>
        <div class="row">
            <?php for ($h=0; $h < ARENA_HEIGHT; $h++): ?>
                <span class="cell"></span>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>
