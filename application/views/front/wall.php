<? include(dirname(__FILE__)."/common/header.php")?>

<div id="section-header" class="container-fluid">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h1>Muro</h1></div>
        </div>
    </div>
</div>
<div class="container main-content">
	<div class="col-md-12">
		<div class="panel panel-primary">
    		<div class="panel-body">
                <form class="ajax_form" id="leave-comment-form" action="<?= $link_url?>front_user/send_comment" method="post">
				<textarea name="new_wall_post" id="new_wall_post" class="form-control" placeholder="<? lang("share-comment")?>"></textarea>
                <div class="clearfix"></div>
                <input type="submit" class="btn btn-primary pull-right" id="submit-wall-post" value="Publicar" disabled="disabled">
                <div class="clearfix"></div>
                </form>
				<div id="posts-container">
				<?
				if(!count($wall_posts))
				{
					?>
					<div class="col-md-12">
                    	<div class="no-comments"><?= lang("empty-wall")?></div>
                    </div>
					<?
				}
				else
				{
					
					foreach($wall_posts as $wall_post)
					{
						?>
						<div class="row comment-box post-list" id="comment-<?= $wall_post['comment_id']?>">
							<div class="col-md-12">
                                <div class="comment-body">
                                <?
                                if($wall_post['username'])
								{
								?>
                                    <div class="comment-author">
                                        <h3><?= $wall_post['username']?> <small><?= dateFormat($wall_post['date_created'],"d/m/Y H:i")?></small></h3>
                                    </div>
								<?
								}
								else
								{
									?><small>Hoy <?= dateFormat($wall_post['date_created'],"d/m/Y H:i")?></small><?
								}
								?>
                                
								<?= $wall_post['comment']?>
                                 <div class="clearfix"></div>   
                                </div>
								<div class="comments">
                                    <form class="ajax_form comment-post-form" action="<?= $link_url?>front_user/comment_post/<?= $wall_post['comment_id']?>" method="post">
                                    <textarea name="post_comment" class="form-control comment-area" post_id="<?= $wall_post['comment_id']?>" placeholder="<?= $wall_post['total_comments'] ? lang("leave-comment") : lang("first-comment");	?> "></textarea>
                                    <input type="submit" id="submit-comment-<?= $wall_post['comment_id']?>" class="btn btn-primary" value="Publicar" disabled="disabled">
                                    </form>
                                    <div id="post-comments-<?= $wall_post['comment_id']?>" class="post-comments">
                                    <?
									$total_comments = 0;
                                    if($wall_post['total_comments'])
                                    {
                                        $comments = $wall_post['comments'];
                                        $comments = explode('|//|',$comments);
                                        
                                        foreach($comments as $comment)
                                        {
                                            $comment = explode('|-|',$comment);
											if($total_comments == 10)
											{
												?><div class="show-all-comments"><?= lang("all-comments")?></div><?	
											}
											?>
                                            <div class="post-comment" <?= $total_comments >= 10 ? "style='display:none'" : ""?>>
                                                <a class="comment-name" href="<?= $link_url?>perfil/<?= $comment[1]?>/<?= $comment[2]?>"><?= $comment[2]?></a> <?= $comment[3]?><br>
                                                <small><?= dateFormat($comment[4],"d/m/Y H:i")?></small>
                                            </div>
											<?
                                        }
										$total_comments++;
                                    }
                                    ?>
                                    </div>
								</div>							
							</div>
                        </div>
						<?	
					}
				}
				?>
                </div>
                <div align="center" id="pagination" style="display:none"><a  id="next-posts" href="<?= base_url()?>muro/<?= $page+1?>" class="btn btn-primary" >Siguiente ></a></div>
			</div>
		</div>
	</div>
</div>


<? include(dirname(__FILE__)."/common/footer.php")?>