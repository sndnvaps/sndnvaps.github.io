<? snippet('header') ?>

<!-- content: open -->
<div class="span9">
	<div class="main-content">
		<? snippet('breadcrumb') ?>
		<?= kirbytext($page->text()) ?>
	</div>
</div>
<!-- content: close -->

<? snippet('footer') ?>