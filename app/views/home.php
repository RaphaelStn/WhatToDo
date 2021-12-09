<section id="home">
  <h2> You don't know what to do? Let us help find an idea ! </h2>
  <div class="home-container">
    <div class="home-row">
      <div class="home-movies">
        <p>Movie Mood ? <i class="fas fa-arrow-right"></i></p>
        <div class="home-trending">
          <?php
            foreach($variable1 as $movie):
          ?>
          <div>
            <img class="trending-img" src="https://image.tmdb.org/t/p/w500/<?php echo $movie['poster_path']?>"></img> 
            <p><?php echo $movie['title']?></p>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      <div class="home-shows">
      <p>TV Show Mood ? <i class="fas fa-arrow-right"></i></p>
      <div class="home-trending">
          <?php
            foreach($variable2 as $show):
          ?>
          <div>
            <img class="trending-img" src="https://image.tmdb.org/t/p/w500/<?php echo $show['poster_path']?>"></img> 
            <p><?php echo $show['name']?></p>
          </div>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
    <div class="home-row">
      <div class="home-games">
        <p>Gaming Mood ? <i class="fas fa-arrow-right"></i></p>
        <div class="home-trending">
          <?php
            foreach($variable3 as $game):
          ?>
          <div class="trending-container">
            <img class="trending-img" src="<?php echo $game['background_image']?>"></img> 
            <p><?php echo $game['name']?></p>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      <div class="home-music">
        <p>Music Mood ? <i class="fas fa-arrow-right"></i></p>
        <div class="home-trending">
        </div>
      </div>
  </div>
  <div class="btn-fate-container">
      <a class="btn btn-fate">Or let the fate decide..</a>
    </div>
</section>