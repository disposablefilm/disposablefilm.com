$(document).ready(function() {

  // FROM http://www.sanwebe.com/2013/04/voting-system-with-jquery-php

  //####### on page load, retrive votes for each content
  $.each( $('.voting_wrapper'), function(){
    //retrive unique id from this voting_wrapper element
    var unique_id = $(this).attr("id");

    //console.log("processing: " + unique_id)

    //prepare post content
    post_data = {'unique_id':unique_id, 'vote':'fetch'};

    //send our data to "vote_process.php" using jQuery $.post()
    $.post('vote_process.php', post_data,  function(response) {
        //retrive votes from server, replace each vote count text
        $('#'+unique_id+' .up_votes').text(response.vote_up);
        $('#'+unique_id+' .down_votes').text(response.vote_down);
    },'json');
  });

  $(".voting_wrapper .voting_btn").click(function (e) {
    //get class name (down_button / up_button) of clicked element
    var clicked_button = $(this).children().attr('class');

    //get unique ID from voted parent element
    var unique_id   = $(this).parent().attr("id");

    if(clicked_button==='down_button') //user disliked the content
    {

      //console.log("voted down: " + unique_id)

      //prepare post content
      post_data = {'unique_id':unique_id, 'vote':'down'};

      //send our data to "vote_process.php" using jQuery $.post()
      $.post('vote_process.php', post_data, function(data) {

          //replace vote down count text with new values
          $('#'+unique_id+' .down_votes').text(data);

          //thank user for the dislike
          //alert("Thanks! Each Vote Counts, Even Dislikes!");

      }).fail(function(err) {

      //alert user about the HTTP server error
      alert(err.statusText);
      });
    }
    else if(clicked_button==='up_button') //user liked the content
    {
      //console.log("voted up: " + unique_id)

      //prepare post content
      post_data = {'unique_id':unique_id, 'vote':'up'};

      //send our data to "vote_process.php" using jQuery $.post()
      $.post('vote_process.php', post_data, function(data) {

          //replace vote up count text with new values
          $('#'+unique_id+' .up_votes').text(data);

          //thank user for liking the content
          //alert("Thanks! For Liking This Content.");
      }).fail(function(err) {

      //alert user about the HTTP server error
      alert(err.statusText);
      });
    }
  });

});