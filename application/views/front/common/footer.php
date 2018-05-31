	<div class="container-fluid" id="bg-footer">
		<div class="container">
			<div class="col-md-12">
            	<div class="pull-left">
                <?
                if($this->company_model->footer_image)
				{
					?><img src="<?= $this->company_model->footer_image?>" id="company-logo-footer"><?	
				}?>
                <small><?= lang('support-email')?></small>
                </div>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?= $link_url?>assets_fe/js/jquery.js"></script>
	<script src="<?= $link_url?>assets_fe/js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.7.0/intro.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- <script src="<?= $link_url?>assets_fe/js/mdb.js"></script> -->
    <script src="<?= $link_url?>assets_fe/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>


	<?
    if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']))
	{
		?>
        <script src="<?= $link_url?>assets_fe/js/html5shiv.js"></script>
      	<script src="<?= $link_url?>assets_fe/js/respond.js"></script>
		<script>
		$('[placeholder]').focus(function() {
			  var input = $(this);
			  if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			  }
			}).blur(function() {
			  var input = $(this);
			  if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			  }
			}).blur().parents('form').submit(function() {
			  $(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
				  input.val('');
				}
			  })
			});	
		</script>
		<?
	}
	?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	
    <![endif]-->
	<script>
		$('body').parallax("70%", -0.3);
	</script>
	<?
	if ($section == 'home' || $section == 'comprar' ) {
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('#company-availability').ajaxForm({
			// dataType identifies the expected content type of the server response 
			dataType:  'json', 
			// success identifies the function to invoke when the server response 
			// has been received 
			success:   validate_company_form 
		});
     
		function validate_company_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				window.location.href = "<?= $link_url?>crear-prode";
			}
			else
			{
			  	$('#company-error').html(data.message);
				$('#company-error').fadeIn();	
			}
		};

		$('#check-code').ajaxForm({
			// dataType identifies the expected content type of the server response 
			dataType:  'json', 
			// success identifies the function to invoke when the server response 
			// has been received 
			success:   validate_code_form 
		});
     
		function validate_code_form(data) {
			$('#company-code-error').hide();
			if(data.valid)
			{
				window.location.href = data.url;
			}
			else
			{
			  	$('#error').html(data.message);
				$('#error').fadeIn();
			}
		};


        $('#login-form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_login_form 
                });
                
		function validate_login_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				if(data.first_register)
				{
					window.location.href = "<?= $link_url?>primer-ingreso";	
				}
				else
				{
					window.location.href = "<?= $link_url?>posiciones";
				}
			}
			else
			{
			  	$('#error').html(data.error);
				$('#error').fadeIn();
			}
		};
		
        $('#register-form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_register_form 
        });
                
		function validate_register_form(data) {
			$('#error').hide();
			if(data.valid)
			{
					window.location.href = "<?= $link_url?>completar-registro";
			}
			else
			{
			  	$('#error').html(data.error);
				$('#error').fadeIn();	
			}
		};		
        </script>
<?
	}
	if($section == 'first_login')
	{
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('.ajax_form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				$('#first-time-content').hide();
				$('#first-time-header').hide();
				$('#first-time-header').html(data.message);
				$('#first-time-header').fadeIn();
			}
			else
			{
				if(data.error)
				{
					$('#error').html(data.error);
					$('#error').fadeIn();	
				}
				
				$.each(data.errors, function(key, value) {

				if(value)
					$('#contact_error_' + key ).html( value ).fadeIn();
				});	
			}
			};
        </script>
	<?	
	}
	if($section == 'complete_register')
	{
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('.ajax_form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				$('#register-content').hide();

				$('#register-content').html(data.message);
                $('#register-content').fadeIn();
			}
			else
			{
				if(data.error)
				{
					$('#error').html(data.error);
					$('#error').fadeIn();	
				}
				
				$.each(data.errors, function(key, value) {

				if(value)
					$('#contact_error_' + key ).html( value ).fadeIn();
				});	
			}
			};


        $('#company-create-form').ajaxForm({
			// dataType identifies the expected content type of the server response 
			dataType:  'json', 
			// success identifies the function to invoke when the server response 
			// has been received 
			success:   company_create_form 
		});
     
	 
		function company_create_form(data) {
			$('.register_company_msg_error').hide();
			if(data.valid)
			{
				if (data.error) {
					$('#register-content').hide();
					$('#register-header').hide();
					$('#prode-create-form-error').html(data.message + ' <br><br>Redireccionado al home...');
					window.setTimeout(function() {
						window.location.href = data.redirect_url;
					}, 4000);
				} else {
					$('#register-content').hide();
					$('#register-header').hide();
					$('#prode-create-form-error').html(data.message + ' <br><br>Redireccionado al home...');
					window.setTimeout(function() {
						window.location.href = data.redirect_url;
					}, 4000);
				}
			}
			else
			{
				$.each(data.errors, function(key, value) {
					if(value){
						$('#register_company_error_' + key ).html( value ).fadeIn();
					}
				});	

			  	$('#prode-create-form-error').html(data.message);
				$('#prode-create-form-error').fadeIn();	
			}

			
		};
        </script>
	<?	
	}
	if($section == 'edit_profile')
	{
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('#edit-profile-form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				window.location.href = "<?= $link_url?>mi-cuenta/";
			}
			else
			{
				$.each(data.errors, function(key, value) {

				if(value)
					$('#contact_error_' + key ).html( value ).fadeIn();
				});	
			}
		};
        </script>
	<?	
	}
    if($section == 'edit_company')
    {
        ?>
        <script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
            $('#edit-company-form').ajaxForm({
                // dataType identifies the expected content type of the server response
                dataType:  'json',
                // success identifies the function to invoke when the server response
                // has been received
                success:   validate_ajax_form
            });

            function validate_ajax_form(data) {
                $('#error').hide();
                if(data.valid)
                {
                    window.location.href = "<?= $link_url?>mi-grupo/";

                }
                else
                {
                    $.each(data.errors, function(key, value) {

                        if(value)
                            $('#contact_error_' + key ).html( value ).fadeIn();
                    });
                }
            };
        </script>
        <?
    }
	if($section == 'recover_password')
	{
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('#recover-form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				window.location.href = "<?= $link_url?>pronosticos/";
			}
			else
			{
				$.each(data.errors, function(key, value) {

				if(value)
					$('#contact_error_' + key ).html( value ).fadeIn();
				});	
			}
		};
        </script>
	<?	
	}

	if($sub_section == "view_league")
	{
		?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        	$('.accept-league').click(function(){
				$.get("<?= $link_url?>/front_user/accept_in_league/"+$(this).attr("league_id")+"/"+$(this).attr("user_id"));
				$(this).parent().html('<span class="glyphicon glyphicon-ok" style="color:#5CB85C"></span>');
				});
				
			$('.decline-league').click(function(){
				$.get("<?= $link_url?>/front_user/decline_in_league/"+$(this).attr("league_id")+"/"+$(this).attr("user_id"));
				$(this).parent().html('<span class="glyphicon glyphicon-remove" style="color:#B85C5C"></span>');
				});
        </script>
		<?	
	}	
	if($section == 'forgot_password')
	{
	?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script>
        $('#recover-form').ajaxForm({
                	// dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			$('#error').hide();
			if(data.valid)
			{
				$('#recover-content').hide();
				$('#recover-header').hide();
				$('#recover-header').html(data.message);
				$('#recover-header').fadeIn();
			}
			else
			{
				if(data.error)
				{
					$('#error').html(data.error);
					$('#error').fadeIn();	
				}
			}
		};
        </script>
	<?	
	}
	if($section == 'wall')
	{
		?>
        <script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
		<script src="<?= $link_url?>assets_fe/js/jquery.infinitescroll.js"></script>
		<script type="text/javascript">
        
		 $('#posts-container').infinitescroll({
			navSelector  : "#pagination",            
						   // selector for the paged navigation (it will be hidden)
			nextSelector : "#next-posts",    
						   // selector for the NEXT link (to page 2)
			itemSelector : ".post-list",          
						   // selector for all items you'll retrieve
		  	path: function(number){ return "<?= $link_url."muro/"?>"+number },
		 	}, function(newElements){ 

             	$('.comment-post-form').ajaxForm({
                // dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success: function(data){
							if(data.valid)
							{
								$('#post-comments-'+data.post_id).append('<div class="post-comment new-post-comment" style="display:none"><span class="comment-name">'+data.username+'</span> '+data.comment+'<br><small>'+data.date_created+'</small></div>');
								$('.new-post-comment').fadeIn();
								$("#submit-comment-"+data.post_id).attr('disabled',true);
							}
							else
							{
								alert(data.error);
							}
					}
         		});
				
				$(".comment-area").keyup(function(){
					if($(this).val())
					{
						$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',false);	
					}
					else
					{
						$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',true);	
					}
				});                  

            });
		
        $('#leave-comment-form').ajaxForm({
                // dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   validate_ajax_form 
                });
                
		function validate_ajax_form(data) {
			if(data.valid)
			{
				$('#no-comments').fadeOut();
				$('#posts-container').prepend('<div id="new-message" style="display:none"><div class="row comment-box" id="comment"><div class="col-md-12"><div class="comment-body"><div class="comment-author"><h3><span id="new-message-name">'+data.username+'</span> <small>Hoy <span id="new-message-hour">'+data.hour+'</span></small></h3></div><span id="new-message-post">'+data.comment+'</span><div class="clearfix"></div></div><div class="comments"> <form class="ajax_form comment-post-form" action="<?= $link_url?>front_user/comment_post/'+data.post_id+'" method="post"><textarea name="post_comment" class="form-control comment-area" post_id="'+data.post_id+'" placeholder="<?= $wall_post['total_comments'] ? lang('leave-comment') : lang('first-comment')?>"></textarea><input type="submit" id="submit-comment-'+data.post_id+'" class="btn btn-primary" value="Publicar" disabled="disabled"></form><div id="post-comments-'+data.post_id+'" class="post-comments"></div></div></div></div></div>');
				$('#new-message').fadeIn();
				$("#submit-wall-post").attr('disabled',true);
				
				$('.comment-post-form').ajaxForm({
                // dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success: function(data){
							if(data.valid)
							{
								$('#post-comments-'+data.post_id).append('<div class="post-comment new-post-comment" style="display:none"><span class="comment-name">'+data.username+'</span> '+data.comment+'<br><small>'+data.date_created+'</small></div>');
								$('.new-post-comment').fadeIn();
								$("#submit-comment-"+data.post_id).attr('disabled',true);
							}
							else
							{
								alert(data.error);
							}
					}
         		});
				
				$(".comment-area").keyup(function(){
					if($(this).val())
					{
						$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',false);	
					}
					else
					{
						$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',true);	
					}
				 });
				
			}
			else
			{
				$('#error').html(data.error)	
			}
		};		
         $("#new_wall_post").keyup(function(){
			if($(this).val())
			{
				$("#submit-wall-post").attr('disabled',false);	
			}
			else
			{
				$("#submit-wall-post").attr('disabled',true);	
			}
		});
		
		 $(".comment-area").keyup(function(){
			if($(this).val())
			{
				$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',false);	
			}
			else
			{
				$("#submit-comment-"+$(this).attr("post_id")).attr('disabled',true);	
			}
		 });
		 
		 $('.comment-post-form').ajaxForm({
                // dataType identifies the expected content type of the server response 
                    dataType:  'json', 
                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success: validate_comment 
         });
                
		function validate_comment(data) {
			if(data.valid)
			{
				$('#post-comments-'+data.post_id).append('<div class="post-comment new-post-comment" style="display:none"><span class="comment-name">'+data.username+'</span> '+data.comment+'<br><small>'+data.date_created+'</small></div>');
				$('.new-post-comment').fadeIn();
				$("#submit-comment-"+data.post_id).attr('disabled',true);
			}
			else
			{
				alert(data.error);
			}
		};	      
        </script>
	<?
	}
		
	if($section == 'bet')
	{?>
		<script src="<?= $link_url?>assets_common/js/jquery.form.js"></script>
        <script src="<?= $link_url?>assets_fe/js/jquery.ddslick.min.js"></script>
        <script src="<?= $link_url?>assets_fe/js/gridline.js"></script>

		<script>

            <?
			if(($phase == "initial") || ($phase = "final"))
			{
			?>
				function enable_match(match_id){
					$("#input-goals-1-"+match_id).prop('disabled', false).val("");
					$("#input-goals-2-"+match_id).prop('disabled', false).val("");
					$("#input-goals-1-"+match_id).focus();
					$("#middle-col-"+match_id).html("<p class='please-load-match'><?= lang('FALTA CARGAR')?></p>");
				}
				
				function disable_match(match_id,message)
				{
					$("#input-goals-1-"+match_id).prop('disabled', true);
					$("#input-goals-2-"+match_id).prop('disabled', true);
					
					$("#middle-col-"+match_id).html('<small><?= lang('Guardando...')?></div><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>');
					
					setTimeout(function() {
						$("#middle-col-"+match_id).html('<span>'+message+'</span><br><span class="btn btn-success btn-edit-match" match_id="'+match_id+'" onclick="enable_match('+match_id+')"><?= lang('editar')?></span>');				
					}, 1100);
					
				}
							
				$(".btn-edit-match").click(function(){
					var match_id = $(this).attr("match_id");	
					enable_match(match_id);
				});

            $(".input-goals").focusout(function(){
                var value = $(this).val();
                if(!(value % 1 === 0))
                {
                    $(this).val(0);
                }
                var result = -2;
                var match_id = $(this).attr('match_id');

                $("#matchrow-"+match_id).removeClass("danger");
                var goals1 = $("#input-goals-1-"+match_id).val();
                var goals2 = $("#input-goals-2-"+match_id).val();
                var match_code = $("#matchrow-"+match_id).attr("match-code");

                if((goals1 != "")&&(goals2 != ""))
                {
                    result = goals1 > goals2 ? -1 : (goals1 == goals2 ? 0 : 1);
                }

                if(result > -2)
                {
                    $.ajax({url: "<?= $link_url?>front_user/auto_save/"+match_code+"/"+match_id+"/"+goals1+"/"+goals2+"/"+result});
                    var message = "Guardado";
                    if(result == -1)
                    {
                        message = "Gana <b>"+$("#match-name-"+match_id+"-1").html()+"</b>";
                    }
                    if(result == 0)
                    {
                        message = "Empate";
                    }
                    if(result == 1)
                    {
                        message = "Gana <b>"+$("#match-name-"+match_id+"-2").html()+"</b>";
                    }
                    disable_match(match_id,message);
                }
            });

            $(".input-goals").keypress(function(e){
                if (e.which === 13) {
                    var value = $(this).val();
                    if (!(value % 1 === 0)) {
                        $(this).val(0);
                    }
                    var result = -2;
                    var match_id = $(this).attr('match_id');

                    $("#matchrow-" + match_id).removeClass("danger");
                    var goals1 = $("#input-goals-1-" + match_id).val();
                    var goals2 = $("#input-goals-2-" + match_id).val();
                    var match_code = $("#matchrow-" + match_id).attr("match-code");

                    if ((goals1 != "") && (goals2 != "")) {
                        result = goals1 > goals2 ? -1 : (goals1 == goals2 ? 0 : 1);
                    }

                    if (result > -2) {
                        $.ajax({url: "<?= $link_url?>front_user/auto_save/" + match_code + "/" + match_id + "/" + goals1 + "/" + goals2 + "/" + result});
                        var message = "Guardado";
                        if (result == -1) {
                            message = "Gana <b>" + $("#match-name-" + match_id + "-1").html() + "</b>";
                        }
                        if (result == 0) {
                            message = "Empate";
                        }
                        if (result == 1) {
                            message = "Gana <b>" + $("#match-name-" + match_id + "-2").html() + "</b>";
                        }
                        disable_match(match_id, message);
                    }
                }
            });
				
				$("#complete-later").click(function(){
					$("#prognostics-form").submit();
				});

			
				$('#prognostics-form').ajaxForm({
				// dataType identifies the expected content type of the server response 
					dataType:  'json', 
					// success identifies the function to invoke when the server response 
					// has been received 
					success:   validate_prognostics_form 
				});
				
				function validate_prognostics_form(data) {
					if(data.valid)
					{
						window.location.href = "<?= $link_url?>mi-pronostico";
					}
				};
			<?
			}
			?>
            </script>
		<?
	}?>    
  </body>
</html>