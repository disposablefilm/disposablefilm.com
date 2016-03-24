---
layout: static
title: Film Submissions
categories:
 tags:
  - landing page
image: posts/Screen-Shot-2014-05-30-submit.png
thumb: posts/thumb-submit.png
---

<?php

error_reporting(0);

?>

<div id="submission">
  <div class="row">
    <div class="col-md-12">

      <h1>Film Submissions</h1>

     <h3>DFF 2016 Deadlines</h3>
     <p>Early Submission Deadline: <b>October 1, 2016 at 11:59pm PST</b> - $5.00 fee per submission</p>
     <p>Final Submission Deadline: <b>December 1, 2016 at 11:59pm PST</b> - $15.00 fee per submission</p>

      <!--<p style="font-size: 16px;"><b>Submissions for DFF 2015 are now <span class="orange">closed</span>.</b></p>-->

      <?php
        if ((array_key_exists('HTTP_REFERER', $_SERVER) && strpos($_SERVER['HTTP_REFERER'], 'vimeo.com') !== false))
        {
      ?>
          <div id="vimeo_submit">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td class="vimeo_logo"><img src="{{ 'vimeo_lrg.gif' | asset_path }}" alt="Vimeo" width="34" height="30" style="padding: 0; margin: 0;"></td>
                <td class="vimeo_text">Welcome, friends of Vimeo! If you're new to the Disposable Film Festival, <a href="/">start here</a> to find out more.</td>
              </tr>
            </table>
          </div>
      <?php
        }
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h3>Guidelines</h3>
      <ul>
        <li>Disposable media must be central and integral to the film.
        <li>Acceptable devices include anything that you might have on you: cell phones, point and shoot cameras, DSLRs, webcams, screen capture software, Flip video cams, and the like. We love when filmmakers get creative with their equipment.
        <li>Use of multiple devices is encouraged but by no means necessary
        <li>Submissions must be under 10 minutes
        <li>Submissions must be accompanied by a non-refundable submission fee (deadlines and associated fees outlined above).
        <li>If selected, the filmmaker will be contacted and must provide an uncompressed version of the film via our ftp.
        <li>Filmmakers are responsible for their usage of restricted or copyrighted material. (DFF is not liable for any copyright material unlawfully used)
        <li>Got more questions? Visit our <a href="/faq">FAQ</a>.
      </ul>

      <h3>Selection Criteria</h3>

      <p>Selections will be equally judged on the inventive and experimental use of the media as well as the content of the film.</p>

      <h3>Prizes</h3>

      <p>The prizes for 2017 are bigger and better than ever! Stay tuned for more info.</p>

      <h3>Entering the Competition</h3>

      <div class="cta">
        <?php if (time() < strtotime('11:59pm December 1, 2016')) { ?>

          Complete the entry form here:<br>

          <input type="submit" style="margin-top: 9px;" onclick="location.href='/submit/go/'" value="Complete the Entry Form">

        <?php } else { ?>

          <b>Submissions for DFF 2017 are now <span class="orange">closed</span>.</b>

        <?php } ?>
      </div>

    </div>
    <div class="col-md-6">
      <h3>Judges</h3>

      <p>Disposable Film Festival's esteemed panel of judges includes:</p>

      <br>
      <h4>Ben Aston</h4>
      <a href="https://vimeo.com/benaston" target="_blank"><img src="{{ 'jurors/ben_aston.png' | asset_path }}" width="80" height="80" alt="Ben Aston" /></a>
      <p>Ben is a 29-year-old, London born filmmaker, raised in Singapore, Hong Kong, Shanghai, Australia and Bath. His first stab at directing was a puppet show at the age of 11 that lasted so long as to require an intermission. It had dinosaurs. His no budget short ‘Russian Roulette’ played at Sundance 2015, going on to win the Jury Prize at last year's DFF. His LFS graduation film ‘He Took His Skin Off For Me’ premiered at the 2014 BFI London film festival and has gone on to viewed over 2 million times on Vimeo. As a result of this pretty gnarly year, Screen International named him a 'Star Of Tomorrow' in October 2015.</p>

      <br>
      <h4>Business Club Royale</h4>
      <a href="http://www.businessclubroyale.com" target="_blank"><img src="{{ 'jurors/business_club_royale.png' | asset_path }}" width="80" height="80" alt="Business Club Royale" /></a>
      <p>Business Club Royale is a production company in Gothenburg on the west coast of Sweden. We strongly believe in exclusion. If something is intended for everyone, it ends up being for no one. We try not to communicate to boring people. Which is very liberating.
So buckle up Jimmy, shit is about to get weird. Premium weird. We are: Christian Kuosmanen, Producer; Vedran Rupic, Director; Gustav Sundström, Director</p>

      <br>
      <h4>William Caballero</h4>
      <a href="https://vimeo.com/cabal" target="_blank"><img src="{{ 'jurors/william_caballero.png' | asset_path }}" width="80" height="80" alt="William Caballero" /></a>
      <p>William D. Caballero is a multimedia filmmaker, composer, and video artist, specializing in telling big stories using small figures. His recent web­series Gran’pa Knows Best, which features 3D printed miniatures of his Puerto Rican grandfather, was licensed by HBO in a first­-time interstitial deal for the network. In addition, his autobiographical documentary American Dreams Deferred, and 3D scanned/printed inspirational series The Smallest Step, premiered on the World Channel in 2012 and 2015 respectively. Caballero is a recipient of the Gates MillenniumScholarship, and graduate of Pratt Institute and NYU.</p>

      <br>
      <h4>DANIELS</h4>
      <a href="http://www.danieldaniel.us/" target="_blank"><img src="{{ 'jurors/daniel_scheinert.png' | asset_path }}" width="80" height="80" alt="Daniel Scheinert" /></a>
      <a href="http://www.danieldaniel.us/" target="_blank"><img src="{{ 'jurors/daniel_kwan.png' | asset_path }}" width="80" height="80" alt="Daniel Kwan" /></a>
      <p>DANIELS is comprised of two guys named Daniel [Daniel Scheinert and Daniel Kwan]. Daniel grew up in Massachusetts, began working in animation and graphics, when all of a sudden he met Daniel. Daniel is from Alabama and comes from a comedy and theatre background. Together they share the writing, directing, editing, and VFX on every kind of film they can possibly tackle. Often times they hold a camera. And when necessary they act, dance, or stunt double. They have a penchant for weird dramas and straight-faced comedies. Self-aware stories that tear themselves apart in an attempt to show audiences something a little bit new, or an attempt to be as honest as possible, or maybe just an attempt to not be boring. They’ve been nominated for a best music video Grammy, an MTV VMA award, awarded a UK MVA for Best Music Video 2011, and a Vimeo Award for Best Music Video in 2012. But most importantly they got into the 2014 Sundance Labs with their forthcoming film Swiss Army Man!  Collectively their music videos, short films, viral videos, commercials, have earned millions of views – and one time, they dressed up as pigeons and danced at the Hammer Museum. They both currently live and work in LA. But to be honest, Daniel does most of the work.</p>

      <br>
      <h4>Clement Deneux</h4>
      <a href="https://vimeo.com/clementdeneux" target="_blank"><img src="{{ 'jurors/clement_deneux.png' | asset_path }}" width="80" height="80" alt="Clement Deneux" /></a>
      <p>Born in 1982 in France, Clement began his creative career by studying graphic design. In 2005, he began to design and produce awarded title sequences for different french channels. Between 2009 and 2011 he wrote and directed two short films: THE NAILS and ZOMBINLADEN: THE AXIS OF EVIL DEAD both of which went viral and were at the Disposable Film Festival. THE NAILS was awarded the Grand Prize at DFF2012. Clement is currently working on his feature film debut, DECOMPOSITION.</p>

      <br>
      <h4>E.J. McLeavey-Fisher</h4>
      <a href="https://vimeo.com/ejmf" target="_blank"><img src="{{ 'jurors/ej_mcleavey.png' | asset_path }}" width="80" height="80" alt="E.J. McLeavey-Fisher" /></a>
      <p>E.J. McLeavey-Fisher is filmmaker based in New York City. He began his career at MTV, directing Emmy-nominated commercial, shortform, and longform content for the network.  Last year, his documentary short Comic Book Heaven was selected as a Vimeo Staff Pick and Short of the Week.  It has screened at film festivals around the world including the AFI DOCS, the Big Sky Documentary Film Festival, the Montclair Film Festival and the Disposable Film Festival, where it received an Honorable Mention.  His latest short The Dogist, released in early February also received a Staff Pick and has been featured on Short of the Week.</p>

      <br>
      <h4>Bianca Giaever</h4>
      <a href="https://vimeo.com/biancagiaever" target="_blank"><img src="{{ 'jurors/bianca_giaever.png' | asset_path }}" width="80" height="80" alt="Bianca Giaever" /></a>
      <p>Bianca Giaever is a public radio producer and filmmaker. Her work has been featured in places such as This American Life, Radiolab, The New York Times, Buzzfeed, and the TED conference. She's interested in using nonfiction audio interviews to tell stories in new mediums.</p>

      <br>
      <h4>Jamie Heinrich</h4>
      <a href="https://vimeo.com/heinrichfilm" target="_blank"><img src="{{ 'jurors/jamie_heinrich.png' | asset_path }}" width="80" height="80" alt="Jamie Heinrich" /></a>
      <p>Jamie is a DIY filmmaker residing in the greater Los Angeles area where he produces and directs film as part of a new breed of self-taught filmmakers. Jamie released some of the top snowboard and skateboard films worldwide before the age of 18 continuing through the 90's.  After making multiple short films he’s produced and directed 5 feature films in the last few years being distributed on major platforms where he’s won multiple festival awards.</p>

      <br>
      <h4>Zac Hug</h4>
      <a href="https://vimeo.com/129702876" target="_blank"><img src="{{ 'jurors/zac_hug.png' | asset_path }}" width="80" height="80" alt="Zac Hug" /></a>
      <p>Zac Hug  is a Los Angeles based television writer (Drop Dead Diva), was previously the Director of Digital Content for ABC Family, and  was a talking head for So, Get This at Soapnet.com and Inside ABC Family. Shorts include All Kinds of Time and Yeux for Jamie Heinrich. Play productions include The Burden of Sunflowersfor the New York Fringe Festival and Williamstown Theatre Workshop, and Freaking Out for Breedingground Spring Fever.</p> 

      <br>
      <h4>Kirsten Lepore</h4>
      <a href="http://www.kirstenlepore.com/" target="_blank"><img src="{{ 'jurors/kirsten_lepore.png' | asset_path }}" width="80" height="80" alt="Kirsten Lepore" /></a>
      <p>Kirsten Lepore is a Los Angeles-based director and animator, and alumna of CalArts. Her films have taken top prizes at SXSW, Slamdance, and many other international festivals. Commercially, she has worked with Google, MTV, Yo Gabba Gabba, Newsweek, Whole Foods, Toyota, Facebook, Nickelodeon, Nestle, and Glamour Magazine. Kirsten has given presentations everywhere from Pixar to Portugal and has also been featured in Juxtapoz, Shots, and was named one of the 50 most creative people by Creativity Magazine.</p>

      <br>
      <h4>Anthony Sherin</h4>
      <a href="https://vimeo.com/user14700136" target="_blank"><img src="{{ 'jurors/anthony_sherin.png' | asset_path }}" width="80" height="80" alt="Anthony Sherin" /></a>
      <p>Anthony is an award-winning filmmaker whose short film, SOLO, PIANO – NYC, won the Audience Choice Award at the Disposable Film Festival 2013. It was also selected as one of the outstanding photo projects of today by Look3 Festival of the Photograph 2013 and was featured in the New York Times’ Op-Docs Series. His documentary, ORIGINAL INTENT: The Battle for America, aired on PBS. Anthony is also an accomplished film editor whose credits include ONE YEAR LEASE, best short documentary Tribeca Film Festival 2014, nominee for Cinema Eye Honors 2015, and official selection Sundance Film Festival 2015. His feature film credits include THE CURE (Universal), A SOLDIER’S SWEETHEART (Paramount/Showtime), and FIRST TIME FELON (HBO).</p>

    </div>

  </div>
</div>
