<?php
    echo $html->css('modalbox',null,array(), false);
    echo $javascript->link('modalbox', false);
?>
<div id='main_content' class='grid_13 alpha full' style='min-height:600px'>
<div class='grid_16 full' id='breadcrumb'>
	<div class='spacer'>
		<?php echo $this->element('breadcrumb',array("breadcrumbs"=>$breadcrumbs));  ?>
	</div>
</div>
<div class="grid_16 full">
	<div class="box_2">
		<div class="box_1">
			<h2 class="title"><span>Daftar Menu</span></h2>
			<div class="" id="mlm">
				<div class="action ar box">
					<?php echo $html->link(__("Tambah Kategori", true), array('action'=>'ajax_menu_add'), array('title' => 'Add menu', 'class'=>'button add', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>
				</div>
				<div class="grid_16 titlebar full">
					<div class="spacer">
						<div class="grid_5 alpha">
							Label
						</div>
						<div class="grid_2">
							Default
						</div>
						<div class="grid_2">
							Ditampilkan
						</div>
						<div class="grid_7 omega">
							Aksi
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
				<ul id='first'>
				<?php foreach($menus as $menu): ?>
					<li id="first_<?php echo $menu['Link']['id']?>">
						<?php echo $form->create("Link", array("class"=>"clean")); ?>
							<div class="grid_16">
								<div class="grid_5 alpha first">
									<div class="spacer">
										<span class="h3"><?php echo $menu['Link']['name']; ?></span>
										<div class="sub"><?php echo $menu['Link']['controller']."/".$menu['Link']['action'] ?></div>
									</div>
								</div>
								<div class="grid_2">
										<?php echo $form->input('is_default', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($menu['Link']['is_default'])?TRUE:FALSE)); ?>
								</div>
								<div class="grid_2">
										<?php echo $form->input('is_show', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($menu['Link']['is_show'])?TRUE:FALSE)); ?>
								</div>
								<div class="grid_7 omega">
									<?php echo $html->link(__("Tambah", true), array('action'=>'ajax_menu_add', $menu['Link']['id']), array('title' => 'Add menu','class'=>'add', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>

									<?php echo $html->link(__("Edit", true), array('action'=>'ajax_menu_add', $menu['Link']['id'], true), array('title' => 'Edit menu','class'=>'edit', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>

									<?php echo $ajax->link(__("Hapus", true), null, array('url'=>array('action'=>'ajax_menu_delete', $menu['Link']['id']),'title' => 'Delete menu','class'=>'delete', 'complete' => "Effect.Fade('first_'+json.deleted_id);")); ?>

									<span onclick="Element.toggle('second<?php echo $menu['Link']['id'] ?>'); return false;"><?php __("Toggle") ?></span>
								</div>
							</div>
						<?php echo $form->end(); ?>
						<div class="clear"></div>
						<?php if(isset($menu['Childlink']) && !empty($menu['Childlink'])): ?>
							<ul id="second<?php echo $menu['Link']['id'] ?>">
								<?php foreach($menu['Childlink'] as $sub): ?>
									<li id="second_<?php echo $sub['id'] ?>">

										<?php echo $form->create("Link", array("class"=>"clean")); ?>
											<div class="grid_16">
												<div class="grid_5 alpha second">
													<div class="spacer">
														<span class="h4"><?php echo $sub['name']; ?></span>
														<div class="sub"><?php echo $sub['controller']."/".$sub['action'] ?></div>
													</div>
												</div>
												<div class="grid_2">
														<?php echo $form->input('is_default', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($sub['is_default'])?TRUE:FALSE)); ?>
												</div>
												<div class="grid_2">
														<?php echo $form->input('is_show', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($sub['is_show'])?TRUE:FALSE)); ?>
												</div>
												<div class="grid_7 omega">
													<?php echo $html->link(__("Tambah", true), array('action'=>'ajax_menu_add', $sub['id']), array('title' => 'Add menu','class'=>'add', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>

													<?php echo $html->link(__("Edit", true), array('action'=>'ajax_menu_add', $sub['id'], true), array('title' => 'Edit menu','class'=>'edit', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>

													<?php echo $ajax->link(__("Hapus", true), null, array('url'=>array('action'=>'ajax_menu_delete', $sub['id']),'title' => 'Delete menu','class'=>'delete', 'complete' => "Effect.Fade('second_'+json.deleted_id);")); ?>

													<span onclick="Element.toggle('third<?php echo $sub['id'] ?>'); return false;"><?php __("Toggle") ?></span>
												</div>
											</div>
										<?php echo $form->end(); ?>
										<div class="clear"></div>

										<?php if(isset($sub['Childlink'])): ?>
											<ul id="third<?php echo $sub['id'] ?>">
												<?php foreach($sub['Childlink'] as $subsub): ?>
													<li id='third_<?php echo $subsub['id'] ?>'>

										<?php echo $form->create("Link", array("class"=>"clean")); ?>
											<div class="grid_16">

												<div class="grid_5 alpha third">
													<div class="spacer">
														<span class="h5"><?php echo $subsub['name']; ?></span>
														<div class="sub"><?php echo $subsub['controller']."/".$subsub['action'] ?></div>
													</div>
												</div>
												<div class="grid_2">
														<?php echo $form->input('is_default', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($subsub['is_default'])?TRUE:FALSE)); ?>
												</div>
												<div class="grid_2">
														<?php echo $form->input('is_show', array("div"=>FALSE,"label"=>FALSE, "type"=>"checkbox","checked"=>($subsub['is_show'])?TRUE:FALSE)); ?>
												</div>
												<div class="grid_7 omega">
													<?php echo $html->link(__("Edit", true), array('action'=>'ajax_menu_add', $subsub['id'], true), array('title' => 'Edit menu','class'=>'edit', 'onclick' => "Modalbox.show(this.href, {title: this.title, width: 600}); return false;")); ?>

													<?php echo $ajax->link(__("Hapus", true), null, array('url'=>array('action'=>'ajax_menu_delete', $subsub['id']),'title' => 'Delete menu','class'=>'delete', 'complete' => "Effect.Fade('third_'+json.deleted_id);")); ?>
												</div>
											</div>
										<?php echo $form->end(); ?>
										<div class="clear"></div>

													</li>
												<?php endforeach; ?>
											<?php echo $ajax->sortable("third{$sub['id']}", array('url'=>'order','complete'=>"")); ?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
							<?php echo $ajax->sortable("second{$menu['Link']['id']}", array('url'=>'order','complete'=>"")); ?>
						<?php endif; ?>
					</li>
					<?php //echo $ajax->drag("first_{$menu['Link']['id']}",array('revert'=>true)); ?>

				<?php endforeach; ?>
				</ul>
				<?php echo $ajax->sortable('first', array('url'=>'order','complete'=>"", 'handle'=>'$$("#first h3")')); ?>
				</div>
			</div>
		</div>
	</div>
</div>


<div id='sidebar' class='grid_3 full omega' >
    <div id='sidebar_spacer' class='spacer'>
		<ul class="sidemenu">
			<li><h3>Filtering</h3></li>
			<li><a href="">filter1</a></li>
			<li class='current'><a href="">filter2</a></li>
			<li><a href="">filter3</a></li>
		</ul>
		<ul class="sidemenu">
			<li><h3>Filtering</h3></li>
			<li><a href="">filter1</a></li>
			<li><a href="">filter2</a></li>
			<li><a href="">filter3</a></li>
		</ul>
    </div>
</div>
