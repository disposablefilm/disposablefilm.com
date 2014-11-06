---
layout: static
title: Film Submissions
categories:
  - carousel
  - news
tags:
  - carousel
  - landing page
  - carousel
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

      <h4><a href="http://www.imdb.com/name/nm0394046/" target="_blank">Ted Hope</a></h4>
      <p>Dubbed "the most powerful man in independent cinema," Ted Hope is the CEO of Fandor and producer of over to seventy films, including 21 GRAMS, AMERICAN SPLENDOR, HAPPINESS, THE ICE STORM, IN THE BEDROOM and ADVENTURELAND. Ted has won three Sundance Grand Prizes and produced the first features of Alan Ball, Michel Gondry, Hal Hartley, Nicole Holofcener, and Ang Lee. He blogs at <a href="http://hopeforfilm.com/" target="_blank">Hope For Film</a> and co-founded the Indie Film review site <a href="http://hammertonail.com/" target="_blank">Hammer To Nail</a>.</p>

      <h4><a href="http://www.imdb.com/name/nm0907863/" target="_blank">Joe Walker</a></h4>
      <p>Joe Walker is an acclaimed film and sound editor whose recent work includes 12 YEARS A SLAVE, for which he has been nominated or an Oscar, SHAME, which garnered him a British Independent Film Award nomination, HUNGER, and HARRY BROWN, starring Michael Caine. He also edited the YouTube-produced documentary LIFE IN A DAY, culled from over 4,500 hours of user generated footage.</p>

      <h4><a href="http://www.imdb.com/name/nm0021899/" target="_blank">Michael Almereyda</a></h4>
      <p>Michael Almereyda is an acclaimed writer and director whose films include HAMLET (2000), starring Ethan Hawke, Kyle MacLauchlan, and Julia Stiles; NADJA (1994), which was nominated for the Grand Jury Prize at Sundance and garnered him an Independent Spirit Award nomination for best director; and CYMBELINE, starring Ethan Hawke, Mila Jovovich and Ed Harris, scheduled for release in the fall of 2014. His documentary short SKINNINGROVE (2013) won the Short Film Jury Prize at Sundance and the Best Documentary Short Film Award at the Ann Arbor Film Festival. Almereyda is currently working on a feature film about social psychologist Stanly Milgram, entitled EXPERIMENTER.</p>

      <h4><a href="http://www.imdb.com/name/nm0531337/" target="_blank">Scott Macaulay</a></h4>
      <p>Scott Macaulay is a New York-based producer and the Editor-in-Chief of <a href="http://filmmakermagazine.com" target="_blank">Filmmaker Magazine</a>, the leading American magazine devoted to independent film. Scott has produced or executive produced many award-winning features including Peter Sollett's RAISING VICTOR VARGAS, Harmony Korine's GUMMO and JULIEN DONKEY-BOY, and Alice Wu's SAVING FACE. In 1998 Macaulay and producing partner Robin O'Hara won an Independent Spirit Award work. Scott also sits on several industry boards, including the Rotterdam Film Festival's CineMart.</p>

      <h4><a href="http://www.imdb.com/name/nm3161139/" target="_blank">Vanessa Hope</a></h4>
      <p>Vanessa Hope started her film career in China while teaching a graduate course on "Law and Society" and completing her PhD. Fluent in Chinese, she produced two films in China, Wang Quanan's THE STORY OF ERMEI (Berlin Film Festival, 2004), and Chantal Akerman's TOMBEE DE NUIT SUR SHANGHAI (2007). Vanessa's U.S. producing credits include Zeina Durra's THE IMPERIALISTS ARE STILL ALIVE! (Sundance, 2010), Joel Schumacher's TWELVE and the feature documentary WILLIAM KUNSTLER: DISTURBING THE UNIVERSE by Sarah and Emily Kunstler (Sundance, 2009). Vanessa is in the edit on her feature documentary directorial debut about America's foreign policy relationship with China, ALL EYES AND EARS, and a series of short films on Chinese characters for the web.</p>

      <h4><a href="http://caseyneistat.com" target="_blank">Casey Neistat</a></h4>
      <p>Casey Neistat is a New York-based filmmaker. He is the writer, director, editor, and star of the series The Neistat Brothers on HBO and won the John Cassavetes Award at the 2012 Independent Spirit Awards for producing the film DADDY LONG LEGS. His main body of work consists of dozens of short films he has released exclusively on the Internet, including regular contributions to the New York Times critically acclaimed Op-Doc series. His online films have been viewed over 50,000,000 times in the last 3 years.</p>

      <h4><a href="http://peacheschrist.com/" target="_blank">Joshua Grannell</a></h4>
      <p>Joshua Grannell is a celebrated writer, director and performer.  As Peaches Christ, Joshua created and host Midnight Mass, the most successful midnight movie series in America, with special guests including Linda Blair, John Waters, Elvira, Mink Stole and Mary Woronov. Joshua's directorial work includes the 2002 TRAN-ILOGY OF TERROR including SEASON OF THE TROLL, A NIGHTMARE ON CASTRO STREET, and WHATEVER HAPPENED TO PEACHES CHRIST. In 2004, Joshua wrote and directed the short film GRINDHOUSE, which became the basis for his 2010 feature film and road show, ALL ABOUT EVIL.</p>
    </div>

  </div>
</div>
