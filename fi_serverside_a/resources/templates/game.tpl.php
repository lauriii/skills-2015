<article class="subtitle-row">
    <h2>Playing game...</h2>
    <article class="alert-spacing">
        <p class="dates">Time: <span class="time"><?php print $time; ?> sec</span></p>
       <?php /* <article class="alert game-alert">You Win!!</article> */ ?>
    </article>
    <figure class="container-photo circle img_tic o"></figure>
    <figure class="container-photo circle img_tic x"></figure>
    <h3 class="relative-pos-game">
        <span class="points"><span class="nameuser">Player: <span class="usermoves moves">0</span></span></span><span class="points"><span class="computer">Computer: <span class="computermoves moves">0</span></span></span>
    </h3>
</article>
<article class="container-row relative-pos-game">
    <article class="game">
        <?php foreach ($moves as $key => $move): ?>
            <article class="field"><button id="<?php print $key ?>" class="btn img_tic <?php print $move ?: ''; ?>"></button></article>
        <?php endforeach ?>
    </article>
</article>
<article class="container-row center form">
    <?php /*  <article class="form-win">
        <form>
            <label for="nickname">Enter your Nickname </label>
            <input id="nickname" type="text" name="nickname" placeholder="Nickname">
            <input type="submit" name="" id="" class="" value="Submit">
        </form>
      <article class="alert-spacing-error">
            <article class="alert"><span class="underline">Message:</span> Enter your nickname !!</article>
        </article>
    </article>*/ ?>
    <br>
</article>
<div class="button-start">
    <a href="index.php?restart=1"><button>START NEW GAME</button></a>
</div>