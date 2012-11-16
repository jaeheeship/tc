<div class="admin_sidebar_wrapper">
	<div class=" bs-docs-sidebar">
		<ul class="nav nav-list bs-docs-sidenav affix-top">
			<li <?php if($action=='gallery_list'):?> class="active" <?endif;?>><a
				href="<?=base_url()?>admin/gallery/gallery_list"><i
					class="icon-chevron-right"></i>갤러리 목록</a>
			</li>
			<li <?php if($action=='make_gallery'):?> class="active" <?endif;?>><a
				href="<?=base_url()?>admin/gallery/make_gallery"><i
					class="icon-chevron-right"></i>갤러리 만들기</a>
			</li> 
		</ul>
	</div>
</div>

