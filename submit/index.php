---
layout: static
title: Film Submissions
categories:
  - news
  - home
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

     <h3>DFF 2015 Deadlines</h3>
     <p>Early Submission Deadline: <b>October 1, 2014 at 11:59pm PST</b> - $5.00 fee per submission</p>
     <p>Final Submission Deadline: <b>December 1, 2014 at 11:59pm PST</b> - $15.00 fee per submission</p>

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

      <p>The prizes for 2015 are bigger and better than ever! Stay tuned for more info.</p>

      <h3>Entering the Competition</h3>

      <div class="cta">
        <?php if (time() < strtotime('11:59pm December 1, 2014')) { ?>

          Complete the entry form here:<br>

          <input type="submit" style="margin-top: 9px;" onclick="location.href='/submit/go/'" value="Complete the Entry Form">

        <?php } else { ?>

          <b>Submissions for DFF 2015 are now <span class="orange">closed</span>.</b>

        <?php } ?>
      </div>

    </div>
    <div class="col-md-6">
      <h3>Judges</h3>

      <p>Disposable Film Festival's esteemed panel of judges includes:</p>

      <h4>DANIELS</h4>
      <p>DANIELS is comprised of two guys named Daniel [Daniel Scheinert and Daniel Kwan]. Daniel grew up in Massachusetts, began working in animation and graphics, when all of a sudden he met Daniel. Daniel is from Alabama and comes from a comedy and theatre background. Together they share the writing, directing, editing, and VFX on every kind of film they can possibly tackle. Often times they hold a camera. And when necessary they act, dance, or stunt double. They have a penchant for weird dramas and straight-faced comedies. Self-aware stories that tear themselves apart in an attempt to show audiences something a little bit new, or an attempt to be as honest as possible, or maybe just an attempt to not be boring. They’ve been nominated for a best music video Grammy, an MTV VMA award, awarded a UK MVA for Best Music Video 2011, and a Vimeo Award for Best Music Video in 2012. But most importantly they got into the 2014 Sundance Labs with their forthcoming film Swiss Army Man!  Collectively their music videos, short films, viral videos, commercials, have earned millions of views – and one time, they dressed up as pigeons and danced at the Hammer Museum. They both currently live and work in LA. But to be honest, Daniel does most of the work.</p>

      <h4>Kirsten Lepore</h4>
      <p>Kirsten Lepore is a Los Angeles-based director and animator, and alumna of CalArts. Her films have taken top prizes at SXSW, Slamdance, and many other international festivals. Commercially, she has worked with Google, MTV, Yo Gabba Gabba, Newsweek, Whole Foods, Toyota, Facebook, Nickelodeon, Nestle, and Glamour Magazine. Kirsten has given presentations everywhere from Pixar to Portugal and has also been featured in Juxtapoz, Shots, and was named one of the 50 most creative people by Creativity Magazine.</p>

      <h4>Sascha Ciezata</h4>
      <p>Sascha Ciezata is an independent animator and illustrator whose work is in the hand-drawn tradition. His stylish brand of animation has played SXSW and numerous film festivals in the US and abroad. He has also animated the tales of such luminaries as Werner Herzog, Larry David and Bret Easton Ellis, among others. His first animated graphic novel Heart of Darkness is currently unfolding on Instagram @darkheartnyc.</p>

      <h4>Matthew Lessner</h4>
      <p>Matthew Lessner's first short film Darling Darling (2005), starring Michael Cera, screened at over 30 film festivals worldwide, garnering a number of awards along the way. By Modern Measure (2007) screened extensively including at SXSW and the Sundance Film Festival. His latest short film Chapel Perilous (2014) won the Audience Award at the Sundance Film Festival. Lessner's feature film debut The Woods (2011) premiered in the New Frontier program at the Sundance Film Festival. His second feature film, Automatic at Sea (2014), was selected for inclusion in the 2014 U.S. In Progress Paris initiative. Lessner was awarded two grants from the San Francisco Film Society for his upcoming feature Terror Tuesday. In addition to narrative work, Lessner has directed over a dozen music videos for acclaimed bands such as Dirty Projectors and Explosions in the Sky. He has also collaborated on a number of musical projects and his photographs have been printed in various publications.</p>

      <h4>Stefan Nadelman</h4>
      <p>In 2003, Nadelman's film Terminal Bar won the Sundance Jury Prize for short film. The photographs featured in the film would later be published by Princeton Architectural Press in a 2014 book authored by Stefan and his father Sheldon. Since the success of Terminal Bar, he's produced animation for Robert Smigel (Saturday Night Live), Dave Eggers, Davis Guggenheim, and Portland, OR indie rock bands Menomena, Ramona Falls, and Lost Lander. Stefan's work is currently featured prominently in two breakout documentaries that premiered in the 2015 Sundance film festival, Kurt Cobain: Montage of Heck, and Being Evel. Stefan Nadelman resides in Portland, OR and continues to animate for film, fun, and food.</p>

      <h4>Bruno Smadja</h4>
      <p>Bruno Smadja is french and he turns 44 years old in 2015. In the last ten years, he has created 2 events dedicated to new forms of video. 10 years ago, he launched the first ever Mobile Film Festival in the world. Based in Paris on simple principle 1 Mobile, 1 Minute, 1 Film. Great films to discover www.mobilefilmfestival.com. He created Cross Video Days that became in 6 years the European leading financing market for digital content. Next edition will be in Paris on 11/12 June. (more info on www.crossvideodays.com). Bruno loves short, very short, long, webseries, transmedia, documentaries, animation, in one world he loves films and he is so honored to be part of the jury of such a creative festival as the Disposable Film Festival.</p>
    </div>

  </div>
</div>
