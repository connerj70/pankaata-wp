<div class="secondary-nav-right">
	<form role="search" method='get' action="<?php echo home_url('/')?>">
		<input placeholder="Search for posts..." name="s" type="text" class="secondary-nav-search search-hidden" value="<?php echo get_search_query();?>"/>
		<!-- Search icon by Icons8 -->

		<!-- <i class="fas fa-times search-times search-times-hidden"></i> -->
		<img class="search-times search-times-hidden" src="<?php bloginfo('template_url'); ?>/assets/x.svg" />
		<img class="search-icon" src="<?php bloginfo('template_url'); ?>/assets/magnifying-glass.svg" />
		<!-- <i class="fas fa-search search-icon"></i> -->

	</form>
</div>